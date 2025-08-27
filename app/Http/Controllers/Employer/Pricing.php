<?php

namespace App\Http\Controllers\Employer;
use App\Http\Controllers\Employer\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Packagepayments_model;
use App\Models\Package_model;
use App\Models\SuperAdmin_model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Traits\SmtpConfigTrait;
use App\Helpers\EmailHelper;

class Pricing extends Controller
{
    use SmtpConfigTrait;
    var $USERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
    }


    function plans(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID;

            $currentPlan = Package_model::where("userId", $userId)->first();

            $data = array();
            $data["pageTitle"] = "Pricing";
            $data["currentPlan"] = $currentPlan;
            
            return View("employer.pricing",$data);

        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
    }

    function buy($plan){
        if($this->USERID > 0){
            $userId = $this->USERID;
            
            $packageNames = array("payasyougo", "basicaccess", "recruiterspackage", "custompackage");
            
            $package = $plan;
            
            if(in_array($package, $packageNames)){
                
                $createDateTime = date("Y-m-d H:i:s");
                $updateDateTime = date("Y-m-d H:i:s"); 
                //initiate transaction
                //get package amount from config
                $packageAmount = config('custom.pricing.'.$package.'.price');
                
                $endpoint = config('custom.paystack.transInitialize');

                //get paystack credentials
                
                $sysAdmId = 1;
                $sysAdm = SuperAdmin_model::where("id", $sysAdmId)->first();

                $paystack = json_decode($sysAdm["paystack"], true);
                $SECRET_KEY = $paystack["secretkey"];
                //$paystack["publickey"];
                if(!$SECRET_KEY || $SECRET_KEY == null || $SECRET_KEY == ''){
                    return Redirect::to(url("recruiter/payment/cancel"));
                }
                $FName = $this->getSession('fname');
                $LName = $this->getSession('lname');
                $email = $this->getSession('email');
                $currency = "NGN";
                $refrence = db_randnumber();
                //get admin name, email
                $method = 'POST';
                $bodyContent = array();
                $bodyContent["amount"] = $packageAmount * 100; //in kobo (100-kobo = 1-Naira)
                $bodyContent["email"] = $email;
                $bodyContent["currency"] = $currency;
                $bodyContent["reference"] = $refrence;
                $bodyContent["callback_url"] = url("recruiter/payment/callback");
                $bodyContent["channels"] = ["card"];



                //$cartId = db_randnumber();
                
                $bodyContent["metadata"] = [
                    "userId" => $userId,
                    "transactionId" => $refrence,
                    "package" => $package,
                    "cancel_action" => url("recruiter/payment/cancel")
                ];

                $bodyContentJson = json_encode($bodyContent);

                $headers = [
                    "Authorization: Bearer $SECRET_KEY",
                    "Content-Type: application/json"
                ];
                
                
                $result = makeCurlRequest($endpoint, $method, $headers, $bodyContent, false);
                $initiateResult = json_decode($result, true);
                //echo "<pre>"; print_r($initiateResult); die;
                if($initiateResult["status"] == 1){
                    //redirect to payment page
                   
                   $referenceTransId = $initiateResult["data"]["reference"];
                   $this->setSession('transactionRef',$referenceTransId);
                   $authorization_url = $initiateResult["data"]["authorization_url"];
                   return Redirect::to($authorization_url);
                  
                }else{
                    //redirect to cancel page
                    return Redirect::to(url("recruiter/payment/cancel"));
                   
                }
                
            }else{
                //invalid package
                return Redirect::to(url("recruiter/payment/cancel"));
            }
            
        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }


    }

    function payment(Request $request){
        //http://local.smartrecruit.com/recruiter/payment/callback?trxref=1739081877345892&reference=1739081877345892
        //http://local.smartrecruit.com/recruiter/payment/callback?trxref=1739376484319659&reference=1739376484319659
        
        $trxref = $request->input("trxref");
        $reference = $request->input("reference");
        $transactionRef = $this->getSession('transactionRef');
        
        if($transactionRef == $reference){
            
            $this->removeSession('transactionRef');
            
            //$SECRET_KEY = config('custom.paystack.secretkey');
            //$SECRET_KEY = "sk_test_48f9c1d23041e406b620438391c682afbe66cfbb";
            $sysAdmId = 1;
            $sysAdm = SuperAdmin_model::where("id", $sysAdmId)->first();

            $paystack = json_decode($sysAdm["paystack"], true);
            $SECRET_KEY = $paystack["secretkey"];
            //$paystack["publickey"];


            $endpoint = config('custom.paystack.transVerify') . $reference;
        
            //$endpoint = "https://api.paystack.co/transaction/verify/1739081877345892";
            
            //verify transaction
            $method = 'GET';
            
            $headers = [
                "Authorization: Bearer $SECRET_KEY",
                "Content-Type: application/json"
            ];
            
            $bodyContent = null;
            $returnAsArray = false;

            $result = makeCurlRequest($endpoint, $method, $headers, $bodyContent, $returnAsArray);
            $verifyResult = json_decode($result, true);        
            //echo "<pre>"; print_r($verifyResult); die;
            if($verifyResult["status"] == 1){
                $verifyData = $verifyResult["data"];
                $status = $verifyData["status"]; //success
                
                if($status == "success"){
                    //payment success
                    $gatewayTransId = $verifyData["id"];
                    $referenceId = $verifyData["reference"];
                    $amount = $verifyData["amount"];
                    $currency = $verifyData["currency"];
                    $paid_at = $verifyData["paid_at"];
                    $metadata = $verifyData["metadata"];
                    $userId = $metadata["userId"];
                    $transactionId = $metadata["transactionId"];
                    $package = $metadata["package"];
                    $cancel_action = $metadata["cancel_action"];
                    
                    $createDateTime = date("Y-m-d H:i:s");
                    $updateDateTime = date("Y-m-d H:i:s");

                    //save transaction
                    $timezone = Carbon::now()->timezoneName;
                    $paidAt = Carbon::parse($paid_at)
                        ->setTimezone($timezone)
                        ->format('Y-m-d H:i:s');

                    //packagepayments//
                    $row = Packagepayments_model::where("id", $transactionId)->where("userId", $userId)->first();
                    if($row){
                        $row = $row->toArray();
                        //invalid link or link is expired
                        //payment failed
                        return Redirect::to(url("recruiter/payment/cancel"));
                    }else{
                        //save transaction
                        $paymentObj = new Packagepayments_model();
                        $paymentObj->id = $transactionId;
                        $paymentObj->gatewayTransId = $gatewayTransId;
                        $paymentObj->transactionId = $transactionId;
                        $paymentObj->userId = $userId;
                        $paymentObj->package = $package;
                        $paymentObj->amount = $amount;
                        $paymentObj->currency = $currency;
                        $paymentObj->status = $status;
                        $paymentObj->payment = 'y';
                        $paymentObj->paid_at = $paidAt;
                        $paymentObj->gatewayResponse =  json_encode($verifyResult);
                        $paymentObj->createDateTime = $createDateTime;
                        $paymentObj->updateDateTime = $updateDateTime;
                        $paymentSave = $paymentObj->save();    
                    
                        
                        $newDateTime = Carbon::now()->addMonth();
                        $startOn = date("Y-m-d");
                        $expireOn = date("Y-m-d", strtotime($newDateTime));
                        
                        $packageName = config('custom.pricing.'.$package.'.name');
                        $candidatelimit = config('custom.pricing.'.$package.'.candidatelimit');
                        $packageLimitArr = config('custom.packageLimit');
                        $candidatePurchaseLimit = $candidatelimit;
                        $candidatePurchased = 0;

                        if($paymentSave){
                            
                            //update package
                            
                            Package_model::upsert(
                                [
                                    [
                                        'userId' => $userId,
                                        'package' => $package,
                                        'active' => 1,
                                        'starton' => $startOn,
                                        'expireon' => $expireOn,
                                        'expired' => 0,
                                        'candidatePurchaseLimit' => $candidatePurchaseLimit,
                                        'candidatePurchased' => $candidatePurchased,
                                        'createDateTime' =>  $createDateTime, 
                                        'updateDateTime' => $updateDateTime
                                    ],
                                ],
                                ['userId'], // Unique column
                                ['package','active', 'starton', 'expireon', 'expired', 'candidatePurchaseLimit', 'candidatePurchased', 'updateDateTime'] // Columns to update if duplicate email exists
                            );
                            
                        }


                        // Create notifications
                        

                        //send active-package email and pricing
                        $tmpUserId = $this->getSession('id');
                        $tmpUserRole = $this->getSession('role');
                        $tmpUserFName = $this->getSession('fname');
                        $tmpUserLName = $this->getSession('lname');
                        $tmpUserEmail = $this->getSession('email');
                        $currencySymbol = config('custom.baseCurrency.symbol');
                        $price = $amount/100; //convert from kobo to niara

                        $param = [
                            "firstName" => $tmpUserFName,
                            "lastName" => $tmpUserLName,
                            "email" => $tmpUserEmail,
                            "PlanName" => $packageName,
                            "PlanPrice" => $currencySymbol.' '.$price,
                            "ValidityPeriod" => $expireOn,  
                            "TransactionID" => $transactionId,
                            "PaymentMethod" => '',
                            "TransactionDate" => $paidAt,
                            "purpose" => "recruiterplan"
                        ];
        
                        EmailHelper::sendEmail($param);

                        $data = array();
                        $data["pageTitle"] = "Payment Success";
                        return View("employer.paymentsuccess",$data);
                    
                    }
                }else{
                    //payment abandoned or failed
                    $gatewayTransId = $verifyData["id"];
                    $referenceId = $verifyData["reference"];
                    $amount = $verifyData["amount"];
                    $currency = $verifyData["currency"];
                    $paid_at = null;
                    $metadata = $verifyData["metadata"];
                    $userId = $metadata["userId"];
                    $transactionId = $metadata["transactionId"];
                    $package = $metadata["package"];
                    $cancel_action = $metadata["cancel_action"];
                    
                    $createDateTime = date("Y-m-d H:i:s");
                    $updateDateTime = date("Y-m-d H:i:s");

                    //save transaction
                    $timezone = Carbon::now()->timezoneName;
                    $paidAt = Carbon::parse($paid_at)
                        ->setTimezone($timezone)
                        ->format('Y-m-d H:i:s');

                    //save transaction
                    $paymentObj = new Packagepayments_model();
                    $paymentObj->id = $transactionId;
                    $paymentObj->gatewayTransId = $gatewayTransId;
                    $paymentObj->transactionId = $transactionId;
                    $paymentObj->userId = $userId;
                    $paymentObj->package = $package;
                    $paymentObj->amount = $amount;
                    $paymentObj->currency = $currency;
                    $paymentObj->status = $status;
                    $paymentObj->payment = 'n';
                    $paymentObj->paid_at = $paidAt;
                    $paymentObj->gatewayResponse =  json_encode($verifyResult);
                    $paymentObj->createDateTime = $createDateTime;
                    $paymentObj->updateDateTime = $updateDateTime;
                    $paymentSave = $paymentObj->save();    
                
                    return Redirect::to(url("recruiter/payment/cancel"));
                }
                
            }else{
                //payment failed
                return Redirect::to(url("recruiter/payment/cancel"));
            }
        }else{
            //payment failed
            return Redirect::to(url("recruiter/payment/cancel"));
        }
        
    }

    function cancel(Request $request){
        $data = array();
        $data["pageTitle"] = "Payment Failed";
        return View("employer.paymentfail",$data);
    }

    function savequote(Request $request){
        // save quote pending
        if($this->USERID > 0){
            
            $message = $request->input("message");
            
            $adminId = $this->USERID;
            $adminEmail = $this->getSession('adminEmail');
            $adminFName = $this->getSession('adminFName');
            $adminLName = $this->getSession('adminLName');
            $fullName = $adminFName.' '.$adminLName;
            
            $sysAdmId = 1;
            $sysAdm = SuperAdmin_model::where("id", $sysAdmId)->first();

            $smtp = json_decode($sysAdm["smtp"], true);
            
            $host = $smtp["host"];
            $port = $smtp["port"];
            $username = $smtp["username"];
            $password = $smtp["password"];
            $encryption = $smtp["encryption"];
            $from_email = $smtp["from_email"];
            $from_name = $smtp["from_name"];
            $replyTo_email = $smtp["replyTo_email"];
            $replyTo_name = $smtp["replyTo_name"];

            
            $smtpDetails = array();
            $smtpDetails['host'] = $host;
            $smtpDetails['port'] = $port;
            $smtpDetails['username'] = $username;
            $smtpDetails['password'] = $password;
            $smtpDetails['encryption'] = "";
            $smtpDetails['from_email'] = $from_email;
            $smtpDetails['from_name'] = $from_name;
            $smtpDetails['replyTo_email'] = $replyTo_email;
            $smtpDetails['replyTo_name'] = $replyTo_name;
        
            //Email
            $toEmail = $sysAdm["email"]; //"support@smartverify.com.ng";
            $toName = ucwords($sysAdm["fname"] ." ". $sysAdm["lname"]);//"Can Namho"; //;
            $subject = "Enterprise Plan - Quotation Request";
            $templateBlade = "emails.enterpriseplanrequest";

            $recipient = ['name' => $toName, 'email' => $toEmail];
            
            $bladeData = [
                'name' => $toName,
                'customerName' => $fullName,
                'customerEmail' => $adminEmail,
                'packageName' => 'Enterprise Plan',
                'additionalMessage' => $message 
            ];
            
            $result = $this->MYSMTP($smtpDetails, $recipient, $subject, $templateBlade, $bladeData);

            //dd($result);
            
            $postBackData = array();
            $postBackData["success"] = 1;
            
            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Your request has been submitted. We will contact you shortly."
            );
            
        }else{
            $postBackData = array();
            $postBackData["success"] = 0;
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;       
        
    }
}
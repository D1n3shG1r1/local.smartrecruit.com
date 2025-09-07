<?php

namespace App\Http\Controllers\Candidate;
use App\Http\Controllers\Candidate\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Users_model;
use App\Models\SuperAdmin_model;
use App\Models\Packagepayments_model;
//use App\Models\Package_model;
use App\Models\FeaturedCandidate_model;
use Carbon\Carbon;
use App\Traits\SmtpConfigTrait;
use App\Helpers\EmailHelper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Profile extends Controller
{
    use SmtpConfigTrait;
    var $USERID = 0;
    var $USERROLE = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
        $this->USERROLE = $this->getSession('role');
    }

    function myprofile(Request $request){
        
        if($this->USERID > 0){
            
            $userId = $this->USERID; 
            $userRole = $this->USERROLE; 
            $user = Users_model::select("id", "email", "fname", "lname", "gender", "dob", "phone", "city", "state", "country", "zipcode", "address_1", "address_2", "verified", "active")
            ->where("id", $userId)
            ->where("role", $userRole)
            ->first();

            $featureProfile = FeaturedCandidate_model::select("userId", "active", "starton", "expireon", "expired", "createDateTime", "updateDateTime")->where("userId", $userId)->first();
                    
            
            $data = array();
            $data["pageTitle"] = "My Profile";
            $data["user"] = $user;
            $data["featureProfile"] = $featureProfile;
            
            return View("candidate.profile",$data);
        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
    }

    function saveprofile(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID; 
        
            $fname = strtolower($request->input("fname"));
            $lname = strtolower($request->input("lname"));
            $gender = strtolower($request->input("gender"));
            $dob = $request->input("dob");
            $address_1 = strtolower($request->input("address_1"));
            $address_2 = strtolower($request->input("address_2"));
            $city = strtolower($request->input("city"));
            $state = strtolower($request->input("state"));
            $country = strtolower($request->input("country"));
            $zipcode = $request->input("zipcode");
            $phone = $request->input("phone");
            $active = $request->input("active");

            if(!$zipcode){$zipcode = "";}
            

            $updateArr = array(
                "fname" => $fname,
                "lname" => $lname,
                "gender" => $gender,
                "dob" => $dob,
                "phone" => $phone,
                "city" => $city,
                "country" => $country,
                "zipcode" => $zipcode,
                "address_1" => $address_1,
                "address_2" => $address_2,
                "active" => $active
            );
            
            $custmoerObj = Users_model::where("id", $userId)->update($updateArr);
            $postBackData = $updateArr;
            $postBackData["success"] = 1;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Your profile is updated successfully."
            );
        }else{
            $postBackData = array();
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;
    }
    
    function saveprofilephoto(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID; 
            $base64Image = $request->input("imgData");
            
            // Strip off the base64 prefix
            $imageData = explode(',', $base64Image);
            $imageData = $imageData[1];
            $imageName = 'pp-'.$userId.'.jpg'; 
            // Decode the base64 string into an image
            $decodedImage = base64_decode($imageData);

            // Define the dynamic path for storing the image
            //$adminDirPath = 'users/' . $userId . '/assets/images/';  // Use 'users/{userId}/assets/images'
            $adminDirPath = userImagesPath($userId);
            
            // Ensure the directory structure exists
            // Laravel will create any missing directories
            Storage::disk('local')->makeDirectory($adminDirPath);
            
            // Store the image in the appropriate folder
            Storage::disk('local')->put($adminDirPath . $imageName, $decodedImage);  // Save the image
            
            // Return the relative path of the image for further processing
            //$path = $adminDirPath . $imageName;
            $path = userImagesDisplayPath($userId,$imageName);


            $postBackData["path"] = $path;
            $postBackData["success"] = 1;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Your profile photo has been updated successfully."
            );
        }else{
            $postBackData = array();
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;
    }

    function activateFeatureProfile($plan){
        if($this->USERID > 0){
            $userId = $this->USERID; 

            if($plan){
                
                if($plan == "featureprofile"){
                    $createDateTime = date("Y-m-d H:i:s");
                    $updateDateTime = date("Y-m-d H:i:s"); 
                    //initiate transaction
                    
                    //get package amount from config
                    $package = "featureprofile";
                    $packageAmount = config('custom.pricing.'.$package.'.price');
                    
                    $endpoint = config('custom.paystack.transInitialize');

                    //get paystack credentials
                    
                    $sysAdmId = 1;
                    $sysAdm = SuperAdmin_model::where("id", $sysAdmId)->first();

                    $paystack = json_decode($sysAdm["paystack"], true);
                    $SECRET_KEY = $paystack["secretkey"];
                    //$paystack["publickey"];
                    if(!$SECRET_KEY || $SECRET_KEY == null || $SECRET_KEY == ''){
                        return Redirect::to(url("candidate/payment/cancel"));
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
                    $bodyContent["callback_url"] = url("candidate/payment/callback");
                    $bodyContent["channels"] = ["card"];



                    //$cartId = db_randnumber();
                    
                    $bodyContent["metadata"] = [
                        "userId" => $userId,
                        "transactionId" => $refrence,
                        "package" => $package,
                        "cancel_action" => url("candidate/payment/cancel")
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
                        return Redirect::to(url("candidate/payment/cancel"));
                        
                    }
                }else{
                    //redirect to cancel page
                    return Redirect::to(url("candidate/payment/cancel"));
                }

            }else{
                //redirect to cancel page
                return Redirect::to(url("candidate/payment/cancel"));
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
                        return Redirect::to(url("candidate/payment/cancel"));
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
                        $candidatelimit = 0; //config('custom.pricing.'.$package.'.candidatelimit');
                        $packageLimitArr = 0; //config('custom.packageLimit');
                        $candidatePurchaseLimit = $candidatelimit;
                        $candidatePurchased = 0;

                        if($paymentSave){
                            
                            //update package
                            
                            FeaturedCandidate_model::upsert(
                                [
                                    [
                                        'userId' => $userId,
                                        'active' => 1,
                                        'starton' => $startOn,
                                        'expireon' => $expireOn,
                                        'expired' => 0,
                                        'createDateTime' =>  $createDateTime,
                                        'updateDateTime' => $updateDateTime
                                    ],
                                ],
                                ['userId'], // Unique column
                                ['active','starton', 'expireon', 'expired', 'updateDateTime'] // Columns to update 
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
                            "receiver" => $tmpUserId,
                            "sender" => 1,
                            "purpose" => "candidateplan"
                        ];
                        
                        EmailHelper::sendEmail($param);

                        $data = array();
                        $data["pageTitle"] = "Payment Success";
                        return View("candidate.paymentsuccess",$data);
                    
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
                
                    return Redirect::to(url("candidate/payment/cancel"));
                }
                
            }else{
                //payment failed
                return Redirect::to(url("candidate/payment/cancel"));
            }
        }else{
            //payment failed
            return Redirect::to(url("candidate/payment/cancel"));
        }
        
    }

    function cancel(Request $request){
        $data = array();
        $data["pageTitle"] = "Payment Failed";
        return View("candidate.paymentfail",$data);
    }

}

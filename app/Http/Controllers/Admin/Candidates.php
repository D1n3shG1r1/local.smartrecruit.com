<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Users_model;
use App\Models\CandidateResumeData_model;
use App\Models\FeaturedCandidate_model;
use App\Models\Packagepayments_model;
use App\Models\SuperAdmin_model;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Helpers\EmailHelper;

class Candidates extends Controller
{
    var $USERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
    }

    function candidates(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID;
            
            $candidates = Users_model::select('id', 'referral_code', 'fname', 'lname', 'email', 'verified', 'active', 'createdDateTime')
            ->where("role", 1)
            ->orderBy('createdDateTime', 'desc')
            ->paginate(10);

            if ($candidates) {
                
                // Array to store candidate IDs and their data
                $candidateIdsArr = array();
                $IdWiseCandidateArr = array();

                // Collect candidate IDs and store their data in the array
                foreach ($candidates as $candidate) {
                    $cId = $candidate->id;
                    $candidateIdsArr[] = $cId;
                    $IdWiseCandidateArr[$cId] = $candidate;
                }

                // Fetch featured candidates for those userIds
                $featuredResult = FeaturedCandidate_model::select("userId")
                    ->whereIn("userId", $candidateIdsArr)
                    ->where("active", 1)
                    ->where("expired", 0)
                    ->get();

                // If there are featured candidates
                if ($featuredResult) {
                    // Create an array of user IDs that are featured
                    $featuredUserIds = $featuredResult->pluck('userId')->toArray();

                    // Loop through all candidates to add the 'featured' flag
                    foreach ($candidates as $candidate) {
                        // Check if the candidate ID is in the list of featured user IDs
                        if (in_array($candidate->id, $featuredUserIds)) {
                            // If featured, set the flag to 1
                            $candidate->isFeatured = 1;
                        } else {
                            // If not featured, set the flag to 0
                            $candidate->isFeatured = 0;
                        }
                    }
                } else {
                    // If no featured candidates, set all to not featured
                    foreach ($candidates as $candidate) {
                        $candidate->isFeatured = 0;
                    }
                }
            }


            $data = array();
            $data["pageTitle"] = "All Candidates";
            $data["candidates"] = $candidates;
            
            return View("admin.candidates",$data);

        } else {
            return Redirect::to(url('/'));
        }
    }

    function candidate($id){
        if($this->USERID > 0){
            
            //get candidate basic profile

            $userId = $this->USERID; 
            
            $user = Users_model::select("id", "email", "fname", "lname", "gender", "phone", "city", "state", "country", "zipcode", "address_1", "address_2", "verified", "active")
            ->where("id", $id)
            ->where("role", 1)
            ->first();

            $featureProfile = FeaturedCandidate_model::select("userId", "active", "starton", "expireon", "expired", "createDateTime", "updateDateTime")->where("userId", $id)->first();
            
            $data = array();
            $data["pageTitle"] = "Candidate Profile";
            $data["user"] = $user;
            $data["featureProfile"] = $featureProfile;
            return View("admin.candidateProfile",$data);
        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
    }

    function resume($id){

        if($this->USERID > 0){
            
            $userId = $this->USERID; 
            
            $basicProfileData = Users_model::select("id", "email", "fname", "lname", "gender", "phone", "city", "state", "country", "zipcode", "address_1", "address_2", "verified")
            ->where("id", $id)
            ->first();

            $cvdata = CandidateResumeData_model::where("candidateId", $id)
            ->first();

            $data = array();
            $data["pageTitle"] = "Candidate Resume";
            $data["basicProfile"] = $basicProfileData;
            $data["cvdata"] = $cvdata;
            
            return View("admin.resumeform",$data);
        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
        
    }
    
    function sendlinkandverify(Request $request){
        if($this->USERID > 0){
            
            $userId = $this->USERID; 

            $resumeId = $request->input("resumeId");
            $candidateId = $request->input("candidateId");
            $link = $request->input("interviewLinkInput");
            $resendLink = $request->input("resendLink");
            
            $verified = Users_model::where("id", $candidateId)->update([
                "emailVerified" => 1,
                "verified" => 1]);

            if($resendLink == 1){
                //assume verified in case of resend
                $verified = $resendLink;
            }

            if($verified){
                
                $candidateRow = Users_model::select("fname", "lname", "email", "referral_code")->where("id", $candidateId)->first();

                $fname = $candidateRow->fname;
                $lname = $candidateRow->lname;
                $email = $candidateRow->email;
                $referalCode  = $candidateRow->referral_code;
                
                // send welcome email email
                $param = [
                    "firstName" => $fname,
                    "lastName" => $lname,
                    "email" => $email,
                    "link" => $link,
                    "referalCode" => $referalCode,
                    "receiver" => $candidateId,
                    "sender" => 1,
                    "purpose" => "candidatevideolink"
                ];
                
                EmailHelper::sendEmail($param);

                $response = array(
                    "C" => 100,
                    "R" => [],
                    "M" => "The candidate's profile has been verified, and the link was sent successfully."
                );
            }else{
                $response = array(
                    "C" => 101,
                    "R" => [],
                    "M" => "Something went wrong. Please try again."
                );
            }

        }else{
            
            $response = array(
                "C" => 1004,
                "R" => [],
                "M" => "session expired."
            );
        }

        return response()->json($response); die;

    }


    function updateresume(Request $request){
        if($this->USERID > 0){
            
            $userId = $this->USERID;
            
            $_token = $request->input("_token");
            $formData = $request->input("formData");
            $skills = $request->input("skills");
            $submitVal = $request->input("submit");
            $sakey = $request->input("sakey");

            // Validate Special Access Key
            $settingsRow = SuperAdmin_model::select("specialAccessKey")->where("role", 3)->where("id", 1)->first();

            if (!$settingsRow || $settingsRow->specialAccessKey !== $sakey) {
                return response()->json([
                    "C" => 101,
                    "R" => ["success" => 0],
                    "M" => "You have entered an invalid Special Access key."
                ]);
            }else{
                
                // Unserialize the data
                parse_str($formData,$unserializedData); //unserialize form data
                
                //echo "<pre>"; print_r($unserializedData); die;
                
                $candidateId = $unserializedData["candidateId"];
                $fullname = $unserializedData["fullname"];
                $gender = $unserializedData["gender"];
                $email = $unserializedData["email"];
                $phone = $unserializedData["phone"];
                $address1 = $unserializedData["address1"];
                $address2 = $unserializedData["address2"];
                $city = $unserializedData["city"];
                $country = $unserializedData["country"];
                
                //professional summary
                $professionalsummary = $unserializedData["professionalsummary"];
                $professionalsummary = htmlspecialchars($professionalsummary, ENT_QUOTES, 'UTF-8');
                $professionalsummary = preg_replace("/\r|\n/", '', $professionalsummary);
    
                //work experience
                $jobtitleArr = $unserializedData["jobtitle"]; //array
                $jobcompanyArr = $unserializedData["jobcompany"]; //array
                $jobstartdateArr = $unserializedData["jobstartdate"]; //array
                $jobenddateArr = $unserializedData["jobenddate"]; //array
                $jobresponsibilitiesArr = $unserializedData["jobresponsibilities"]; //array
                $jobachievementsArr = $unserializedData["jobachievements"]; //array
                
                
                $workExperience = [];
                foreach($jobtitleArr as $wk => $jobtitle){
                    
                    $companyname = $jobcompanyArr[$wk];
                    $startdate = $jobstartdateArr[$wk];
                    $enddate = $jobenddateArr[$wk];
                    $responsibilities = $jobresponsibilitiesArr[$wk];
                    $achievements = $jobachievementsArr[$wk];


                    $responsibilities = preg_replace("/\r|\n/", '', $responsibilities);
                    $achievements = preg_replace("/\r|\n/", '', $responsibilities);


                    $workExperience[] = array(
                        "jobtitle" => $jobtitle,
                        "companyname" => $companyname,
                        "startdate" => $startdate,
                        "enddate" => $enddate,
                        "responsibilities" => $responsibilities,
                        "achievements" => $achievements
                    );    
                }

                //skills
                //$skills = $unserializedData["skills"];
                $customskill = $unserializedData["customskill"];
                
                //languages
                $languageArr = $unserializedData["language"];
                $languageProficiencyArr = $unserializedData["languageProficiency"];
                $languages = [];
                foreach($languageArr as $lk => $language){
                    
                    $proficiency = $languageProficiencyArr[$lk];

                    $languages[] = array(
                        "language" => $language,
                        "proficiency" => $proficiency
                    );
                }    


                //degree
                $degreeCertificateArr = $unserializedData["degree-certificate"];
                $schoolInstitutionArr = $unserializedData["school-institution"];
                $edustartdateArr = $unserializedData["edustartdate"];
                $eduenddateArr = $unserializedData["eduenddate"];
                $fieldOfStudyArr = $unserializedData["field-of-study"];
                $degrees = [];
                foreach($degreeCertificateArr as $ek => $degreeCertificate){
                    
                    $schoolInstitution = $schoolInstitutionArr[$ek];
                    $edustartdate = $edustartdateArr[$ek];
                    $eduenddate = $eduenddateArr[$ek];
                    $fieldOfStudy = $fieldOfStudyArr[$ek];

                    $degrees[] = array(
                        "degree" => $degreeCertificate,
                        "schoolinstitution" => $schoolInstitution,
                        "startdate" => $edustartdate,
                        "enddate" => $eduenddate,
                        "fieldofstudy" => $fieldOfStudy
                    );
                }

                
                //certifications
                $certificationTitleArr = $unserializedData["certification-title"];
                $certificationOrganizationArr = $unserializedData["certification-organization"];
                $certificationDateArr = $unserializedData["certification-date"];  
                $certifications = [];
                foreach($certificationTitleArr as $ck => $certificate){
                    
                    $organization = $certificationOrganizationArr[$ck];
                    $certfdate = $certificationDateArr[$ck];
                    
                    $certifications[] = array(
                        "title" => $certificate,
                        "organization" => $organization,
                        "date" => $certfdate
                    );
                }

                
                $videolink = $unserializedData["videolink"];
                
                //$id = db_randnumber();
                //$createdDateTime = date("Y-m-d H:i:s");
                $updatedDateTime = date("Y-m-d H:i:s");

                $updateData = array(
                    "profSummary" => $professionalsummary,
                    "workExperience" => json_encode($workExperience),
                    "skills" => json_encode($skills),
                    "languages" =>  json_encode($languages),
                    "degree" => json_encode($degrees),
                    "certifications" => json_encode($certifications),
                    "updatedDateTime" => $updatedDateTime,
                    "videolink" => $videolink
                );
                
                CandidateResumeData_model::where("candidateId", $candidateId)
                ->update($updateData);


                $postBackData = $updateData;
                $postBackData["success"] = 1;

                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "Your resume is updated successfully."
                );

            }

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
 
    function saveprofile(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID; 
            
            $candidateId = $request->input("userId");
            $sakey = $request->input("sakey");
            $fname = strtolower($request->input("fname"));
            $lname = strtolower($request->input("lname"));
            $gender = strtolower($request->input("gender"));
            $address_1 = strtolower($request->input("address_1"));
            $address_2 = strtolower($request->input("address_2"));
            $city = strtolower($request->input("city"));
            $state = strtolower($request->input("state"));
            $country = strtolower($request->input("country"));
            $zipcode = $request->input("zipcode");
            $phone = $request->input("phone");
            $active = $request->input("active");

            if(!$zipcode){$zipcode = "";}
            

            // Validate Special Access Key
            $settingsRow = SuperAdmin_model::select("specialAccessKey")
                               ->where("role", 3)
                               ->where("id", 1)
                               ->first();
            
            if (empty($settingsRow )) {
                return response()->json([
                    "C" => 101,
                    "R" => ["success" => 0],
                    "M" => "You have entered an invalid Special Access key."
                ]);
            }else{
                
                if($settingsRow->specialAccessKey !== $sakey){
                    return response()->json([
                        "C" => 102,
                        "R" => ["success" => 0],
                        "M" => "You have entered an invalid Special Access key."
                    ]);
                }else{
                    $updateArr = array(
                        "fname" => $fname,
                        "lname" => $lname,
                        "gender" => $gender,
                        "phone" => $phone,
                        "city" => $city,
                        "country" => $country,
                        "zipcode" => $zipcode,
                        "address_1" => $address_1,
                        "address_2" => $address_2,
                        "active" => $active
                    );
                    
                    $custmoerObj = Users_model::where("id", $candidateId)->update($updateArr);
                    $postBackData = $updateArr;
                    $postBackData["success"] = 1;
        
                    $response = array(
                        "C" => 100,
                        "R" => $postBackData,
                        "M" => "Candidate's profile is updated successfully."
                    );
                } 
                
            }

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

    function activateFeatureProfile(Request $request){
        if($this->USERID > 0){
            //$userId = $this->USERID; 
            
            $candidateId = $request->input("userId");
            $candidateFname = $request->input("fname");
            $candidateLname = $request->input("lname");
            $candidateEmail = $request->input("email");
            $sakey = $request->input("sakey");
            
            // Validate Special Access Key
            $settingsRow = SuperAdmin_model::select("specialAccessKey")
                               ->where("role", 3)
                               ->where("id", 1)
                               ->first();
            
            if (empty($settingsRow )) {
                return response()->json([
                    "C" => 101,
                    "R" => ["success" => 0],
                    "M" => "You have entered an invalid Special Access key."
                ]);
            }else{
                
                if($settingsRow->specialAccessKey !== $sakey){
                    return response()->json([
                        "C" => 102,
                        "R" => ["success" => 0],
                        "M" => "You have entered an invalid Special Access key."
                    ]);
                }else{

                    $createDateTime = date("Y-m-d H:i:s");
                    $updateDateTime = date("Y-m-d H:i:s"); 
                    //initiate transaction
                    
                    //get package amount from config
                    $package = "featureprofile";
                    $packageAmount = config('custom.pricing.'.$package.'.price');
                    $packageAmount = 0; //free account

                    $currency = "NGN";
                    $refrence = db_randnumber();

                    
                    //payment success
                    $gatewayTransId = 0;
                    $referenceId = $refrence;
                    $amount = 0;
                    $currency = $currency;
                    $paid_at = $createDateTime;
                    $metadata = '';
                    $userId = $candidateId;
                    $transactionId = $referenceId;
                    $package = $package;
                    $cancel_action = '';
                    
                    $createDateTime = date("Y-m-d H:i:s");
                    $updateDateTime = date("Y-m-d H:i:s");

                    //save transaction
                    $timezone = Carbon::now()->timezoneName;
                    $paidAt = Carbon::parse($paid_at)->setTimezone($timezone)->format('Y-m-d H:i:s');
                    
                    $status = 'success';
                    
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
                    $paymentObj->gatewayResponse =  json_encode(array());
                    $paymentObj->createDateTime = $createDateTime;
                    $paymentObj->updateDateTime = $updateDateTime;
                    $paymentSave = $paymentObj->save();    
                
                    
                    $newDateTime = Carbon::now()->addMonth();
                    $startOn = date("Y-m-d");
                    $expireOn = date("Y-m-d", strtotime($newDateTime));
                    
                    $packageName = config('custom.pricing.'.$package.'.name');
                    $candidatelimit = 0; 
                    $packageLimitArr = 0;
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
                    //$userId $candidateId $refrence

                    $tmpUserId = $userId;
                    $tmpUserRole = 1;
                    $tmpUserFName = $candidateFname;
                    $tmpUserLName = $candidateLname;
                    $tmpUserEmail = $candidateEmail;
                    $currencySymbol = config('custom.baseCurrency.symbol');
                    $price = 0; //convert from kobo to niara

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

                    $postBackData = array();
                    $postBackData["success"] = 1;
        
                    $response = array(
                        "C" => 100,
                        "R" => $postBackData,
                        "M" => "The candidate's Featured Profile is activated."
                    );
                } 
                
            }

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

}
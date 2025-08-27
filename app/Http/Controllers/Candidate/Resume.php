<?php
/* candidate's CV-Information like skills & qualification*/
namespace App\Http\Controllers\Candidate;
use App\Http\Controllers\Candidate\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Users_model;
use App\Models\CandidateResumeData_model;
use App\Models\Notification_model;
use App\Models\shortlistCandidates_model;
use App\Models\purchasedCandidates_model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Helpers\EmailHelper;

class Resume extends Controller
{
    var $USERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
    }
     
    function resumeform(Request $request){
        if($this->USERID > 0){
            
            $userId = $this->USERID; 
            
            $basicProfileData = Users_model::select("id", "email", "fname", "lname", "gender", "phone", "city", "state", "country", "zipcode", "address_1", "address_2")
            ->where("id", $userId)
            ->first();

            $cvdata = CandidateResumeData_model::where("candidateId", $userId)
            ->first();

            $data = array();
            $data["pageTitle"] = "My Resume";
            $data["basicProfile"] = $basicProfileData;
            $data["cvdata"] = $cvdata;
            
            return View("candidate.resumeform",$data);
        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
    }

    function updateresume(Request $request){
        if($this->USERID > 0){
            
            $userId = $this->USERID;
            
            $_token = $request->input("_token");
            $formData = $request->input("formData");
            $skills = $request->input("skills");
            $submitVal = $request->input("submit");

            // Unserialize the data
            parse_str($formData,$unserializedData); //unserialize form data
            
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
            );
            
            //check if not submit before
            $sendThankEmail = 0;
            $row = CandidateResumeData_model::select("submit")->where("candidateId", $userId)->first();
            if($row->submit > 0){
                //already submitted
            }else{
                //not submitted earlier
                if($submitVal > 0){

                    $updateData["submit"] = $submitVal;
                    $sendThankEmail = 1;
                }
            }

            //dd($updateData);

            CandidateResumeData_model::where("candidateId", $userId)
            ->update($updateData);

            // Get the recruiters who bookmarked or purchased the candidate
            $bookmarkedRecruiters = shortlistCandidates_model::select('recruiterId')
            ->where('candidateId', $userId)
            ->get();

            $purchasedRecruiters = purchasedCandidates_model::select('recruiterId')
            ->where('candidateId', $userId)
            ->get();

            // Merge both recruiter collections
            $allRecruiters = $bookmarkedRecruiters->merge($purchasedRecruiters)->unique('recruiterId');

            foreach ($allRecruiters as $recruiter) {
                // Create notification
                $notificationId = db_randnumber();
                $createdDateTime = date('Y-m-d H:i:s');
                $recruiterId = $recruiter->recruiterId;

                $notificationData = [
                    'id' => $notificationId,
                    'message' => "The profile of ". ucwords($fullname)." was recently updated. Please review the changes to stay informed.",
                    'receiver' => $recruiterId,
                    'sender' => $userId,
                    'dateTime' => $createdDateTime,
                    'isRead' => 0,
                    'type' => 'recruiter',
                    'reference' => $recruiterId
                ];

                $this->createNotification($notificationData);
            }
            
            //send thankyou email
            if($sendThankEmail > 0){
                
                $fname = $this->getSession('fname');
                $lname = $this->getSession('lname');
                
                //send thankyou email
                $param = [
                    "firstName" => $fname,
                    "lastName" => $lname,
                    "email" => $email,
                    "purpose" => "candidatecvsubmitthankyou"
                ];

                EmailHelper::sendEmail($param);
            }


            $postBackData = $updateData;
            $postBackData["success"] = 1;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Your resume is updated successfully."
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

    function myresume(Request $request){
        if($this->USERID > 0){
            //https://bootstrapmade.com/demo/Kelly/
            $userId = $this->USERID; 

            $basicProfileData = Users_model::select("id", "email", "fname", "lname", "gender", "phone", "city", "state", "country", "zipcode", "address_1", "address_2")
            ->where("id", $userId)
            ->first();

            $cvdata = CandidateResumeData_model::where("candidateId", $userId)
            ->first();

            if($cvdata->submit > 0){
                $data = array();
                $data["pageTitle"] = "My Resume";
                $data["basicProfile"] = $basicProfileData;
                $data["cvdata"] = $cvdata;
                
                return View("candidate.myresume",$data);
            }else{
                //redirect to create resume
                return Redirect::to(url('/candidate/createresume'));
            }
           
        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
    }

    function createNotification(array $data){
        //$id = db_randnumber();
        //$createdDateTime = date("Y-m-d H:i:s");
        //Bookmark: “Your profile has caught a recruiter’s attention.”
        //Purchase: “A recruiter has expressed strong interest in your profile.”
        //Update Resume/Profile: “The profile of [Candidate Name] was recently updated. Please review the changes to stay informed.”
        
        if(!empty($data)){
            $notfyObj = new Notification_model();
            $notfyObj->id = $data["id"];
            $notfyObj->message = $data["message"];
            $notfyObj->receiver = $data["receiver"];
            $notfyObj->sender = $data["sender"];
            $notfyObj->dateTime = $data["dateTime"];
            $notfyObj->isRead = $data["isRead"];
            $notfyObj->type = $data["type"];
            $notfyObj->reference = $data["reference"];
            $notfyObj->save();
        }
        
    }
}
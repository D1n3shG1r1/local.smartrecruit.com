<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Users_model;
use App\Models\Package_model;
use App\Models\SuperAdmin_model;


use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Helpers\EmailHelper;

class Recruiters extends Controller
{
    var $USERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
    }

    function recruiters(){
        if($this->USERID > 0){
            $userId = $this->USERID;
            
            $recruiters = Users_model::select('id', 'referral_code', 'fname', 'lname', 'email', 'verified', 'active', 'createdDateTime')
            ->where("role", 2)
            ->orderBy('createdDateTime', 'desc')
            ->paginate(10);

            $data = array();
            $data["pageTitle"] = "All Recruiters";
            $data["recruiters"] = $recruiters;
            
            return View("admin.recruiters",$data);

        } else {
            return Redirect::to(url('/'));
        }
    }

    function recruiter($id){
        if($this->USERID > 0){
            
            //get recruiter basic profile

            $userId = $this->USERID; 
            
            $user = Users_model::select("id", "referral_code", "companyname", "position", "industry", "companysize", "website", "fname", "lname", "email", "verified", "active", "address_1", "address_2", "city", "state", "country", "zipcode", "phone")
            ->where("id", $id)
            ->where("role", 2)
            ->first();
            

            //package information
            $recruiterId = $user->id;
            $currentPlan = Package_model::where("userId", $recruiterId)->first();

            $data = array();
            $data["pageTitle"] = "Recruiter Profile";
            $data["user"] = $user;
            $data["currentPlan"] = $currentPlan;
            
            return View("admin.recruiter",$data);
        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
    }

    function saveprofile(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID; 
            
            $sakey = $request->input("sakey");
            $recruiterId = $request->input("recruiterId");
            $companyname = strtolower($request->input("companyname"));
            $position = $request->input("position");
            $industry = $request->input("industry");
            $companysize = strtolower($request->input("companysize"));
            $website = strtolower($request->input("website"));
            $fname = strtolower($request->input("fname"));
            $lname = strtolower($request->input("fname"));
            $gender = 0; //strtolower($request->input("gender"));
            $address_1 = strtolower($request->input("address_1"));
            $address_2 = strtolower($request->input("address_2"));
            $city = strtolower($request->input("city"));
            $state = strtolower($request->input("state"));
            $country = strtolower($request->input("country"));
            $zipcode = $request->input("zipcode");
            $phone = $request->input("phone");
           
            if(!$zipcode){$zipcode = "";}
            
            // Validate Special Access Key
            $settingsRow = SuperAdmin_model::select("specialAccessKey")->where("role", 3)->where("id", 1)->first();

            if (!$settingsRow || $settingsRow->specialAccessKey !== $sakey) {
                return response()->json([
                    "C" => 101,
                    "R" => ["success" => 0],
                    "M" => "You have entered an invalid Special Access key."
                ]);
            }else{
                $updateArr = array(
                    "companyname" => $companyname,
                    "position" => $position,
                    "industry" => $industry,
                    "companysize" => $companysize,
                    "website" => $website,
                    "fname" => $fname,
                    "lname" => $lname,
                    "gender" => $gender,
                    "phone" => $phone,
                    "city" => $city,
                    "country" => $country,
                    "zipcode" => $zipcode,
                    "address_1" => $address_1,
                    "address_2" => $address_2
                );
                
                $custmoerObj = Users_model::where("id", $recruiterId)->update($updateArr);
                $postBackData = $updateArr;
                $postBackData["success"] = 1;
    
                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "Recruiter profile has been updated successfully."
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

}
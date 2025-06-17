<?php

namespace App\Http\Controllers\Candidate;
use App\Http\Controllers\Candidate\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Users_model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class Profile extends Controller
{
    var $USERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
    }

    function myprofile(Request $request){
        
        if($this->USERID > 0){
            $userId = $this->USERID; 
            $user = Users_model::select("id", "email", "fname", "lname", "phone", "city", "state", "country", "zipcode", "address_1", "address_2")
            ->where("id", $userId)
            ->first();
            
            $data = array();
            $data["pageTitle"] = "My Profile";
            $data["user"] = $user;
            return View("candidate.profile",$data);
        }else{
            //redirect to login
            return Redirect::to(url());
        }
    }

    function saveprofile(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID; 
        
            $fname = strtolower($request->input("fname"));
            $lname = strtolower($request->input("lname"));
            $address_1 = strtolower($request->input("address_1"));
            $address_2 = strtolower($request->input("address_2"));
            $city = strtolower($request->input("city"));
            $state = strtolower($request->input("state"));
            $country = strtolower($request->input("country"));
            $zipcode = $request->input("zipcode");
            $phone = $request->input("phone");
           
            if(!$zipcode){$zipcode = "";}
            

            $updateArr = array(
                "fname" => $fname,
                "lname" => $lname,
                "phone" => $phone,
                "city" => $city,
                "country" => $country,
                "zipcode" => $zipcode,
                "address_1" => $address_1,
                "address_2" => $address_2
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
}

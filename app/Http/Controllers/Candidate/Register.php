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

class Register extends Controller
{
    var $USERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
    }

    function login(Request $request){
        $type = $request->input("type");
        $email = strtolower($request->input("email"));
        $password = $request->input("password");
        $password = md5($password);

        $userObj = Users_model::where('email', $email)->where('password', $password)->first();
            
        if (!empty($userObj)){
            $userId = $userObj["id"];
            if ($userId > 0) {
                
                $fname = $userObj["fname"];
                $lname = $userObj["lname"];
                $email = $userObj["email"];
                $role = $userObj["role"];
                
                $this->setSession('fname', $fname);
                $this->setSession('lname', $lname);
                $this->setSession('email', $email);
                $this->setSession('id', $userId);
                $this->setSession('role', $role);
                $this->setSession('systemAdmin', 0);
                
                $response = array("C" => 100, "R" => array(), "M" => "Login successful! Redirecting...");
            }else{
                $response = array("C" => 101, "R" => array(), "M" => "Invalid email or password. Please try again.");
            }   
        
        }else{
            $response = array("C" => 101, "R" => array(), "M" => "Invalid email or password. Please try again.");
        }
        
        return response()->json($response); die;
    }

    function register(Request $request){
        $type = $request->input("type");
        $fname = strtolower($request->input("fname"));
        $lname = strtolower($request->input("lname"));
        $email = strtolower($request->input("email"));
        $password = $request->input("password");
        $password = md5($password);
        $re_password = $request->input("confirmPassword");
        $agree_term = $request->input("agreeTerm");
        
        //check for email existance
        $isEmailExist = $this->emailExist($email);

        if($isEmailExist > 0){
            //email exists
            $postBackData = array();

            $postBackData["fname"] = $fname;
            $postBackData["lname"] = $lname;
            $postBackData["email"] = $email;
            $postBackData["success"] = 0;
            
            $response = array(
                "C" => 102,
                "R" => $postBackData,
                "M" => "The entered email is already associated with us."
            );
    
            return response()->json($response); die;

        }else{
            
            $id = db_randnumber();
            $createdDateTime = date("Y-m-d H:i:s");
            $updatedDateTime = date("Y-m-d H:i:s");

            $UserObj = new Users_model();
            $UserObj->id = $id;
            $UserObj->fname = $fname;  
            $UserObj->lname = $lname;
            $UserObj->email = $email;
            $UserObj->password = $password;
            $UserObj->verified = 0;
            $UserObj->role = 1;
            $UserObj->address_1 = '';
            $UserObj->address_2 = '';
            $UserObj->city = '';
            $UserObj->state = '';
            $UserObj->country = '';
            $UserObj->zipcode = '';
            $UserObj->phone = '';
            $UserObj->profilephoto = '';
            $UserObj->createdDateTime = $createdDateTime;
            $UserObj->updatedDateTime = $updatedDateTime;
            $saved = $UserObj->save();
            
            $postBackData = array();
            $postBackData["fname"] = $fname;
            $postBackData["lname"] = $lname;
            $postBackData["email"] = $email;
            $postBackData["success"] = 1;

            $response = array(
                "C" => $saved ? 100 : 101,
                "R" => $postBackData,
                "M" => $saved ? "Your account has been successfully registered." : "Something went wrong. Please try again."
            );
    
            return response()->json($response); die;
        }

    }

    function emailExist($email) {
        try {
            $adminObj = Users_model::where('email', $email)->first();
            return $adminObj ? 1 : 0;
        } catch (\Exception $e) {
            // Log error or handle it gracefully
            Log::error('Database error in emailExist: ' . $e->getMessage());
            return 0;
        }
    }
}

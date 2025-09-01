<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Employer\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Users_model;
use App\Models\ChangePasswordRequest_model;
use App\Models\SuperAdmin_model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Traits\SmtpConfigTrait;
use App\Traits\CryptoTrait;
use App\Helpers\EmailHelper;

class Register extends Controller
{
    use SmtpConfigTrait;
    use CryptoTrait;

    function __construct(){
        
    }

    function login(Request $request){
        $type = $request->input("type");
        $email = strtolower($request->input("email"));
        $password = $request->input("password");
        $password = md5($password);

        $userObj = Users_model::where('email', $email)->where('password', $password)->where('role', 2)->first();
            
        if (!empty($userObj)){
            $userId = $userObj["id"];
            if ($userId > 0) {
                
                $fname = $userObj["fname"];
                $lname = $userObj["lname"];
                $email = $userObj["email"];
                $role = $userObj["role"];
                $referral_code = $userObj["referral_code"];
                
                $this->setSession('fname', $fname);
                $this->setSession('lname', $lname);
                $this->setSession('email', $email);
                $this->setSession('id', $userId);
                $this->setSession('role', $role);
                $this->setSession('referral_code', $referral_code);
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
            
            $referralCode = generateModelUniqueCode(Users_model::class, 'referral_code');

            $id = db_randnumber();
            $createdDateTime = date("Y-m-d H:i:s");
            $updatedDateTime = date("Y-m-d H:i:s");
            
            $UserObj = new Users_model();
            $UserObj->id = $id;
            $UserObj->referral_code = $referralCode;
            $UserObj->fname = $fname;  
            $UserObj->lname = $lname;
            $UserObj->email = $email;
            $UserObj->password = $password;
            $UserObj->verified = 0;
            $UserObj->role = 2;
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
            $postBackData["success"] = $saved ? 1 : 0;
            
            if($saved){
                //62y39u35x87t0k6
                $param = [
                    "firstName" => $fname,
                    "lastName" => $lname,
                    "email" => $email,
                    "receiver" => $id,
                    "sender" => 1,
                    "purpose" => "recruiterwelcome"
                ];

                EmailHelper::sendEmail($param);
            }
            
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

    function logout(Request $request){
        
        $this->removeSession('fname');
        $this->removeSession('lname');
        $this->removeSession('email');
        $this->removeSession('id');
        $this->removeSession('role');
        $this->removeSession('referral_code');
        $this->removeSession('systemAdmin');

        //redirect to login
        return Redirect::to(url('/'));
    }

    function forgotpassword(Request $request){
        
        $email = strtolower($request->input("email"));
        
        //check for email existance
        $isEmailExist = $this->emailExist($email);

        if($isEmailExist > 0){
            //email exists
            $customerObj = Users_model::where('email', $email)->first();
            $customerId = $customerObj->id;
            $firstName = $customerObj->fname;
            $lastName = $customerObj->lname;

            $plainStr = $customerId;
            $key = env('MY_ENCRYPTION_KEY');
            $encstr = $this->encrypt($plainStr, $key);

            //add entry in changepassword table

            $changePasswordObj = new ChangePasswordRequest_model();
            $changePasswordObj->token = $encstr;
            $changePasswordObj->createdDateTime = date("Y-m-d H:i:s");
            $saved = $changePasswordObj->save();

            if($saved){
                //send change-password-link email
                $link = url("/changepassword?t=$encstr");
                
                $param = [
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "email" => $email,
                    "resetLink" => $link,
                    "receiver" => $customerId,
                    "sender" => 1,
                    "purpose" => "resetpassword"
                ];

                EmailHelper::sendEmail($param);
            }
            
            $postBackData = array();
            $postBackData["success"] = $saved ? 1 : 0;
            $postBackData["link"] = '';

            $response = array(
                "C" => $saved ? 100 : 101,
                "R" => $postBackData,
                "M" => $saved ? "A link to change your password has been sent to your registered email address." : "Something went wrong. Please try again."
            );
    
        }else{
            //email not exists
            $postBackData = array();
            $postBackData["success"] = 0;

            $response = array(
                "C" => 102,
                "R" => $postBackData,
                "M" => "The entered email is not registered with us."
            );
        }

        return response()->json($response); die;
    }

    function changepassword(Request $request){
        
        if ($request->isMethod('post')) {

            $t = $request->input("t");
            $password = $request->input("password");
            $re_password = $request->input("re_password");
            $password = md5($password);
            
            $plainStr = $t;
            $key = env('MY_ENCRYPTION_KEY');
            $customerId = $this->decrypt($plainStr, $key);
            
            $updatedDateTime = date("Y-m-d H:i:s");
            
            $updated = Users_model::where('id', $customerId)->update(array("password" => $password, "updatedDateTime" => $updatedDateTime));
            
            if($updated){
                ChangePasswordRequest_model::where('token', $t)->delete();
                
                $postBackData = array();
                $postBackData["success"] = 1;

                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "Your new password has been set. Please clear your browser cache and log in again."
                );
            }else{
                $postBackData = array();
                $postBackData["success"] = 0;
                $response = array(
                    "C" => 101,
                    "R" => $postBackData,
                    "M" => "Something went wrong. Please try again."
                );
            }
            
            return response()->json($response); die;

        }else{

            $t = $request->input("t");
            $row = ChangePasswordRequest_model::where('token', $t)->first();
            
            if($row){
            
                //check if token expires
                $currentDateTime = date("Y-m-d H:i:s");
                $tokenDateTime = $row->createdDateTime;    

                // Define two date-time instances
                $start = Carbon::parse($tokenDateTime);
                $end = Carbon::parse($currentDateTime);

                // Get the difference in minutes
                $diffInMinutes = $start->diffInMinutes($end);

                if($diffInMinutes >= 30){
                    //valid for 30 minutes
                    //link expired
                    $data = array();
                    $data["pageTitle"] = "Page not found";
                    return View("errors.404",$data);
                }else{
                    $plainStr = $t;
                    $key = env('MY_ENCRYPTION_KEY');
                    $customerId = $this->decrypt($plainStr, $key);
                    
                    $customerObj = Users_model::select('email')->where('id', $customerId)->first();
                    
                    $data = array();
                    $data["pageTitle"] = "Change Password";
                    $data["email"] = $customerObj->email;
                    $data["t"] = $t;
                    
                    return View("changepassword",$data);
                }

            }else{
                //invalid link
                $data = array();
                $data["pageTitle"] = "Page not found";
                return View("errors.404",$data);
            }
        }
        
    }

}

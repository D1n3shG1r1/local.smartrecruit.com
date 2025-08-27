<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users_model;
use App\Models\SuperAdmin_model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class Admin extends Controller
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

        //$userObj = SuperAdmin_model::where('email', $email)->where('password', $password)->where('role', 3)->first();
        $userObj = SuperAdmin_model::where('email', $email)->where('password', $password)->first();
            
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
                $this->setSession('systemAdmin', 1);
                
                $response = array("C" => 100, "R" => array(), "M" => "Login successful! Redirecting...");
            }else{
                $response = array("C" => 101, "R" => array(), "M" => "Invalid email or password. Please try again.");
            }   
        
        }else{
            $response = array("C" => 101, "R" => array(), "M" => "Invalid email or password. Please try again.");
        }
        
        return response()->json($response); die;
    }

    function logout(Request $request){
        
        $this->removeSession('fname');
        $this->removeSession('lname');
        $this->removeSession('email');
        $this->removeSession('id');
        $this->removeSession('role');
        $this->removeSession('systemAdmin');

        //redirect to login
        return Redirect::to(url('/'));
    }

    function myprofile(Request $request){
        
        if($this->USERID > 0){
            $userId = $this->USERID; 
            $user = SuperAdmin_model::select("id", "fname", "lname", "email")
            ->where("id", $userId)
            //->where("role", 3)
            ->first();
            
            $data = array();
            $data["pageTitle"] = "My Profile";
            $data["user"] = $user;
            return View("admin.profile",$data);
        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
    }

    function saveprofile(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID; 
            $email = $this->getSession('email');

            $sakey = $request->input("sakey");
            $fname = strtolower($request->input("fname"));
            $lname = strtolower($request->input("lname"));
            
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
                    "fname" => $fname,
                    "lname" => $lname,
                );
                
                $sysAdmObj = SuperAdmin_model::where("id", $userId)->where("email", $email)->update($updateArr);
                $postBackData = $updateArr;
                $postBackData["success"] = 1;
    
                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "Your profile is updated successfully."
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

    // app/Http/Controllers/ImageController.php


    public function show($userId, $filename)
    {
        $path = "private/users/{$userId}/assets/images/{$filename}";

        if (!Storage::exists($path)) {
            abort(404);
        }

        $file = Storage::get($path);
        $mimeType = Storage::mimeType($path);

        return Response::make($file, 200)->header("Content-Type", $mimeType);
    }


    function changepassword(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID; 
            $oldPassword = $request->input("oldPassword");
            $password = $request->input("password");
            $re_password = $request->input("re_password");
            $password = md5($password);
            

            $sakey = $request->input("sakey");
            // Validate Special Access Key
            $settingsRow = SuperAdmin_model::select("specialAccessKey")->where("role", 3)->where("id", 1)->first();

            if (!$settingsRow || $settingsRow->specialAccessKey !== $sakey) {
                
                return response()->json([
                    "C" => 102,
                    "R" => ["success" => 0],
                    "M" => "You have entered an invalid Special Access key."
                ]);

            }else{
                $adminObj = SuperAdmin_model::select('password')->where('id', $userId)->first();
            
                if($adminObj && $adminObj->password == md5($oldPassword)){

                    $updatedDateTime = date("Y-m-d H:i:s");
                
                    $updated = SuperAdmin_model::where('id', $userId)->update(array("password" => $password, "updateDateTime" => $updatedDateTime));

                    $postBackData = array();
                    $postBackData["success"] = 1;

                    //remove all sessions
                    $this->removeSession('fname');
                    $this->removeSession('lname');
                    $this->removeSession('email');
                    $this->removeSession('id');
                    $this->removeSession('role');
                    $this->removeSession('systemAdmin');


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
                        "M" => "The old password entered is incorrect."
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
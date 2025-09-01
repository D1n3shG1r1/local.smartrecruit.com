<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users_model;
use App\Models\SuperAdmin_model;
use App\Models\SubadminAssets_model;
use App\Traits\SmtpConfigTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use App\Helpers\EmailHelper;

class Settings extends Controller
{
    var $USERID = 0;
    var $USERROLE = 0;
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
        $this->USERROLE = $this->getSession('role');
    }

    function settings(Request $request){
        if($this->USERID > 0 && $this->USERROLE == 3){
            
            $adminId = $this->USERID;
            $settings = SuperAdmin_model::select("paystack", "smtp", "adActive", "adImages")->where("id",$adminId)->first()->toArray();
            
            $userId = $this->USERID; 
            $user = SuperAdmin_model::select("id", "fname", "lname", "email")
            ->where("id", $userId)
            ->where("role", 3)
            ->first();

            $subadmins = SuperAdmin_model::select("id", "fname", "lname", "email", "password")
            ->where("role", 4)
            ->get();

            if(!empty($subadmins)){
                foreach($subadmins as &$subadmin){
                    
                    $row = SubadminAssets_model::where("subadminId", $subadmin->id)->first();

                    $subadmin->plainpassword = $row->subadmintext;
                }
            }
            
            $ad = array(
                "adActive" => $settings["adActive"],
                "adImages" => json_decode($settings["adImages"], true)
            );
            
            $data = array();
            $data["pageTitle"] = "Settings";
            $data["user"] = $user;
            $data["subadmins"] = $subadmins;
            $data["paystack"] = json_decode($settings["paystack"], true);
            $data["smtp"] = json_decode($settings["smtp"], true);
            $data["ad"] = $ad;
            
            return View("admin.settings",$data);

        }else{
            
            $this->clearSession();
            //redirect to login
            return Redirect::to(url('/'));
        }
    }
    
    function savePaymentSettings(Request $request){

        if ($this->USERID <= 0) {
            return response()->json([
                "C" => 1004,
                "R" => ["success" => 0],
                "M" => "Your session has expired. Please log in again to continue."
            ]);
        }

        if($this->USERID > 0 && $this->USERROLE == 3){

            $sakey = $request->input("sakey");
            $secretKey = $request->input("secretkey");
            $publicKey = $request->input("publickey");
            $adminId = $this->USERID;

            $postBackData = [];

            // Validate Special Access Key
            $settingsRow = SuperAdmin_model::select("specialAccessKey")->find($adminId);

            if (!$settingsRow || $settingsRow->specialAccessKey !== $sakey) {
                return response()->json([
                    "C" => 102,
                    "R" => ["success" => 0],
                    "M" => "You have entered an invalid Special Access key."
                ]);
            }



            // Validate Paystack Keys via API
            $endpoint = config('custom.paystack.paySessTime');
            $headers = [
                "Authorization: Bearer $secretKey",
                "Content-Type: application/json"
            ];

            $result = makeCurlRequest($endpoint, 'GET', $headers, null, false);
            $result = json_decode($result, true);

            if (isset($result["status"]) && $result["status"] === true) {
                // Save keys
                $updateData = [
                    "paystack" => json_encode([
                        "secretkey" => $secretKey,
                        "publickey" => $publicKey
                    ])
                ];

                SuperAdmin_model::where("id", $adminId)->update($updateData);

                return response()->json([
                    "C" => 100,
                    "R" => [
                        "success" => 1,
                        "apiresponse" => $result
                    ],
                    "M" => "Your keys have been passed."
                ]);
            } else {
                // Invalid API Keys
                return response()->json([
                    "C" => 101,
                    "R" => [
                        "success" => 0,
                        "apiresponse" => $result
                    ],
                    "M" => "Ensure that you provide the correct authorization key for the request."
                ]);
            }
        }else{

            $this->clearSession();
            //redirect to login
            //return Redirect::to(url('/'));

            return response()->json([
                "C" => 1004,
                "R" => ["success" => 0],
                "M" => "Your session has expired. Please log in again to continue."
            ]);
        }

    }
    
    function saveemailsettings(Request $request){
        if ($this->USERID <= 0) {
            return response()->json([
                "C" => 1004,
                "R" => ["success" => 0],
                "M" => "Your session has expired. Please log in again to continue."
            ]);
        }
        
        if($this->USERID > 0 && $this->USERROLE == 3){
            $sakey = $request->input("sakey");
            $host = $request->input("host");
            $port = $request->input("port");
            $username = $request->input("username");
            $password = $request->input("password");
            $encryption = $request->input("encryption");
            $from_email = $request->input("from_email");
            $from_name = $request->input("from_name");
            $replyTo_email = $request->input("replyTo_email");
            $replyTo_name = $request->input("replyTo_name");            
            
            $adminId = $this->USERID;
            
            $postBackData = array();

            // Validate Special Access Key
            $settingsRow = SuperAdmin_model::select("specialAccessKey")->find($adminId);

            if (!$settingsRow || $settingsRow->specialAccessKey !== $sakey) {
                return response()->json([
                    "C" => 102,
                    "R" => ["success" => 0],
                    "M" => "You have entered an invalid Special Access key."
                ]);
            }

            $updateData = array();
            $updateData["smtp"] = json_encode(
                                        array(
                                            "host" => $host,
                                            "port" => $port,
                                            "username" => $username,
                                            "password" => $password,
                                            "encryption" => $encryption,
                                            "from_email" => $from_email,
                                            "from_name" => $from_name,   
                                            "replyTo_email" => $replyTo_email,
                                            "replyTo_name" => $replyTo_name
                                        )
                                    );

            $update = SuperAdmin_model::where("id", $adminId)->update($updateData);    
            
            $postBackData["success"] = 1;
            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Your SMTP settings have been saved successfully."
            );
            
            return response()->json($response);  
        }else{
            $this->clearSession();
            //redirect to login
            //return Redirect::to(url('/'));
            return response()->json([
                "C" => 1004,
                "R" => ["success" => 0],
                "M" => "Your session has expired. Please log in again to continue."
            ]);
        }
        
    }
    
    function sendTestEmail(Request $request){
        if($this->USERID > 0 && $this->USERROLE == 3){
            $adminId = $this->USERID;
            $settings = SuperAdmin_model::select("fname", "lname", "email", "smtp")->where("id",$adminId)->first()->toArray();
            
            $toName = ucwords($settings["fname"] ." ". $settings["lname"]);
            $toEmail = $settings["email"];
            
            $smtp = json_decode($settings["smtp"], true);
            
            // send welcome email email
            $param = [
                "firstName" => ucfirst($settings["fname"]),
                "lastName" => ucfirst($settings["lname"]),
                "adminName" => $toName,
                "email" => $toEmail,
                "receiver" => 1,
                "sender" => 1,
                "purpose" => "testemail"
            ];
            //SmartRecruit test email.
            EmailHelper::sendEmail($param);
            
            //if($result === true){
                $postBackData = array();
                $postBackData["success"] = 1;
                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "Your SMTP configuration has been successfully passed."
                );
            /*}else{
                $postBackData = array();
                $postBackData["success"] = 0;
                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "Connection could not be established with host \"$host\""
                );
            }*/

        }else{
            
            $this->clearSession();  

            $postBackData = array();
            $postBackData["success"] = 0;
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "Your session has expired. Please log in again to continue."
            );
        }

        return response()->json($response); die;                
    }

    function generateaccesskey(Request $request){
        if($this->USERID > 0 && $this->USERID == 1 && $this->USERROLE == 3){

            $updateDateTime = date("Y-m-d H:i:s");
            //generate access key
            $length = 12;
            $specialAccessKey = Str::random($length).time();
            $specialAccessKey = str_shuffle($specialAccessKey);
            
            SuperAdmin_model::where("id", $this->USERID)
            ->update(array("specialAccessKey" => $specialAccessKey, "updateDateTime" => $updateDateTime));

            $postBackData = array();
            $postBackData["success"] = 1;
            $postBackData["specialAccessKey"] = $specialAccessKey;
            
            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Your special access key has been generated successfully."
            );

        }else{
                
            $this->clearSession();  

            $postBackData = array();
            $postBackData["success"] = 0;
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "Your session has expired. Please log in again to continue."
            );
        }
    
        return response()->json($response); die;
    }

    function createuser(Request $request){

        if($this->USERID > 0 && $this->USERID == 1 && $this->USERROLE == 3){
            
            $adminId = $this->USERID;

            $sakey = $request->input("sakey");
            $fname = strtolower($request->input("fname"));
            $lname = strtolower($request->input("lname"));
            $email = strtolower($request->input("email"));
            $password = $request->input("password");
            $plainpassword = $password;
            $password = md5($password);
            // Validate Special Access Key
            $settingsRow = SuperAdmin_model::select("specialAccessKey")->where("role", 3)->where("id", $this->USERID)->first();

            if (!$settingsRow || $settingsRow->specialAccessKey !== $sakey) {
                return response()->json([
                    "C" => 101,
                    "R" => ["success" => 0],
                    "M" => "You have entered an invalid Special Access key."
                ]);
            }else{
                
                $emailCount = SuperAdmin_model::where("email", $email)->count();
                
                if($emailCount > 0){
                    return response()->json([
                        "C" => 102,
                        "R" => ["success" => 0],
                        "M" => "The entered email is already associated with us."
                    ]);
                }else{
                    //create subadmin
                    $id = db_randnumber();
                    $createdDateTime = date("Y-m-d H:i:s");
                    $updatedDateTime = date("Y-m-d H:i:s");
                    
                    $subAdminObj = new SuperAdmin_model();
                    $subAdminObj->id = $id;
                    $subAdminObj->fname = $fname;
                    $subAdminObj->lname = $lname;
                    $subAdminObj->email = $email;
                    $subAdminObj->password = $password;
                    $subAdminObj->role = 4;
                    $subAdminObj->createDateTime = $createdDateTime;
                    $subAdminObj->updateDateTime = $updatedDateTime;
                    $saved = $subAdminObj->save();

                    if($saved){
                        
                        $subAdminKeyObj = new SubadminAssets_model();
                        $subAdminKeyObj->subadminId = $id;
                        $subAdminKeyObj->subadmintext = $plainpassword;
                        $subAdminKeyObj->save();

                        $postBackData = array();
                        $postBackData["success"] = 1;
                        $postBackData["id"] = $id;
                        
                        
                        $response = array(
                            "C" => 100,
                            "R" => $postBackData,
                            "M" => "Subadmin has been created successfully."
                        );

                    }else{
                        
                        $postBackData = array();
                        $postBackData["success"] = 0;
                        
                        $response = array(
                            "C" => 103,
                            "R" => $postBackData,
                            "M" => "Something went wrong. Please try again."
                        );                        

                    }
                        
                }
            }

        }else{
            
            $this->clearSession();  

            $postBackData = array();
            $postBackData["success"] = 0;

            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "Your session has expired. Please log in again to continue."
            );

        }

        return response()->json($response); die;
    }

    function deleteuser(Request $request){
        if($this->USERID > 0 && $this->USERID == 1 && $this->USERROLE == 3){
            
            $adminId = $this->USERID;
            $subadminId = $request->input("subadminId");

            SuperAdmin_model::where("id", $subadminId)->delete();
            SubadminAssets_model::where("subadminId", $subadminId)->delete();

            $postBackData = array();
            $postBackData["success"] = 1;
            
            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Subadmin has been deleted successfully."
            );

        }else{
            
            $this->clearSession();  

            $postBackData = array();
            $postBackData["success"] = 0;

            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "Your session has expired. Please log in again to continue."
            );
        }

        return response()->json($response); die;
        
    }


    function clearSession(){
        
        $this->removeSession('fname');
        $this->removeSession('lname');
        $this->removeSession('email');
        $this->removeSession('id');
        $this->removeSession('role');
        $this->removeSession('referral_code');
        $this->removeSession('systemAdmin');

        //redirect to login
        //return Redirect::to(url('/'));
    }

    function uploadadphoto(Request $request){
        
        if($this->USERID > 0 && $this->USERID == 1 && $this->USERROLE == 3){
            
            $imgId = $request->input("imgId");    
            $base64Image = $request->input("imgData");    
            
            // Strip off the base64 prefix
            $imageData = explode(',', $base64Image);
            $imageData = $imageData[1];
            $imageName = $imgId.'.jpg'; 
            // Decode the base64 string into an image
            $decodedImage = base64_decode($imageData);

            $adDirPath = adImagesPath();
            
            // Ensure the directory structure exists
            // Laravel will create any missing directories
            Storage::disk('local')->makeDirectory($adDirPath);
            
            // Store the image in the appropriate folder
            Storage::disk('local')->put($adDirPath . $imageName, $decodedImage);  // Save the image
            

            //save ad data to db
            //adActive
            //adImages

            $adminId = $this->USERID;
            $resultRow = SuperAdmin_model::select("adImages")->where("id", $adminId)->first();

            $adImages = $resultRow->adImages;

            if (empty($adImages)) {
                $adImages = json_encode([]);
                $adImages = json_decode($adImages, true);
            } else {
                $adImages = json_decode($adImages, true);
            }

            // Add the new image name to the adImages array
            $adImages[] = $imageName;

            // Update the ad images in the database
            SuperAdmin_model::where("id", $adminId)->update(array("adImages" => json_encode($adImages)));

            // Return the relative path of the image for further processing
            //$path = userImagesDisplayPath($userId,$imageName);

            $path = route('private.adimage', ['filename' => $imageName]);

            $postBackData["path"] = $path;
            $postBackData["success"] = 1;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Image has been uploaded successfully."
            );
        
        }else{
            
            $this->clearSession();  

            $postBackData = array();
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;
    }

    function deleteadphoto(Request $request){
            
        if($this->USERID > 0 && $this->USERID == 1 && $this->USERROLE == 3){
            
            $imgId = $request->input("imgId"); 
            $imageName = $imgId.'.jpg';

            // Define the path of the file in the storage folder
            $adDirPath = adImagesPath();  // This should give you the path within storage/app
            $filePath = $adDirPath . $imageName;

            // Check if the file exists before attempting to delete it
            if (Storage::disk('local')->exists($filePath)) {
                // Delete the file
                $adminId = $this->USERID;
                $resultRow = SuperAdmin_model::select("adImages")->where("id", $adminId)->first();

                $adImages = $resultRow->adImages;

                if (!empty($adImages)) {
                    $adImages = json_decode($adImages, true);
                    
                    $key = array_search($imageName, $adImages);

                    // If the value exists in the array, remove it
                    if ($key !== false) {
                        unset($adImages[$key]);
                    }

                    // Update the ad images in the database
                    SuperAdmin_model::where("id", $adminId)->update(array("adImages" => json_encode($adImages)));

                }
                
                Storage::disk('local')->delete($filePath);

                $postBackData = array();
                $postBackData["imgId"] = $imgId;
                $postBackData["success"] = 1;
    
                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "Image deleted successfully."
                );

            } else {

                $postBackData = array();
                $postBackData["imgId"] = $imgId;
                $postBackData["success"] = 0;
    
                $response = array(
                    "C" => 101,
                    "R" => $postBackData,
                    "M" => "File not found."
                );
                
            }

        }else{
                
            $this->clearSession();  

            $postBackData = array();
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;
    }
    
    function activeAd(Request $request){
        
        if($this->USERID > 0 && $this->USERID == 1 && $this->USERROLE == 3){
            
            $adActive = $request->input("adActive");
            $adminId = $this->USERID;

            // Update the ad images in the database
            SuperAdmin_model::where("id", $adminId)->update(array("adActive" => $adActive));

            $postBackData = array();
            $postBackData["success"] = 1;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => ($adActive == 1) ? "Advertisement is on." : "Advertisement is off."
            );

        }else{

            $this->clearSession();  

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
<?php

namespace App\Http\Controllers\Employer;
use App\Http\Controllers\Employer\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Users_model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

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
            $user = Users_model::select("id", "companyname", "position", "industry", "companysize", "website", "email", "fname", "lname", "gender", "phone", "city", "state", "country", "zipcode", "address_1", "address_2")
            ->where("id", $userId)
            ->first();
            
            $data = array();
            $data["pageTitle"] = "My Profile";
            $data["user"] = $user;
            return View("employer.profile",$data);
        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
    }

    function saveprofile(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID; 
            
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

}

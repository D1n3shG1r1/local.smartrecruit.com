<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\SuperAdmin_model;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{
    
    function aboutus(){
        
        //get advertisement
        $adminId = 1;
        $adRow = SuperAdmin_model::select("adActive", "adImages")->where("id",$adminId)->first();

        $ad = array(
            "adActive" => $adRow->adActive,
            "adImages" => json_decode($adRow->adImages, true)
        );

        $data = array();
        $data["pageTitle"] = "About Us";
        $data["ad"] = $ad;
        
        return View("aboutus",$data);
    }
    
    function howtouse(){
        
        $data = array();
        $data["pageTitle"] = "How to use";
        
        return View("howtouse",$data);
    }

    function faq(){

        $data = array();
        $data["pageTitle"] = "FAQ";
        
        return View("faq",$data);
    }

    function privacypolicy(){
        $data = array();
        $data["pageTitle"] = "Privacy Policy";
        
        return View("privacypolicy",$data);
    }

    function pricing(){

        $data = array();
        $data["pageTitle"] = "Pricing";
        
        return View("pricing",$data);
    }
}


<?php
/* candidate's CV-Information like skills & qualification*/
namespace App\Http\Controllers\Candidate;
use App\Http\Controllers\Candidate\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Users_model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
            
            $cvdata = [];
            $data = array();
            $data["pageTitle"] = "My CV";
            $data["cvdata"] = $cvdata;
            return View("candidate.resumeform",$data);
        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
    }
}
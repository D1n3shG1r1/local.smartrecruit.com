<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Employer\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Dashboard extends Controller
{
    var $USERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
    }

    function dashboard(Request $request){
        if($this->USERID > 0){
            
            $data = array();
            $data["pageTitle"] = "Dashboard";
            
            return View("candidate.dashboard",$data);

        }else{
            //redirect to login
            return Redirect::to(url());
        }
    }
}

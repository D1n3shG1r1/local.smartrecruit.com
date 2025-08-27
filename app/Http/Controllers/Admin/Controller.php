<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as Session_N;
use App\Models\Users_model;
use App\Models\CandidateResumeData_model;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function __construct(){

        //getSetClientTimezone(get_client_ip());
        
        $tmpId = $this->getSession('id');
        $tmpRole = $this->getSession('role');
        $tmpFName = $this->getSession('fname');
        $tmpLName = $this->getSession('lname');
        $tmpEmail = $this->getSession('email');
        $notificationsCount = 0;
        $incompleteProfile = 0;
        
        view()->share('LOGINUSER',array("userId" => $tmpId, "fname" => $tmpFName, "lname" => $tmpLName, "email" => $tmpEmail, "notificationsCount" => $notificationsCount, "incompleteProfile" => $incompleteProfile, "role" => $tmpRole));
        
    }

    function setSession($key, $value){
        $session = new Session_N();
        $session->set($key, $value);
    }
    
    function getSession($key){
        $session = new Session_N();
        return $session->get($key);
    }

    function removeSession($key){
        $session = new Session_N();
        $session->remove($key);
    }
}


<?php
namespace App\Http\Controllers\Employer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as Session_N;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function __construct(){

        //getSetClientTimezone(get_client_ip());
        
        $tmpId = $this->getSession('id');
        $tmpEmail = $this->getSession('role');
        $tmpFName = $this->getSession('fname');
        $tmpLName = $this->getSession('lname');
        $tmpEmail = $this->getSession('email');
        
        view()->share('LOGINUSER',array("fname" => $tmpFName, "lname" => $tmpLName,"email" => $tmpEmail));
        
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


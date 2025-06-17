<?php
namespace App\Http\Controllers\Candidate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as Session_N;
use App\Models\Users_model;

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
        
        $incompleteProfile = 0;
        
        if($tmpId){
            $userObj = Users_model::select("fname", "lname", "address_1", "address_2", "city", "country", "zipcode", "phone", "email")->where("id", $tmpId)->first(); 
            
            if (
                empty($userObj->fname) ||
                empty($userObj->lname) ||
                empty($userObj->email) ||
                empty($userObj->phone) ||
                empty($userObj->address_1) ||
                empty($userObj->address_2) ||
                empty($userObj->city) ||
                empty($userObj->country)
                
            ) {
                $incompleteProfile = 1;
            } else {
                $incompleteProfile = 0;
            }
        }
        
        view()->share('LOGINUSER',array("fname" => $tmpFName, "lname" => $tmpLName,"email" => $tmpEmail, "incompleteProfile" => $incompleteProfile));
        
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


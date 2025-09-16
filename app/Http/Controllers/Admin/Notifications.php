<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Notification_model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Helpers\EmailHelper;

class Notifications extends Controller
{
    var $USERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
    }

    function notifications(Request $request) {
        if ($this->USERID > 0) {
            $userId = $this->USERID;
            $page = $request->input('page', 1);
    
            $notifications = Notification_model::select(
                    'notifications.*',
                    'customers.fname as fname',
                    'customers.lname as lname'
                )
                ->join('customers', 'notifications.sender', '=', 'customers.id')
                ->where('notifications.receiver', $userId)
                //->where('notifications.isRead', 0)
                ->orderBy('notifications.dateTime', 'desc')
                ->paginate(10, ['*'], 'page', $page);
    
            $data = array();
            $data["pageTitle"] = "Notifications";
            $data["notifications"] = $notifications;
    
            return view("admin.notifications", $data);
        } else {
            return Redirect::to(url('/'));
        }
    }
    

    function loadMore(Request $request){
        $userId = $this->USERID;
        
        $page = $request->input('page', 1);

        /*
        $notifications = Notification_model::where('receiver', $userId)
        ->where('isRead', 0)
        ->orderBy('dateTime', 'desc')
        ->paginate(10, ['*'], 'page', $page);
        */

        $notifications = Notification_model::select(
            'notifications.*',
            'customers.fname as fname',
            'customers.lname as lname'
        )
        ->join('customers', 'notifications.sender', '=', 'customers.id')
        ->where('notifications.receiver', $userId)
        ->where('notifications.isRead', 0)
        ->orderBy('notifications.dateTime', 'desc')
        ->paginate(10, [], 'page', $page); // fixed here
        
        return view('admin.partials.notifiations-list', compact('notifications'))->render();
    }


    function sendmessage(Request $request){
        //send message/email to recruiter and candidate
    
        if($this->USERID > 0){
            //$userId = $this->USERID; 
            
            
            $recieverId = $request->input("recieverId");
            $recieverFname = $request->input("recieverFname");;
            $recieverLname = $request->input("recieverLname");;
            $recieverEmail = $request->input("recieverEmail");
            $subject = $request->input("subject");
            $message = $request->input("message");
           
            $param = [
                "firstName" => $recieverFname,
                "lastName" => $recieverLname,
                "email" => $recieverEmail,
                "subject" => $subject,
                "message" => $message,
                "receiver" => $recieverId,
                "sender" => 1,
                "purpose" => "custommessage"
            ];
            
            EmailHelper::sendEmail($param);

            $postBackData = array();
            $postBackData["success"] = 1;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Message sent successfully."
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

}
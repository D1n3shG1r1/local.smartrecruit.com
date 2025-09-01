<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Candidate\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users_model;
use App\Models\shortlistCandidates_model;
use App\Models\purchasedCandidates_model;
use App\Models\Notification_model;
//use App\Models\Package_model;
use App\Models\FeaturedCandidate_model;
use App\Models\SuperAdmin_model;
use App\Helpers\EmailHelper;
use Carbon\Carbon;

class Dashboard extends Controller
{
    var $USERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
    }

    function dashboard(Request $request){
        if($this->USERID > 0){
            
            $userId = $this->USERID;
            
            
            //bookmarks graph
            // Get the current date
            $currentDate = Carbon::now();

            // Define the start and end of the current week (Sunday to Saturday)
            $startOfWeek = $currentDate->copy()->startOfWeek(); // Sunday
            $endOfWeek = $currentDate->copy()->endOfWeek();     // Saturday

            // Get all bookmarks for the current week for the recruiter
            $bookmarksChartDataObj = shortlistCandidates_model::where("candidateId", $userId)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

            // Initialize array for weekly counts by day
            $bookmarkByDay = [
                'Sunday' => 0,
                'Monday' => 0,
                'Tuesday' => 0,
                'Wednesday' => 0,
                'Thursday' => 0,
                'Friday' => 0,
                'Saturday' => 0,
            ];

            // Loop through each bookmark and increment count based on day of the week
            foreach ($bookmarksChartDataObj as $bkmrk) {
                $dayOfWeek = Carbon::parse($bkmrk->created_at)->format('l'); // e.g., "Monday"
                if (isset($bookmarkByDay[$dayOfWeek])) {
                    $bookmarkByDay[$dayOfWeek]++;
                }
            }

            // Final chart data for frontend (labels & values)
            $bookmarksChartData = [
                'labels' => array_keys($bookmarkByDay),
                'values' => array_values($bookmarkByDay),
            ];


            //purchased graph
            // Get the current date
            $currentDate = Carbon::now();

            // Define the start and end of the current week (Sunday to Saturday)
            $startOfWeek = $currentDate->copy()->startOfWeek(); // Sunday
            $endOfWeek = $currentDate->copy()->endOfWeek();     // Saturday

            // Get all bookmarks for the current week for the recruiter
            $purchasedChartDataObj = purchasedCandidates_model::where("candidateId", $userId)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

            // Initialize array for weekly counts by day
            $purchasedByDay = [
                'Sunday' => 0,
                'Monday' => 0,
                'Tuesday' => 0,
                'Wednesday' => 0,
                'Thursday' => 0,
                'Friday' => 0,
                'Saturday' => 0,
            ];

            // Loop through each bookmark and increment count based on day of the week
            foreach ($purchasedChartDataObj as $prchsd) {
                $dayOfWeek = Carbon::parse($prchsd->created_at)->format('l'); // e.g., "Monday"
                if (isset($purchasedByDay[$dayOfWeek])) {
                    $purchasedByDay[$dayOfWeek]++;
                }
            }

            // Final chart data for frontend (labels & values)
            $purchasedChartData = [
                'labels' => array_keys($purchasedByDay),
                'values' => array_values($purchasedByDay),
            ];


            //notification count 
            $notificationsCount = Notification_model::where('receiver', $userId)
            ->where('isRead', 0)
            ->count();

            //current package
            $currentPlan = FeaturedCandidate_model::where("userId", $userId)->first();
            
            //purchased/bookmarks count
            $bookmarksCount = shortlistCandidates_model::where("candidateId", $userId)->count();
            
            $purchaseCount = purchasedCandidates_model::where("candidateId", $userId)->count();
            
            $data = array();
            $data["pageTitle"] = "Dashboard";
            $data["purchaseCount"] = $purchaseCount;
            $data["bookmarksCount"] = $bookmarksCount;
            $data["currentPlan"] = $currentPlan;
            $data["notificationsCount"] = $notificationsCount;
            $data["bookmarksChartData"] = $bookmarksChartData;
            $data["purchasedChartData"] = $purchasedChartData;
            
            return View("candidate.dashboard",$data);

        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
    }

    function sendmessage(Request $request){
        // save quote pending
        if($this->USERID > 0){
            
            $message = $request->input("message");
            
            $tmpUserId = $this->getSession('id');
            $fname = $this->getSession('fname');
            $lname = $this->getSession('lname');
            $email = $this->getSession('email');
            $role = $this->getSession('role');
            $referral_code = $this->getSession('referral_code');
            $customerName = ucwords($fname);
            $customerEmail = $email;
            $additionalMessage = $message;

            $sysAdmId = 1;
            $sysAdm = SuperAdmin_model::where("id", $sysAdmId)->first();
            
            //Email
            $toEmail = $sysAdm["email"];
            $toName = ucwords($sysAdm["fname"] ." ". $sysAdm["lname"]);
            $adminName = $toName;
            
            $param = [
                "firstName" => $sysAdm["fname"],
                "lastName" => $sysAdm["lname"],
                "email" => $toEmail,
                "role" => $role,
                "adminName" => $adminName,
                "customerName" => $customerName,
                "customerEmail" => $customerEmail,
                "referalCode" => $referral_code,
                "additionalMessage" => $additionalMessage,
                "receiver" => 1,
                "sender" => $tmpUserId,
                "purpose" => "contactadmin"
            ];
            
            EmailHelper::sendEmail($param);
            

            $postBackData = array();
            $postBackData["success"] = 1;
            
            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Your request has been submitted. We will contact you shortly."
            );
            
        }else{
            $postBackData = array();
            $postBackData["success"] = 0;
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;       
        
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users_model;
use App\Models\Packagepayments_model;
use App\Models\Notification_model;
use App\Models\Package_model;
use Carbon\Carbon;

class Dashboard extends Controller
{
    var $USERID = 0;
    var $USERROLE = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
        $this->USERROLE = $this->getSession('role');
    }

    function dashboard(Request $request){
        //&& $this->USERROLE == 3
        if($this->USERID > 0){
            
            $userId = $this->USERID;
            
           
            //candidates graph
            // Get the current date
            $currentDate = Carbon::now();

            // Define the start and end of the current week (Sunday to Saturday)
            $startOfWeek = $currentDate->copy()->startOfWeek(); // Sunday
            $endOfWeek = $currentDate->copy()->endOfWeek();     // Saturday

            // Get all candidates for the current week for the recruiter
            $candidatesChartDataObj = Users_model::where("role", 1)
            ->whereBetween('createdDateTime', [$startOfWeek, $endOfWeek])
            ->get();

            // Initialize array for weekly counts by day
            $candidatesByDay = [
                'Sunday' => 0,
                'Monday' => 0,
                'Tuesday' => 0,
                'Wednesday' => 0,
                'Thursday' => 0,
                'Friday' => 0,
                'Saturday' => 0,
            ];

            // Loop through each bookmark and increment count based on day of the week
            foreach ($candidatesChartDataObj as $cndtRw) {
                $dayOfWeek = Carbon::parse($cndtRw->createdDateTime)->format('l'); // e.g., "Monday"
                if (isset($candidatesByDay[$dayOfWeek])) {
                    $candidatesByDay[$dayOfWeek]++;
                }
            }

            // Final chart data for frontend (labels & values)
            $candidatesChartData = [
                'labels' => array_keys($candidatesByDay),
                'values' => array_values($candidatesByDay),
            ];


            //purchased graph
            // Get the current date
            $currentDate = Carbon::now();

            // Define the start and end of the current week (Sunday to Saturday)
            $startOfWeek = $currentDate->copy()->startOfWeek(); // Sunday
            $endOfWeek = $currentDate->copy()->endOfWeek();     // Saturday

            // Get all recruiters for the current week for the recruiter
            $recruiterChartDataObj = Users_model::where("role", 2)
            ->whereBetween('createdDateTime', [$startOfWeek, $endOfWeek])
            ->get();

            // Initialize array for weekly counts by day
            $recruitersByDay = [
                'Sunday' => 0,
                'Monday' => 0,
                'Tuesday' => 0,
                'Wednesday' => 0,
                'Thursday' => 0,
                'Friday' => 0,
                'Saturday' => 0,
            ];

            // Loop through each bookmark and increment count based on day of the week
            foreach ($recruiterChartDataObj as $rctRw) {
                $dayOfWeek = Carbon::parse($rctRw->createdDateTime)->format('l'); // e.g., "Monday"
                if (isset($recruitersByDay[$dayOfWeek])) {
                    $recruitersByDay[$dayOfWeek]++;
                }
            }

            // Final chart data for frontend (labels & values)
            $recruiterChartData = [
                'labels' => array_keys($recruitersByDay),
                'values' => array_values($recruitersByDay),
            ];

            $candidatesChartData['values_2'] = array_values($recruitersByDay);

            //weekely sales chart data
            // Get all the payments for the current week with status 'success' and payment 'y'
            $salesResult = Packagepayments_model::select('amount', 'createDateTime')
            ->where('status', 'success')
            ->where('payment', 'y')
            ->whereBetween('createDateTime', [$startOfWeek, $endOfWeek])
            ->get();

            // Initialize array for weekly sales by day
            $salesByDay = [
                'Sunday' => 0,
                'Monday' => 0,
                'Tuesday' => 0,
                'Wednesday' => 0,
                'Thursday' => 0,
                'Friday' => 0,
                'Saturday' => 0,
            ];

            // Loop through the sales results and calculate total revenue for each day
            foreach ($salesResult as $sale) {
                // Get the day of the week for the transaction
                $dayOfWeek = Carbon::parse($sale->createDateTime)->format('l'); // e.g., "Monday"

                // Add the amount to the correct day
                if (isset($salesByDay[$dayOfWeek])) {
                    $tmpSalesAmount = floor($sale->amount / 100); // convert to NGN
                    $salesByDay[$dayOfWeek] += $tmpSalesAmount;
                }
            }

            // Final chart data for frontend (labels & values)
            $salesChartData = [
                'labels' => array_keys($salesByDay),
                'values' => array_values($salesByDay),
            ];


            //total sales amount
            $result = Packagepayments_model::selectRaw('FLOOR(SUM(amount) / 100) as totalRevenue')
            ->where('status', 'success')
            ->where('payment', 'y')
            ->first();

            $totalRevenue = $result->totalRevenue ?? 0;
            $totalRevenue = formatRevenue($totalRevenue);

            $candidatesCount = Users_model::where("role", 1)->count();
            $recruitersCount = Users_model::where("role", 2)->count();
            $notificationsCount = Notification_model::where('receiver', $userId)
            ->where('isRead', 0)->count();

            $candidatesCount = formatRevenue($candidatesCount);
            $recruitersCount = formatRevenue($recruitersCount);
            $notificationsCount = formatRevenue($notificationsCount);

            $data = array();
            $data["pageTitle"] = "Dashboard";
            $data["candidatesCount"] = $candidatesCount;
            $data["recruitersCount"] = $recruitersCount;
            $data["revenue"] = $totalRevenue;
            $data["notificationsCount"] = $notificationsCount;
            $data["candidatesChartData"] = $candidatesChartData;
            $data["recruiterChartData"] = $recruiterChartData;
            $data["salesChartData"] = $salesChartData;
            
            
            return View("admin.dashboard",$data);

        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Packagepayments_model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Transactions extends Controller
{
    var $USERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
    }

    function transactions(Request $request){
        
        if ($this->USERID > 0) {
            

            //total sales amount
            $result = Packagepayments_model::selectRaw('FLOOR(SUM(amount) / 100) as totalRevenue')
            ->where('status', 'success')
            ->where('payment', 'y')
            ->first();

            $totalRevenue = $result->totalRevenue ?? 0;
            $totalRevenue = formatRevenue($totalRevenue);

            $transactions = Packagepayments_model::select(
                'customers.id as profile_id',
                'customers.fname as fname',
                'customers.lname as lname',
                'customers.role as role',
                'packagepayments.id as transactionRowId',
                'packagepayments.transactionId as transactionId',
                'packagepayments.gatewayTransId as gatewayTransId',
                'packagepayments.userId as userId',
                'packagepayments.package as package',
                'packagepayments.amount as amount',
                'packagepayments.currency as currency',
                'packagepayments.status as status',
                'packagepayments.createDateTime as createDateTime'
            )
            ->join('customers', 'packagepayments.userId', '=', 'customers.id')
            ->orderBy('createDateTime', 'desc')->paginate(10);
            
            $data = array();
            $data["pageTitle"] = "Transactions";
            $data["totalRevenue"] = $totalRevenue;
            $data["transactions"] = $transactions;
            
            return view("admin.transactions", $data);

        } else {
            return Redirect::to(url('/'));
        }

    }
}

?>
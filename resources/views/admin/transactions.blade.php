@extends("app")
@section("contentbox")
<style>

.page_title h2 {
    font-size: 20px;
    font-weight: 500;
    color: #15283c;
    width: fit-content;
}

.totalRevenue {
    float: right;
    font-size: 18px;
    font-weight: 500;
    margin-top: -23px;
}

</style>

<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>All Transactions</h2>
                <span class="totalRevenue recruit_blue_text">Total Revenue: {{config("custom.baseCurrency.symbol")}} {{$totalRevenue}}</span>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0"><h2>Transactions List</h2></div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                        <!--
                        profile_id
                        fname
                        lname 
                        transactionRowId
                        transactionId
                        gatewayTransId
                        userId
                        package
                        amount
                        currency
                        status
                        createDateTime
                        -->
                            <th>#</th>
                            <th data-bs-toggle="tooltip" data-bs-placement="top" title="Transaction Ref-ID">Transaction Ref-ID</th>
                            <th data-bs-toggle="tooltip" data-bs-placement="top" title="Paystack Transaction-ID">Transaction-ID</th>
                            <th>Name</th>
                            <th>Package</th>
                            <th>Amount ({{config("custom.baseCurrency.symbol")}})</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(!empty($transactions)){
                            foreach($transactions as $k => $row){
                                $profile_id = $row->profile_id;
                                $fname = $row->fname;
                                $lname = $row->lname;
                                $role = $row->role;
                                $id = $row->id;
                                $transactionId = $row->transactionId;
                                $gatewayTransId = $row->gatewayTransId;
                                $userId = $row->userId;
                                $package = $row->package;
                                $amount = $row->amount/100;
                                $currency = $row->currency;
                                $status = $row->status;
                                $createDateTime = $row->createDateTime;
                                $createDate = date("M d, Y", strtotime($createDateTime));

                                if($role == 1){
                                    $fullName = ucwords($fname ." ". $lname);    
                                }else{
                                    $fullName = ucwords($fname);
                                }
                                
                                $packageName = config("custom.pricing.".$package.".name");

                        ?>
                                
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$transactionId}}</td>
                            <td>{{$gatewayTransId}}</td>
                            <td>
                                @if($role == 1)
                                <a href="{{url('admin/candidate/'.$userId)}}">{{$fullName}}</a>
                                @else 
                                <a href="{{url('admin/recruiter/'.$userId)}}">{{$fullName}}</a>
                                @endif    
                            </td>
                            <td>{{$packageName}}</td>
                            <td>{{$amount}}</td>
                            <td>{{$status}}</td>
                            <td>{{$createDate}}</td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
                </div>
                
                <div class="btn-group mr-2 pagination button_section button_style2">
                {{ $transactions->links() }}
                </div>

            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@push("js")
@endpush
@extends("app")
@section("contentbox")
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Payment</h2>
                </div>
            </div>
        </div>
    
        <!-- row -->
        <div class="row column1">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="white_shd full margin_bottom_30 _success _failed">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            <h2>Your payment failed! Try again later.</h2>
                        </div>
                    </div>
                    <!--<div class="full price_table padding_infor_info">
                        <div class="row">
                            Try again later
                        </div>
                        <div class="col-md-2"></div>
                    </div>-->
                </div>
            <!-- end row -->
            </div>
        </div>
    </div>
</div>
@endsection
@push("js")
@endpush
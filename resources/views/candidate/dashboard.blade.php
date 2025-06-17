@extends("app")
@section("contentbox")
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Dashboard</h2>
                </div>
        </div>
        </div>
        <div class="row column1">
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 yellow_bg">
                <div class="couter_icon">
                    <div> 
                    <i class="fa fa-group"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no"></p>
                    <p class="head_couter">My Applicants</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 blue1_bg">
                <div class="couter_icon">
                    <div> 
                    <i class="fa fa-file-text-o"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no"></p>
                    <p class="head_couter">My Applications</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 green_bg">
                <div class="couter_icon">
                    <div> 
                    <i class="fa fa-clock-o"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no" title="Pending Applications"></p>
                    <p class="head_couter" title="Pending Applications">Pending</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div style="padding-bottom: 7px;" class="full counter_section margin_bottom_30 red_bg">
                <div class="couter_icon">
                    <div> 
                    <i class="fa fa-database"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no"></p>
                    <p style="font-size: 0.80rem;" class="head_couter">Verification Limit
                        <br>
                        Package:
                    </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection
@push("js")
<script></script>
@endpush
@extends("app")
@section("contentbox")

@php
@endphp

<style>
.truncate {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

#fc_slider.carousel, #bc_slider.carousel {
    width: 86%;
    margin: 35px 7% 35px;
}

#fc_slider .carousel-inner, #bc_slider .carousel-inner {
    padding: 0;
    text-align: center;
}

#fc_slider.carousel .item, #bc_slider.carousel .item {
    color: #999;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    min-height: auto;
}

#fc_slider.carousel .img-box, #bc_slider.carousel .img-box {
    width: 120px;
    height: 120px;
    margin: 0 auto;
    border-radius: 50%;
}

#fc_slider.carousel .img-box img, #bc_slider.carousel .img-box img {
    width: 100%;
    height: 100%;
    display: block;
    border-radius: 50%;
}

#fc_slider.carousel .testimonial, #bc_slider.carousel .testimonial {
    padding: 30px 0 10px;
    color: rgba(255, 255, 255, .7);
    font-size: 15px;
    line-height: 24px;
}

#fc_slider.carousel .overview, #bc_slider.carousel .overview {
    text-align: center;
    padding-bottom: 5px;
    font-size: 14px;
    color: #1ed085;
    font-weight: 500;
    line-height: 14px;
}

#fc_slider.carousel .overview b, #bc_slider.carousel .overview b {
    color: #fff;
    font-size: 16px;
    text-transform: none;
    display: block;
    padding-bottom: 5px;
    font-weight: 500;
}

#fc_slider.carousel .carousel-control.left, #bc_slider.carousel .carousel-control.left {
    left: auto;
    right: 40px;
}

#fc_slider.carousel .carousel-control, #bc_slider.carousel .carousel-control {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #fff;
    text-shadow: none;
    top: 0;
    opacity: 1;
}

#fc_slider.carousel .carousel-control i, #bc_slider.carousel .carousel-control i {
    font-size: 20px;
    margin-right: 2px;
    color: #15283c;
    margin-top: -2px;
}

</style>

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
            <div class="full counter_section counter_section_padding margin_bottom_30 recruit_blue">
                <div class="couter_icon">
                    <div> 
                    <i class="bi bi-person-vcard"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no">{{$candidatesCount}}</p>
                    <p class="head_couter">Candidates</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section counter_section_padding margin_bottom_30 recruit_blue">
                <div class="couter_icon">
                    <div> 
                    <i class="fa fa-briefcase" style="margin-top: 26px;"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no">{{$recruitersCount}}</p>
                    <p class="head_couter">Recruiters</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section counter_section_padding margin_bottom_30 recruit_blue">
                <div class="couter_icon">
                    <div> 
                    <i style="line-height: 76px;" class="fa fa-bell-o"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no">{{$notificationsCount}}</p>
                    <p class="head_couter">Notifications</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="full counter_section counter_section_padding margin_bottom_30 recruit_blue">
                <div class="couter_icon">
                    <div> 
                    <i style="line-height: 76px;" class="dbi dbi-coin">{{config('custom.baseCurrency.symbol')}}</i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no" title="Pending Applications">{{$revenue}}</p>
                    <p class="head_couter" title="Pending Applications">Revenue</p>
                    </div>
                </div>
            </div>
        </div>
        
        </div>


        <!-- graph -->
        <div class="row column2 graph margin_bottom_30">
            <div class="col-md-6 col-lg-6">
                <div class="white_shd full">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                        <h2>Weekly Users</h2>
                        </div>
                    </div>
                    <div class="full graph_revenue">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="content">
                                <div class="area_chart">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <canvas id="users_chart"></canvas>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="white_shd full">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                        <h2>Weekly Sales</h2>
                        </div>
                    </div>
                    <div class="full graph_revenue">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="content">
                                <div class="area_chart">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <canvas id="sales_chart"></canvas>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / - graph -->
@endsection
@push("js")
<script>

//users_chart

 
$(function () {
    var candidatesChartData = @json($candidatesChartData);
    var salesChartData = @json($salesChartData);
    
    new Chart(document.getElementById("users_chart").getContext("2d"), getChartJs('line', candidatesChartData,"Candidates"));
    new Chart(document.getElementById("sales_chart").getContext("2d"), getSalesChartJs('line', salesChartData,"Sales ₦"));
});

function getChartJs(type, data, title) {
 var config = null;

 if (type === 'line') {
   config = {
     type: 'line',
     data: {
       labels: data.labels,
       datasets: [{
        label: "Candidates", //title,
        data: data.values,
        borderColor: 'rgba(33, 150, 243, 1)',
        backgroundColor: 'rgba(33, 150, 243, 0.2)',
        pointBorderColor: 'rgba(33, 150, 243, 1)',
        pointBackgroundColor: 'rgba(255, 255, 255, 1)',
        pointBorderWidth: 1,
        fill:false
       },
       {
        label: "Recruiters", //title,
        data: data.values_2,
        borderColor: 'rgba(30, 208, 133, 1)',
        backgroundColor: 'rgba(30, 208, 133, 0.3)',
        pointBorderColor: 'rgba(255, 87, 34, 0)',
        pointBackgroundColor: 'rgba(255, 87, 34, 0)',
        pointBorderWidth: 1,
        fill:false
       }]
     },
     options: {
       responsive: true,
       legend: false,
       /*scales: {
            y: {
                beginAtZero: true,  // Start the Y-axis at zero
                min: 0,  // Explicitly set minimum value for Y-axis to 0
                ticks: {
                    stepSize: 1,  // Set step size to 1, or adjust as needed
                    callback: function(value) {
                        return Number.isInteger(value) ? value : '';  // Ensure integer values only
                    }
                }
            }
        }*/
     }
   }
 }
 
 return config;
}

function getSalesChartJs(type, data, title) {
 var config = null;

 if (type === 'line') {
   config = {
     type: 'line',
     data: {
       labels: data.labels,
       datasets: [{
        label: title,
        data: data.values,
        borderColor: 'rgba(33, 150, 243, 1)',
        backgroundColor: 'rgba(33, 150, 243, 0.2)',
        pointBorderColor: 'rgba(33, 150, 243, 1)',
        pointBackgroundColor: 'rgba(255, 255, 255, 1)',
        pointBorderWidth: 1,
        fill:false
       }]
     },
     options: {
       responsive: true,
       legend: false,
       /*scales: {
            y: {
                beginAtZero: true,  // Start the Y-axis at zero
                min: 0,  // Explicitly set minimum value for Y-axis to 0
                ticks: {
                    stepSize: 1,  // Set step size to 1, or adjust as needed
                    callback: function(value) {
                        return Number.isInteger(value) ? value : '';  // Ensure integer values only
                    }
                }
            }
        }*/
     }
   }
 }
 
 return config;
}
</script>
@endpush
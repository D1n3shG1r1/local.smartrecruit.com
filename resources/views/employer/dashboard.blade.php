@extends("app")
@section("contentbox")

@php
$userId = $currentPlan->userId;
$package = $currentPlan->package;
/*
$active = $currentPlan->active;
$starton = $currentPlan->starton;
$expireon = $currentPlan->expireon;
$expired = $currentPlan->expired;
$candidatePurchaseLimit = $currentPlan->candidatePurchaseLimit;
$candidatePurchased = $currentPlan->candidatePurchased;
$createDateTime = $currentPlan->createDateTime;
$updateDateTime = $currentPlan->updateDateTime;
*/
$pricing = config('custom.pricing');
$payasyougo = $pricing["payasyougo"]; //name price candidatelimit
$basicaccess = $pricing["basicaccess"]; //name price candidatelimit
$recruiterspackage = $pricing["recruiterspackage"]; //name price candidatelimit
$custompackage = $pricing["custompackage"]; //name price candidatelimit
if($package == ''){
    $package = 'No package selected';
    $packageName = 'No package selected';
}else{
    $packageName = $pricing[$package]["name"];
}

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
                    <i class="bi bi-clipboard-check"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no">{{$myCandidatesCount}}</p>
                    <p class="head_couter">My Candidates</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section counter_section_padding margin_bottom_30 recruit_blue">
                <div class="couter_icon">
                    <div> 
                    <i class="bi bi-bookmark-star"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no">{{$bookmarksCount}}</p>
                    <p class="head_couter">My Bookmarks</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section counter_section_padding margin_bottom_30 recruit_blue">
                <div class="couter_icon">
                    <div> 
                    <i style="line-height: 76px;" class="fa fa-briefcase"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no">{{$packageName}}</p>
                    <p class="head_couter">My Package</p>
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
        </div>


        <!-- graph -->
        <div class="row column2 graph margin_bottom_30">
            <div class="col-md-6 col-lg-6">
                <div class="white_shd full">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                        <h2>Bookmarked Candidates</h2>
                        </div>
                    </div>
                    <div class="full graph_revenue">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="content">
                                <div class="area_chart">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <canvas id="bookmarks_chart"></canvas>
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
                        <h2>Purchased Candidates</h2>
                        </div>
                    </div>
                    <div class="full graph_revenue">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="content">
                                <div class="area_chart">
                                    <div class="row"> 
                                    <div class="col-md-12">
                                        <canvas id="purchased_chart"></canvas>
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
        <!-- end graph -->


       
       
        <div class="row column3">
            <!--- Featured Candidates --->
            <div class="col-md-6">
                <div class="recruit_blue dark_bg full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                        <h2>Featured Candidates</h2>
                        </div>
                    </div>
                    <div class="full graph_revenue">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="content testimonial">
                                <div id="fc_slider" class="fc-carousel carousel slide" data-ride="carousel">
                                    <!-- Wrapper for carousel items -->
                                    <div class="carousel-inner">
                                    
                                    @if($featuredCandidates->count() > 0)
                                    @foreach($featuredCandidates as $index => $fC)
                                    
                                    <div class="item carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <div class="img-box"><img src="{{ route('private.image', ['userId' => $fC->candidateId, 'filename' => 'pp-' . $fC->candidateId . '.jpg']) }}" alt=""></div>
                                        <p class="testimonial truncate">{{ Str::limit(ucwords($fC->profSummary), 90, '...') }}</p>
                                        <p class="overview">
                                            <a href="{{url('recruiter/candidate/'.$fC->candidateId)}}">    
                                                <b>{{ucwords($fC->fname)}} {{ucwords($fC->lname)}}</b>
                                            </a>
                                        </p>
                                    </div>
                                        
                                    @endforeach
                                    @endif
                                        
                                    </div>
                                    <!-- Carousel controls -->
                                    <a class="carousel-control left carousel-control-prev" href="#fc_slider" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="carousel-control right carousel-control-next" href="#fc_slider" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--- / Featured Candidates --->

            <!--- My Bookmarks Candidates --->
            <div class="col-md-6">
                <div class="recruit_blue dark_bg full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                        <h2>My Bookmarks</h2>
                        </div>
                    </div>
                    <div class="full graph_revenue">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="content testimonial">
                                <div id="bc_slider" class="bc-carousel carousel slide" data-ride="carousel">
                                    <!-- Wrapper for carousel items -->
                                    <div class="carousel-inner">
                                    
                                    @if($bookmarkCandidates->count() > 0)
                                    @foreach($bookmarkCandidates as $indexx => $bC)
                                    
                                    <div class="item carousel-item {{ $indexx === 0 ? 'active' : '' }}">
                                        <div class="img-box"><img src="{{ route('private.image', ['userId' => $bC->candidateId, 'filename' => 'pp-' . $bC->candidateId . '.jpg']) }}" alt=""></div>
                                        <p class="testimonial truncate">{{ Str::limit(ucwords($bC->profSummary), 90, '...') }}</p>
                                        
                                        <p class="overview">
                                            <a href="{{url('recruiter/candidate/'.$bC->candidateId)}}">
                                                <b>{{ucwords($bC->fname)}} {{ucwords($bC->lname)}}</b>
                                            </a>
                                        </p>
                                    </div>
                                        
                                    @endforeach
                                    @endif
                                        
                                    </div>
                                    <!-- Carousel controls -->
                                    <a class="carousel-control left carousel-control-prev" href="#bc_slider" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="carousel-control right carousel-control-next" href="#bc_slider" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--- / My Bookmarks Candidates --->

        </div>
       


@endsection
@push("js")
<script>
    $(function () {
    var bookmarksChartData = @json($bookmarksChartData);
    var purchasedChartData = @json($purchasedChartData);
    
    new Chart(document.getElementById("bookmarks_chart").getContext("2d"), getChartJs('line', bookmarksChartData,"Candidates"));
    new Chart(document.getElementById("purchased_chart").getContext("2d"), getChartJs('line', purchasedChartData,"Candidates"));
    
});

function getChartJs(type, data, title) {
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
         pointBorderWidth: 1
       }]
     },
     options: {
       responsive: true,
       legend: false,
       scales: {
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
        }
     }
   }
 }
 
 return config;
}
</script>
@endpush
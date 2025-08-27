@extends("app")
@section("contentbox")

@php
if(!empty($currentPlan)){
    $userId = $currentPlan->userId;
    $package = 'Feature Profile';
    $active = $currentPlan->active;
    $starton = $currentPlan->starton;
    $expireon = $currentPlan->expireon;
    $expired = $currentPlan->expired;
}else{
    $userId = 0;
    $package = '';
    $active = 0;
    $starton = '';
    $expireon = '';
    $expired = 1;
}


//$pricing = config('custom.pricing');
$packageName = ''; //$pricing[$package]["name"];
@endphp


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
                <div class="full counter_section counter_section_padding margin_bottom_30 recruit_blue" data-bs-toggle="tooltip" data-bs-placement="top" title="Recruiters interested in your profile">
                    <div class="couter_icon">
                        <div> 
                        <i class="bi bi-heart"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                        <p class="total_no">{{$purchaseCount}}</p>
                        <p class="head_couter">My Interests</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="full counter_section counter_section_padding margin_bottom_30 recruit_blue" data-bs-toggle="tooltip" data-bs-placement="top" title="Recruiters who liked your profile">
                    <div class="couter_icon">
                        <div> 
                        <i class="bi bi-hand-thumbs-up"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                        <p class="total_no">{{$bookmarksCount}}</p>
                        <p class="head_couter">My Likes</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="full counter_section counter_section_padding margin_bottom_30 recruit_blue" data-bs-toggle="tooltip" data-bs-placement="top" title="Notifications">
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
                <div class="full counter_section counter_section_padding margin_bottom_30 recruit_blue" data-bs-toggle="tooltip" data-bs-placement="top" title="Feature Profile: Highlight your profile at the top by activating the feature-profile option.">
                    <div class="couter_icon">
                        <div> 
                        @if($active > 0 && $expired == 0)
                        <i style="line-height: 76px;" class="bi bi-shield-check"></i>
                        @else
                        <i style="line-height: 76px;" class="bi bi-shield-x"></i>
                        @endif
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                        <p style="font-weight: 400; color: #fff;" class="head_couter">Feature Profile</p>
                        <p class="head_couter">
                            Status: 
                            @if($active > 0 && $expired == 0)
                                Active
                            @else
                                Inactive
                            @endif
                            <br> 
                            Expires on: {{ date("M d, Y", strtotime($expireon)) }}
                        </p>
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
                        <h2>My Interests</h2>
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

            <div class="col-md-6 col-lg-6">
                <div class="white_shd full">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                        <h2>My Likes</h2>
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
        </div>
        <!-- end graph -->


@endsection
@push("js")
<script>
    $(function () {
    var bookmarksChartData = @json($bookmarksChartData);
    var purchasedChartData = @json($purchasedChartData);
    
    new Chart(document.getElementById("bookmarks_chart").getContext("2d"), getChartJs('line', bookmarksChartData,"Recruiters"));
    new Chart(document.getElementById("purchased_chart").getContext("2d"), getChartJs('line', purchasedChartData,"Recruiters"));
    
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
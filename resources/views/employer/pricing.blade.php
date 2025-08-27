@extends("app")
@section("contentbox")
@php

$userId = $currentPlan->userId;
$package = $currentPlan->package;
$active = $currentPlan->active;
$starton = $currentPlan->starton;
$expireon = $currentPlan->expireon;
$expired = $currentPlan->expired;
$candidatePurchaseLimit = $currentPlan->candidatePurchaseLimit;
$candidatePurchased = $currentPlan->candidatePurchased;
$createDateTime = $currentPlan->createDateTime;
$updateDateTime = $currentPlan->updateDateTime;

$pricing = config('custom.pricing');
$payasyougo = $pricing["payasyougo"]; //name price candidatelimit
$basicaccess = $pricing["basicaccess"]; //name price candidatelimit
$recruiterspackage = $pricing["recruiterspackage"]; //name price candidatelimit
$custompackage = $pricing["custompackage"]; //name price candidatelimit

$packageName = $pricing[$package]["name"];

@endphp

<style>
.col-12 {
    width: 100%;
}

.sm\:col-6 {
    width: 50%;
}

.lg\:col-3 {
    width: 25%;
}

.row > * {
    margin-top: 2rem;
    box-sizing: border-box;
    width: 100%;
    max-width: 100%;
    padding-left: 0.75rem;
    padding-right: 0.75rem;
}

.shadow-card-1 {
    --tw-shadow: 0px 0px 40px 0px rgba(0, 0, 0, 0.08);
    --tw-shadow-colored: 0px 0px 40px 0px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

.text-center {
    text-align: center;
}

.py-12 {
    padding-top: 3rem;
    padding-bottom: 3rem;
}

.px-9 {
    padding-left: 2.25rem;
    padding-right: 2.25rem;
}

.py-3 {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
}

.px-6 {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}

.bg-body-light-1 {
    --tw-bg-opacity: 1;
    background-color: rgb(252 252 253 / var(--tw-bg-opacity));
}

.rounded-xl {
    border-radius: 0.75rem;
}

.text-primary {
    --tw-text-opacity: 1;
    color: rgb(61 99 221 / var(--tw-text-opacity));
}

.font-medium {
    font-weight: 500;
}

.text-base {
    font-size: 1rem;
    line-height: 1.5rem;
}

.py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}

.px-8 {
    padding-left: 2rem;
    padding-right: 2rem;
}

.bg-primary\/10 {
    background-color: rgb(61 99 221 / 0.1);
}

.rounded-md {
    border-radius: 0.375rem;
}

.inline-block {
    display: inline-block;
}

.mb-6 {
    margin-bottom: 1.5rem;
}

.pt-8 {
    padding-top: 2rem;
}

.pb-10 {
    padding-bottom: 2.5rem;
}

.font-semibold {
    font-weight: 600;
}

.pl-4 {
    padding-left: 1rem;
}

.relative {
    position: relative;
}

h2 {
    font-size: 2.25rem;
    line-height: 1.25;
}

.text-body-light-11 {
    --tw-text-opacity: 1;
    color: rgb(98 99 108 / var(--tw-text-opacity));
}

.font-normal {
    font-weight: 400;
}

.text-\[1\.25rem\] {
    font-size: 1.25rem;
}

.top-1\.5 {
    top: 0.375rem;
}

.left-0 {
    left: 0px;
}

.absolute {
    position: absolute;
}

ul, ol {
    list-style-type: none;
}

ol, ul, menu {
    list-style: none;
    margin: 0;
    padding: 0;
}

.text-left {
    text-align: left;
}

.gap-3 {
    gap: 0.75rem;
}

.w-full {
    width: 100%;
}

.leading-\[24px\] {
    line-height: 24px;
}

.hover\:shadow-lg:hover {
    --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

.initial-display{
  display: initial;
}

.plr-10px{
  padding-left: 10px;
  padding-right: 10px;
  padding-top: 20px;
  padding-bottom: 10px;
}

.fs-26px{
  font-size: 26px;
}

.plan-activated, .plan-activated:hover{
    background-color: #1ed085;
    color: #fff !important;
}

</style>

<div class="midde_cont">
    <div class="container-fluid">
  
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>My Package</h2>
                    <p class="currentPackageRow">
                    <span class="currentPackageSpan">
                        Current Package: {{$packageName}}
                    </span>
                    <span class="currentPackageSpan">
                        Status: @php if($expired == 1 || $active == 0){ echo "Inactive"; }else{ echo "Active"; } @endphp
                    </span>
                    <span class="currentPackageSpan">Expires on: {{date("M d, Y", strtotime($expireon))}}</span>    
                    </p>
                </div>
            </div>
        </div>

        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                        <h2>Packages</h2>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                    <div class="row">
            <div class="scroll-revealed col-md-3 col-12 sm:col-6 lg:col-3" style="visibility: visible;">
              <div class="rounded-xl py-12d px-9d plr-10px bg-body-light-1 dark:bg-body-dark-12/10 text-center shadow-card-1 hover:shadow-lg">
                <div>
                  <h6 class="inline-block font-medium text-base mb-6 text-primary bg-primary/10 rounded-md py-2 px-8 pricing-title">
                  Pay as you go
                  </h6>
                  <p>
                  View 1 candidate’s full profile + Video Interview + Full Support
                  </p>
                  <div class="pt-8">
                    <h2 class="fs-26px font-semibold inline-block relative pl-4 text-[51px]">
                      <span class="font-normal text-body-light-11 dark:text-body-dark-11 text-[1.25rem] absolute left-0 top-1.5"><i class="fa-solid fa-naira-sign"></i></span>7,000<span class="text-[1.125rem] inline-block text-body-light-11 dark:text-body-dark-11 font-normal">/mo</span>
                    </h2>
                  </div>
                </div>
                <div class="pt-8 pb-10">


                @php
                if($package == "payasyougo" && $expired == 0 && $active == 1){
                @endphp
                  <a href="javascript:void(0)" class="plan-activated disabled inline-block font-medium px-6 py-3 rounded-md bg-primary/10" disabled>Activated</a>
                @php
                }else{
                @endphp    
                    <a href="{{url('recruiter/planactivate/payasyougo')}}" class="inline-block font-medium px-6 py-3 rounded-md bg-primary/10 text-primary hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color">Activate</a>
                @php
                }
                @endphp


                </div>
                <div>
                  <ul>
                    <li class="text-left relative mb-3 inline-flex gap-3 w-full">
                      <i class="lni lni-checkmark-circle text-primary text-base leading-[24px]"></i>
                      <span class="initial-display" >View 1 candidate’s full profile.</span>
                    </li>
                    <li class="text-left relative mb-3 inline-flex gap-3 w-full">
                      <i class="lni lni-checkmark-circle text-primary text-base leading-[24px]"></i>
                      <span class="initial-display">Video Interview.</span>
                    </li>
                    <li class="text-left relative mb-3 inline-flex gap-3 w-full">
                      <!--
                      <i
                        class="lni lni-checkmark-circle text-body-light-11 dark:text-body-dark-11 text-base leading-[24px]"
                      ></i>
                      -->
                      <i class="lni lni-checkmark-circle text-primary text-base leading-[24px]"></i>
                      <span class="initial-display">Full Support.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-md-3 col-12 sm:col-6 lg:col-3" style="visibility: visible;">
              <div class="rounded-xl py-12d px-9d plr-10px bg-body-light-1 dark:bg-body-dark-12/10 text-center shadow-card-1 hover:shadow-lg">
                <div>
                  <h6 class="inline-block font-medium text-base mb-6 text-primary bg-primary/10 rounded-md py-2 px-8 pricing-title">
                  Basic Access
                  </h6> 
                  
                  <p>
                  View 5 candidate’s full profile + Video Interview + Full Support
                  </p>
                  <div class="pt-8">
                    <h2 class="fs-26px font-semibold inline-block relative pl-4 text-[51px]">
                      <span class="font-normal text-body-light-11 dark:text-body-dark-11 text-[1.25rem] absolute left-0 top-1.5"><i class="fa-solid fa-naira-sign"></i></span>30,000<span class="text-[1.125rem] inline-block text-body-light-11 dark:text-body-dark-11 font-normal">/mo</span>
                    </h2>
                  </div>
                </div>
                <div class="pt-8 pb-10">
                @php
                if($package == "basicaccess" && $expired == 0 && $active == 1){
                @endphp
                  <a href="javascript:void(0)" class="plan-activated disabled inline-block font-medium px-6 py-3 rounded-md bg-primary/10" disabled>Activated</a>
                @php
                }else{
                @endphp    
                    <a href="{{url('recruiter/planactivate/basicaccess')}}" class="inline-block font-medium px-6 py-3 rounded-md bg-primary/10 text-primary hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color">Activate</a>
                @php
                }
                @endphp
                </div>
                <div>
                  <ul>
                    <li class="text-left relative mb-3 inline-flex gap-3 w-full">
                      <i class="lni lni-checkmark-circle text-primary text-base leading-[24px]"></i>
                      <span class="initial-display">View 5 candidate’s full profile.</span>
                    </li>
                    <li class="text-left relative mb-3 inline-flex gap-3 w-full">
                      <i class="lni lni-checkmark-circle text-primary text-base leading-[24px]"></i>
                      <span class="initial-display">Video Interview.</span>
                    </li>
                    <li class="text-left relative mb-3 inline-flex gap-3 w-full">
                      <i class="lni lni-checkmark-circle text-primary text-base leading-[24px]"></i>
                      <span class="initial-display">Full Support.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-md-3 col-12 sm:col-6 lg:col-3" style="visibility: visible;">
              <div class="rounded-xl py-12d px-9d plr-10px bg-body-light-1 dark:bg-body-dark-12/10 text-center shadow-card-1 hover:shadow-lg">
                <div>
                  <h6 class="inline-block font-medium text-base mb-6 text-primary bg-primary/10 rounded-md py-2 px-8 pricing-title">
                  Recruiters Package
                  </h6>
                  <p>
                  View 10 candidate’s full profile + Video Interview + Full Support
                  </p>
                  <div class="pt-8">
                    <h2 class="fs-26px font-semibold inline-block relative pl-4 text-[51px]">
                      <span class="font-normal text-body-light-11 dark:text-body-dark-11 text-[1.25rem] absolute left-0 top-1.5"><i class="fa-solid fa-naira-sign"></i></span>55,000<span class="text-[1.125rem] inline-block text-body-light-11 dark:text-body-dark-11 font-normal">/mo</span>
                    </h2>
                  </div>
                </div>
                <div class="pt-8 pb-10">
                @php
                if($package == "recruiterspackage" && $expired == 0 && $active == 1){
                @endphp
                  <a href="javascript:void(0)" class="plan-activated disabled inline-block font-medium px-6 py-3 rounded-md bg-primary/10" disabled>Activated</a>
                @php
                }else{
                @endphp    
                    <a href="{{url('recruiter/planactivate/recruiterspackage')}}" class="inline-block font-medium px-6 py-3 rounded-md bg-primary/10 text-primary hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color" onclick="activate('recruiterspackage');">Activate</a>
                @php
                }
                @endphp
                </div>
                <div>
                  <ul>
                    <li class="text-left relative mb-3 inline-flex gap-3 w-full">
                      <i class="lni lni-checkmark-circle text-primary text-base leading-[24px]"></i>
                      <span class="initial-display">View 10 candidate’s full profile.</span>
                    </li>
                    <li class="text-left relative mb-3 inline-flex gap-3 w-full">
                      <i class="lni lni-checkmark-circle text-primary text-base leading-[24px]"></i>
                      <span class="initial-display">Video Interview.</span>
                    </li>
                    <li class="text-left relative mb-3 inline-flex gap-3 w-full">
                      <i class="lni lni-checkmark-circle text-primary text-base leading-[24px]"></i>
                      <span class="initial-display">Full Support.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-md-3 col-12 sm:col-6 lg:col-3" style="visibility: visible;">
              <div class="rounded-xl py-12d px-9d plr-10px bg-body-light-1 dark:bg-body-dark-12/10 text-center shadow-card-1 hover:shadow-lg">
                <div>
                  <h6 class="inline-block font-medium text-base mb-6 text-primary bg-primary/10 rounded-md py-2 px-8 pricing-title">
                  Custom Package
                  </h6>
                  <p>
                  View unlimited candidate’s full profile + Video Interview + Full Support
                  </p>
                  <div class="pt-8">
                    <h2 class="fs-26px font-semibold inline-block relative pl-4 text-[51px]">
                      <span class="font-normal text-body-light-11 dark:text-body-dark-11 text-[1.25rem] absolute left-0 top-1.5"></span><span class="text-[1.125rem] inline-block text-body-light-11 dark:text-body-dark-11 font-normal">Get Your Quote</span>
                    </h2>
                  </div>
                </div>
                <div class="pt-8 pb-10">
                  
                  @php
                  if($package == "custompackage" && $expired == 0 && $active == 1){
                  @endphp
                    <a href="javascript:void(0)" class="plan-activated disabled inline-block font-medium px-6 py-3 rounded-md bg-primary/10" disabled>Activated</a>
                  @php
                  }else{
                  @endphp    
                      <a href="{{url('recruiter/planactivate/custompackage')}}" class="inline-block font-medium px-6 py-3 rounded-md bg-primary/10 text-primary hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color">Activate</a>
                  @php
                  }
                  @endphp
                </div>
                <div>
                  <ul>
                    <li class="text-left relative mb-3 inline-flex gap-3 w-full">
                      <i class="lni lni-checkmark-circle text-primary text-base leading-[24px]"></i>
                      <span class="initial-display">View unlimited candidate’s full profile.</span>
                    </li>
                    <li class="text-left relative mb-3 inline-flex gap-3 w-full">
                      <i class="lni lni-checkmark-circle text-primary text-base leading-[24px]"></i>
                      <span class="initial-display">Video Interview.</span>
                    </li>
                    <li class="text-left relative mb-3 inline-flex gap-3 w-full">
                      <i class="lni lni-checkmark-circle text-primary text-base leading-[24px]"></i>
                      <span class="initial-display">Full Support.</span>
                    </li>
                  </ul>
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

@endsection
@push("js")
<script>
  function activate(package){
    window.location.href = "{{url('recruiter/planactivate/')}}"+package;
  }
</script>
@endpush
@php
$featureprofile = config('custom.pricing.featureprofile');
$serviceName = $featureprofile["name"];
$servicePrice = $featureprofile["price"];
$serviceCurrency = $featureprofile["currency"];
$serviceCurrencySymbol = $featureprofile["symbol"];
@endphp

@extends("app")
@section("contentbox")
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>My Profile</h2>
            </div>
        </div>
        </div>
        <!-- row -->
        <div class="row column1">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                    <h2>Basic information</h2>
                    </div>
                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">
                    <!-- user profile section --> 
                    <!-- profile image -->
                    <div class="col-lg-12">
                        <div class="full dis_flex center_text">
                        <form class="profile_contant">
                            <div class="form-group row mb-3">
                                <div class="col-md-4">
                                    <input type="hidden" class="form-input" name="userId" id="userId" value="{{$user->id}}">
                                    <label for="fname" class="form-label">First Name<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="fname" id="fname" placeholder="First Name" value="{{ucfirst($user->fname)}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="lname" class="form-label">Last Name<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="lname" id="lname" placeholder="Last Name" value="{{ucfirst($user->lname)}}">
                                </div>
                                <div class="col-md-4">
                                  <label for="gender" class="form-label">Gender<span class="required">*</span></label>
                                  <select id="gender" name="gender" class="form-control">
                                    <option value="0"></option>  
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Other</option>
                                  </select>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-6">
                                    <label for="address_1" class="form-label">Address 1<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="address_1" id="address_1" placeholder="Address 1" value="{{ucfirst($user->address_1)}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="address_2" class="form-label">Address 2<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="address_2" id="address_2" placeholder="Address 2" value="{{ucfirst($user->address_2)}}">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-4">
                                    <label for="city" class="form-label">City<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="city" id="city" placeholder="City" value="{{($user->city)}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="country" class="form-label">Country<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="country" id="country" placeholder="Country" value="{{ucfirst($user->country)}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="zipcode" class="form-label">Zipcode<span class="required"></span></label>
                                    <input type="text" class="form-input" name="zipcode" id="zipcode" placeholder="Zipcode" value="{{$user->zipcode}}">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email<span class="required">*</span></label>
                                    <input type="email" class="form-input" name="email" id="email" placeholder="Email" value="{{$user->email}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="phone" id="phone" placeholder="Phone" value="{{$user->phone}}">
                                </div>
                            </div>


                            <div class="row">
                                
                                <div class="row full dis_flex">
                                    <div class="col-md-12">
                                        <label class="form-label" style="font-weight: 600;color: #15283c;">Settings &nbsp;<i class="fa fa-cog"></i></label>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-md-6">
                                        <label for="activeCheckDefault" class="form-label">Profile Visibility<span class="required"></span></label>

                                        <label class="form-label toggle-switch">
                                            <input type="checkbox" id="activeToggle" value="{{$user->active}}" {{ $user->active == 1 ? 'checked' : '' }} >
                                            <span class="toggle-slider"></span>
                                        </label>

                                        <label class="text-danger" style="font-size: 12px;">Toggling this option will make your profile visible or hidden to recruiters.</label>

                                    </div>

                                    <div class="col-md-6">
                                        <label for="activeCheckDefault" class="form-label">Feature Profile<span class="required"></span></label>

                                    @php
                                        $isActive = !empty($featureProfile) && $featureProfile->active == 1;
                                        $isExpired = !empty($featureProfile) && $featureProfile->expired == 0;
                                    @endphp

                                    @if($isActive)
                                        <button type="button" class="btn cur-p btn-outline-primary" disabled>
                                            <i class="bi bi-shield-check recruit_blue_text"></i> Activated
                                        </button>
                                        <label class="text-danger" style="font-size: 12px;">
                                            Feature Profile: Highlight your profile at the top by activating the feature-profile option.
                                        </label>
                                    @elseif($isExpired)
                                        <button type="button" class="btn cur-p btn-outline-primary" onclick="openPaymentPopup();">
                                            <i class="bi bi-shield-check recruit_blue_text"></i> Activate
                                        </button>
                                        <label class="text-danger" style="font-size: 12px;">
                                            Feature Profile: Highlight your profile at the top by activating the feature-profile option. 
                                            It seems your plan has expired.
                                        </label>
                                    @else
                                        <button type="button" class="btn cur-p btn-outline-primary" onclick="openPaymentPopup();">
                                            <i class="bi bi-shield-check recruit_blue_text"></i> Activate
                                        </button>
                                        <label class="text-danger" style="font-size: 12px;">
                                            Feature Profile: Highlight your profile at the top by activating the feature-profile option.
                                        </label>
                                    @endif
                                        

                                    </div>
                                </div>
                            </div>



                            <div class="form-group row mb-3">
                                <div class="col-md-12 profile-btn-box">
                                    <button type="button" class="btn cur-p btn-outline-primary">Cancel</button>
                                    <button type="button" id="profSaveBtn" class="btn cur-p btn-primary" data-txt="Save" data-loadingtxt="Saving..." onclick="validateForm(this);">Save</button>
                                </div>
                            </div>
                        </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        </div>
        
    </div>
</div>

<!--- payment-popup --->

<style>
.feature-profile-payment-popup-overlay {
    display: none;
    position: fixed;
    z-index:11;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    justify-content: center;
    align-items: center;
}

.feature-profile-payment-popup-container {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    width: 90%;
    max-width: 400px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.feature-profile-payment-popup-header h2 {
    margin: 0;
    font-weight: 500;
    font-size: 24px;
    padding-bottom: 10px;
    color: #15283c;
}

.feature-profile-payment-popup-header .close-btn {
    font-size: 28px;
    color: #007bff;
    cursor: pointer;
    float: right;
    margin-top: -55px;
    margin-right: -15px;
}

.feature-profile-payment-popup-content p {
    font-size: 16px;
    margin-bottom: 15px;
    color: #333;
}

.pay-btn {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.pay-btn:hover {
    background-color: #0056b3;
}

/* Button to open the popup */
.open-popup-btn {
    background-color: #28a745;
    color: white;
    padding: 15px 25px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.open-popup-btn:hover {
    background-color: #218838;
}

/* Responsive Design */
@media (max-width: 768px) {
    .feature-profile-payment-popup-container {
        padding: 15px;
        width: 90%;
        max-width: 90%;
    }

    .feature-profile-payment-popup-header h2 {
        font-size: 18px;
    }

    .feature-profile-payment-popup-content p, .pay-btn {
        font-size: 14px;
    }
}
</style>

    <div id="payment-popup" class="feature-profile-payment-popup-overlay">
        <div class="feature-profile-payment-popup-container">
            <div class="feature-profile-payment-popup-header mb-3">
                <h2>Payment Details</h2>
                <span class="close-btn .recruit_blue" onclick="closePaymentPopup()">&times;</span>
            </div>
            <div id="payment-form">
                <div class="feature-profile-payment-popup-content">
                    <i style="line-height: 1;font-size: 8em;" class="bi bi-shield-check recruit_blue_text"></i>
                    
                    <p class="text-center recruit_blue_text" style="font-weight: 500;font-size: 20px;">{{$serviceName}}</p>
                    
                    <p class="text-center recruit_blue_text">Boost your chances of getting hired by placing your profile at the top of recruiter searches. Stand out from other candidates and increase your visibility. Just {{$serviceCurrencySymbol}}{{$servicePrice}}/month.</p>
                    <button class="pay-btn recruit_blue" onclick="processPayment()">Pay Now</button>
                </div>
            </div>
        </div>
    </div>

    <!-- payment-popup -->
@endsection
@push("js")
<script>

$(document).ready(function() {
    $("#gender").val("{{$user->gender}}");

    createToggle('#activeToggle', (isOn) => {
        
        $("#activeToggle").val(`${isOn ? 1 : 0}`);
    });
});

function validateForm(elm) {

    const errors = {};

    // Helper functions for validation
    const isRequired = (value) => value && value.trim() !== "";
    const isValidZipCode = (value) => /^[0-9]{5}(-[0-9]{4})?$/.test(value);
    const isValidPhone = (value) => /^\+?[0-9]{7,15}$/.test(value);
    
    // Validate each field
    var userId = $("#userId").val();
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var gender = $("#gender").val();
    var address_1 = $("#address_1").val();
    var address_2 = $("#address_2").val();
    var city = $("#city").val();
    var country = $("#country").val();
    var zipcode = $("#zipcode").val();
    var phone = $("#phone").val();
    var active = $("#activeToggle").val();

    var fnameObj = validateName(fname);
    var lnameObj = validateName(lname);
  
    const validCharacters = /^[A-Za-z0-9\s]+$/; // Only letters, numbers and spaces
    //!validCharacters.test(name)
  
    if (!isRealValue(fname)) {
        var err = 1;
        var msg = "First name is required.";
        showToast(err,msg);
        return false;
    } else if (isRealValue(fname) && fnameObj.err == 1) {
        var err = 1;
        var msg = fnameObj.msg;
        showToast(err,msg);
        return false;
    } else if (!isRealValue(lname)) {
        var err = 1;
        var msg = "Last name is required.";
        showToast(err,msg);
        return false;
    } else if (isRealValue(lname) && lnameObj.err == 1) {
        var err = 1;
        var msg = lnameObj.msg;
        showToast(err,msg);
        return false;
    } else if(!isRealValue(gender) || parseInt(gender) == 0){
        var err = 1;
        var msg = "Gender is required.";
        showToast(err,msg);
        return false;
    } else if(!isRealValue(address_1)){
        var err = 1;
        var msg = "Address line 1 is required.";
        showToast(err,msg);
        return false;
    } else if(isRealValue(address_1) && !validCharacters.test(address_1)){
        var err = 1;
        var msg = "Only letters, numbers and spaces are allowed.";
        showToast(err,msg);
        return false;
    } else if(!isRealValue(address_2)){
        var err = 1;
        var msg = "Address line 2 is required.";
        showToast(err,msg);
        return false;
    } else if(isRealValue(address_2) && !validCharacters.test(address_2)){
        var err = 1;
        var msg = "Only letters, numbers and spaces are allowed.";
        showToast(err,msg);
        return false;
    } else if(!isRealValue(city)){
        var err = 1;
        var msg = "City is required.";
        showToast(err,msg);
        return false;
    } else if(isRealValue(city) && !validCharacters.test(city)){
        var err = 1;
        var msg = "Only letters, numbers and spaces are allowed.";
        showToast(err,msg);
        return false;
    } else if(!isRealValue(country)){
        var err = 1;
        var msg = "Country is required.";
        showToast(err,msg);
        return false;
    } else if(isRealValue(country) && !validCharacters.test(country)){
        var err = 1;
        var msg = "Only letters, numbers and spaces are allowed.";
        showToast(err,msg);
        return false;
    } else if(!isRealValue(phone)){
        var err = 1;
        var msg = "Phone number is required.";
        showToast(err,msg);
        return false;
    } else if(isRealValue(phone) && !validatePhone(phone)){
        var err = 1;
        var msg = "Phone number must be valid (e.g., +123456789).";
        showToast(err,msg);
        return false;
    }else{

        var elmId = $(elm).attr("id");
        $(elm).attr("disabled",true);
        var orgTxt = $(elm).attr("data-txt");
        var loadingTxt = $(elm).attr("data-loadingtxt");
        showLoader(elmId,loadingTxt);
        
        var requrl = "candidate/saveprofile";
        var postdata = {
            "userId":userId,
            "fname":fname,
            "lname":lname,
            "gender":gender,
            "address_1":address_1,
            "address_2":address_2,
            "city":city,
            "country":country,
            "zipcode":zipcode,
            "phone":phone,
            "active":active
        };
        callajax(requrl, postdata, function(resp){
            $(elm).removeAttr("disabled");
            hideLoader(elmId,orgTxt);
            $(".errorMessage").html(resp.M);
            var err = 1;
            if(resp.C == 100){
                err = 0;
            }
            
            var msg = resp.M;
            showToast(err,msg);
            
        });
    }
}

// Open the Payment Popup
function openPaymentPopup() {
    document.getElementById('payment-popup').style.display = 'flex';
}

// Close the Payment Popup
function closePaymentPopup() {
    document.getElementById('payment-popup').style.display = 'none';
}

// Simulate the Payment Process
function processPayment() {
    window.location.href="{{url('candidate/planactivate/featureprofile')}}";
    //closePaymentPopup();  // Close the popup after payment
}

</script>
@endpush
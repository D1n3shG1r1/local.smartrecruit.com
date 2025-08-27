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
                            <input type="hidden" class="form-input" name="userId" id="userId" value="{{$user->id}}">
                            <input type="hidden" class="form-input" name="gender" id="gender" value="0">

                            <div class="form-group row mb-3">
                                <div class="col-md-6">
                                    <label for="fname" class="form-label">Company Name<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="companyname" id="companyname" placeholder="Company Name" value="{{ucfirst($user->companyname)}}">
                                </div>

                                <div class="col-md-6">    
                                    <label for="fname" class="form-label">Full Name<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="fname" id="fname" placeholder="Full Name" value="{{ucfirst($user->fname)}}">
                                </div>    
                            </div>

                            

                            <div class="form-group row mb-3">
                                <div class="col-md-4">
                                    <label for="position" class="form-label">Position/Role<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="position" id="position" placeholder="Position/Role" value="{{$user->position}}">
                                </div>    
                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email<span class="required">*</span></label>
                                    <input type="email" class="form-input" name="email" id="email" placeholder="Email" value="{{$user->email}}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="phone" class="form-label">Phone<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="phone" id="phone" placeholder="Phone" value="{{$user->phone}}">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-md-4">
                                    <label for="industry" class="form-label">Industry<span class="required">*</span></label>
                                    <select id="industry" name="industry" class="form-control">
                                        <option value="Oil & Gas">Oil & Gas</option>
                                        <option value="Technology">Technology</option>
                                        <option value="Construction">Construction</option>
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Education">Education</option>
                                        <option value="Logistics">Logistics</option>
                                    </select>
                                </div>    

                                <div class="col-md-4">
                                    <label for="companysize" class="form-label">Company Size<span class="required">*</span></label>
                                    <select id="companysize" name="companysize" class="form-control">
                                        <option value="1-10">1-10</option>
                                        <option value="11-50">11-50</option>
                                        <option value="51-200">51-200</option>
                                        <option value="201–500">201–500</option>
                                        <option value="500+">500+</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="website" class="form-label">Website<span class="required"></span></label>
                                    <input type="text" class="form-input" name="website" id="website" placeholder="Website" value="{{$user->website}}">
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
@endsection
@push("js")
<script>

$(function(){
    $("#industry").val("{{$user->industry}}");
    $("#companysize").val("{{$user->companysize}}");
});

function validateForm(elm) {

    const errors = {};

    // Helper functions for validation
    const isRequired = (value) => value && value.trim() !== "";
    const isValidZipCode = (value) => /^[0-9]{5}(-[0-9]{4})?$/.test(value);
    const isValidPhone = (value) => /^\+?[0-9]{7,15}$/.test(value);
    
    // Validate each field
    var userId = $("#userId").val();
    var companyname = $("#companyname").val();
    var position = $("#position").val();
    var industry = $("#industry").val();
    var companysize = $("#companysize").val();
    var website = $("#website").val();
    var fname = $("#fname").val();
    var gender = $("#gender").val();
    var address_1 = $("#address_1").val();
    var address_2 = $("#address_2").val();
    var city = $("#city").val();
    var country = $("#country").val();
    var zipcode = $("#zipcode").val();
    var phone = $("#phone").val();

    var fnameObj = validateName(fname);
    
  
    const validCharacters = /^[A-Za-z0-9\s]+$/; // Only letters, numbers and spaces
    //!validCharacters.test(name)
    
    if (!isRealValue(companyname)) {
        var err = 1;
        var msg = "Company name is required.";
        showToast(err,msg);
        return false;
    } else if (!isRealValue(fname)) {
        var err = 1;
        var msg = "First name is required.";
        showToast(err,msg);
        return false;
    } else if (isRealValue(fname) && fnameObj.err == 1) {
        var err = 1;
        var msg = fnameObj.msg;
        showToast(err,msg);
        return false;
    }/* else if (!isRealValue(lname)) {
        var err = 1;
        var msg = "Last name is required.";
        showToast(err,msg);
        return false;
    } else if (isRealValue(lname) && lnameObj.err == 1) {
        var err = 1;
        var msg = lnameObj.msg;
        showToast(err,msg);
        return false;
    }*/ else if(!isRealValue(position)){
        var err = 1;
        var msg = "Position/Role is required.";
        showToast(err,msg);
        return false;
    } else if(!isRealValue(industry)){
        var err = 1;
        var msg = "Industry is required.";
        showToast(err,msg);
        return false;
    } else if(!isRealValue(companysize)){
        var err = 1;
        var msg = "Company size is required.";
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
        
        var requrl = "recruiter/saveprofile";
        var postdata = {
            "userId":userId,
            "companyname":companyname,
            "position":position,
            "industry":industry,
            "companysize":companysize,
            "website":website,
            "fname":fname,
            "gender":gender,
            "address_1":address_1,
            "address_2":address_2,
            "city":city,
            "country":country,
            "zipcode":zipcode,
            "phone":phone
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
</script>
@endpush
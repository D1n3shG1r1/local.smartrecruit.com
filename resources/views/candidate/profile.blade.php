@extends("app")
@section("contentbox")
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Profile</h2>
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
                                <div class="col-md-6">
                                    <input type="hidden" class="form-input" name="userId" id="userId" value="{{$user->id}}">
                                    <label for="fname" class="form-label">First Name<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="fname" id="fname" placeholder="First Name" value="{{ucfirst($user->fname)}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="lname" class="form-label">Last Name<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="lname" id="lname" placeholder="Last Name" value="{{ucfirst($user->lname)}}">
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
                                    <label for="zipcode" class="form-label">Zipcode (Optional)<span class="required"></span></label>
                                    <input type="text" class="form-input" name="zipcode" id="zipcode" placeholder="Zipcode (Optional)" value="{{$user->zipcode}}">
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
    var address_1 = $("#address_1").val();
    var address_2 = $("#address_2").val();
    var city = $("#city").val();
    var country = $("#country").val();
    var zipcode = $("#zipcode").val();
    var phone = $("#phone").val();
    
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
    }else if(!isRealValue(address_1)){
        var err = 1;
        var msg = "Address line 1 is required.";
        showToast(err,msg);
        return false;
    }else if(isRealValue(address_1) && !validCharacters.test(address_1)){
        var err = 1;
        var msg = "Only letters, numbers and spaces are allowed.";
        showToast(err,msg);
        return false;
    }else if(!isRealValue(address_2)){
        var err = 1;
        var msg = "Address line 2 is required.";
        showToast(err,msg);
        return false;
    }else if(isRealValue(address_2) && !validCharacters.test(address_2)){
        var err = 1;
        var msg = "Only letters, numbers and spaces are allowed.";
        showToast(err,msg);
        return false;
    }else if(!isRealValue(city)){
        var err = 1;
        var msg = "City is required.";
        showToast(err,msg);
        return false;
    }else if(isRealValue(city) && !validCharacters.test(city)){
        var err = 1;
        var msg = "Only letters, numbers and spaces are allowed.";
        showToast(err,msg);
        return false;
    }else if(!isRealValue(country)){
        var err = 1;
        var msg = "Country is required.";
        showToast(err,msg);
        return false;
    }else if(isRealValue(country) && !validCharacters.test(country)){
        var err = 1;
        var msg = "Only letters, numbers and spaces are allowed.";
        showToast(err,msg);
        return false;
    }else if(!isRealValue(phone)){
        var err = 1;
        var msg = "Phone number is required.";
        showToast(err,msg);
        return false;
    }else if(isRealValue(phone) && !validatePhone(phone)){
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
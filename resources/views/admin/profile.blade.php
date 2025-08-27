@extends("app")
@section("contentbox")
<style>
.ChangePasswordIcon{
    right: 25px;
    top: 33px;
    font-size: 18px;
    position: absolute;
}
</style>

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
                            
                            <div class="form-group row mb-3">
                                <div class="col-md-6">
                                    <label for="fname" class="form-label">First Name<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="fname" id="fname" placeholder="First Name" value="{{ucfirst($user->fname)}}">
                                </div>

                                <div class="col-md-6">    
                                    <label for="lname" class="form-label">Last Name<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="lname" id="lname" placeholder="Last Name" value="{{ucfirst($user->lname)}}">
                                </div>    
                            </div>
                            
                            <div class="form-group row mb-3">
                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email<span class="required">*</span></label>
                                    <input type="email" class="form-input" name="email" id="email" placeholder="Email" value="{{$user->email}}" readonly>
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

            <!--- change password --->
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                    <h2>Change Password</h2>
                    </div>
                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="full dis_flex center_text">
                                <form class="profile_contant">
                                    
                                    <div class="form-group row mb-3">
                                        <div class="col-md-4">
                                            <label for="oldPassword" class="form-label">Old Password<span class="required">*</span></label>
                                            <input type="password" class="form-input" name="oldPassword" id="oldPassword" placeholder="Old Password" value="">
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label for="newPassword" class="form-label">New Password<span class="required">*</span></label>
                                            <input type="password" class="form-input" name="newPassword" id="newPassword" placeholder="New Password" value="">
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label for="confirmPassword" class="form-label">Confirm Password<span class="required">*</span></label>
                                            <input type="password" class="form-input" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" value="">
                                            <i toggle="confirmPassword" class="ChangePasswordIcon bi bi-eye-slash"></i>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-md-12 profile-btn-box">
                                            <button type="button" class="btn cur-p btn-outline-primary">Cancel</button>
                                            <button type="button" id="profSaveBtn" class="btn cur-p btn-primary" data-txt="Save" data-loadingtxt="Saving..." onclick="validatePasswordForm(this);">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--- change password --->

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

    document.querySelectorAll(".ChangePasswordIcon").forEach(function (toggle) {
        toggle.addEventListener("click", function () {
            this.classList.toggle("bi-eye");
            this.classList.toggle("bi-eye-slash");

            const selector = this.getAttribute("toggle");
            const input = document.getElementById(selector);
            if (input) {
                if (input.type === "password") {
                    input.type = "text";
                } else {
                    input.type = "password";
                }
            }
        });
    });
    
});


function validateForm(elm) {

    const errors = {};

    // Validate each field
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    
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
    }  else if (!isRealValue(lname)) {
        var err = 1;
        var msg = "Last name is required.";
        showToast(err,msg);
        return false;
    } else if (isRealValue(lname) && lnameObj.err == 1) {
        var err = 1;
        var msg = lnameObj.msg;
        showToast(err,msg);
        return false;
    } else{

        var elmId = $(elm).attr("id");
        $(elm).attr("disabled",true);
        var orgTxt = $(elm).attr("data-txt");
        var loadingTxt = $(elm).attr("data-loadingtxt");
        showLoader(elmId,loadingTxt);
        
        var requrl = "admin/saveprofile";
        var postdata = {
            "fname":fname,
            "lname":lname
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

function validatePasswordForm(elm){
    
    var requrl = 'admin/changepassword';
    var t = $("#t").val(); 
    var oldPassword = $("#oldPassword").val();
    var newPassword = $("#newPassword").val();
    var confirmPassword = $("#confirmPassword").val();

    var newPasswordValidObj =validatePassword(newPassword);
    var confirmPasswordValidObj = validatePassword(confirmPassword);
    
    var psswdErr = newPasswordValidObj.err;
    var psswdMsg = newPasswordValidObj.msg;
    var cpsswdErr = confirmPasswordValidObj.err;
    var cpsswdMsg = confirmPasswordValidObj.msg;

    if (!isRealValue(oldPassword)) {
        var err = 1;
        var msg = 'Please enter the old password.';
        showToast(err,msg);
        return false;
    } else if (!isRealValue(newPassword)) {
        var err = 1;
        var msg = 'Please enter the new password.';
        showToast(err,msg);
        return false;
    } else if (isRealValue(newPassword) && psswdErr == 1) {
        var err = 1;
        var msg = psswdMsg;
        showToast(err,msg);
        return false;
    } else if (!isRealValue(confirmPassword)) {
        var err = 1;
        var msg = 'Please enter the confirm password.';
        showToast(err,msg);
        return false;
    } else if (isRealValue(confirmPassword) && cpsswdErr == 1) {
        var err = 1;
        var msg = cpsswdMsg;
        showToast(err,msg);
        return false;
    } else if (isRealValue(newPassword) && isRealValue(confirmPassword) && newPassword !== confirmPassword) {
        var err = 1;
        var msg = 'Confirm password does not match.';
        showToast(err,msg);
        return false;
    }else {

        var elmId = $(elm).attr("id");
        $(elm).attr("disabled",true);
        var orgTxt = $(elm).attr("data-txt");
        var loadingTxt = $(elm).attr("data-loadingtxt");
        showLoader(elmId,loadingTxt); 

        var postData = {
            "_token":CSRFTOKEN,
            "oldPassword":oldPassword,
            "password":newPassword,
            "re_password":confirmPassword
        };

        callajax(requrl, postData, function(resp){
            
            $(elm).removeAttr("disabled");
            hideLoader(elmId,orgTxt);
            var err = 0;
            var msg = resp.M;
            if(resp.C == 100){
                err = 0;
                
                setTimeout(function(){
                    
                    //window refresh
                    window.location.href = "{{url('/')}}";
                    
                }, 1000);

            }else{
                err = 1;
            }
            
            showToast(err,msg);

        });

    }
}
</script>
@endpush
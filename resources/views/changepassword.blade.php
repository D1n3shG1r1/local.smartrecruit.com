@extends("app")
@section("contentbox")
<style>
header{
    --tw-bg-opacity: 1;
    background-color: rgb(61 99 221 / var(--tw-bg-opacity));
}

section{
    padding: 7rem 4rem;
}

.createNewPasswordSection{
    width:50%;
    margin:auto;
}

.createNewPasswordSection form {
    border-width: 1px;
    border-radius: 5px;
}

.white_shd {
    background: #fff;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    border-radius: 5px;
    margin-top: 0;
}

.margin_bottom_30 {
    margin-bottom: 30px;
}

.full {
    width: 100%;
    float: left;
}


.graph_head {
    padding: 18px 25px 15px;
    float: left;
    width: 100%;
    border-bottom: solid #f3f3f3 2px;
}

.heading1 {
    float: left;
    padding: 0 0 20px 0;
    width: 100%;
    margin-top: 50px;
}

.graph_head .heading1 {
    float: left;
    padding: 0;
    width: auto;
}

.margin_0 {
    margin: 0 !important;
}

.ChangePasswordIcon {
    margin-right: 5px;
    margin-top: -37px;
    font-size: 1.5rem;
    float: right;
    cursor: pointer;
    color: #1e1f24;
}
</style>

<section id="createNewPassword" class="relative overflow-hidden bg-primary pt-[120px] md:pt-[130px] lg:pt-[160px]">
    <div id="createNewPasswordSection" class="createNewPasswordSection text-body-dark-1 sm:col-12 mt-unset white_shd margin_bottom_30">
    <div class="full graph_head">
        <div class="text-center max-w-[550px] mx-auto heading1 margin_0">
            <h6 class="block text-lg font-normal text-primary">Change Password</h6>
        </div>
    </div>
        <form class="dflex dflex-col dgap-6">
            <div class="row mb-3 px-3">
                <div class="col-12 md:col-12">
                <input id="t" type="hidden" name="t" value="{{$t}}" readonly/>    
                <input id="email" type="email" name="email" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Email" value="{{$email}}" readonly >
                </div>
            </div>
            <div class="row mb-3 px-3">         
                <div class="col-6 md:col-6">
                    <input id="password" type="password" name="password" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="New Password" required="">
                </div>
                <div class="col-6 md:col-6">
                    <input id="confirmpassword" type="password" name="confirmpassword" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Confirm password" required="">
                    <i toggle="confirmpassword" class="ChangePasswordIcon bi bi-eye-slash"></i>
                </div>
            </div>
                
            <div class="row mb-3 px-3">         
                <div class="col-12 md:col-12 text-right">
                    <button id="changePasswordBtn" type="button" class="inline-block px-5 py-3 rounded-md text-base bg-primary text-primary-color hover:bg-primary-light-10 dark:hover:bg-primary-dark-10 focus:bg-primary-light-10 dark:focus:bg-primary-dark-10" data-txt="Save" data-loadingtxt="Saving..." onclick="save(this)">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>


@endsection
@push("js")
<script>
    
    function save(elm){

        var requrl = 'changepassword';
        var t = $("#t").val(); 
        var password = $("#password").val();
        var confirmPassword = $("#confirmpassword").val();

        var psswdValidObj = validatePassword(password);
        var cpsswdValidObj =validatePassword(confirmPassword);
        var psswdValidObj = validatePassword(password);
        var cpsswdValidObj =validatePassword(confirmPassword);

        var psswdErr = psswdValidObj.err;
        var psswdMsg = psswdValidObj.msg;
        var cpsswdErr = cpsswdValidObj.err;
        var cpsswdMsg = cpsswdValidObj.msg;

        if (!isRealValue(password)) {
            var err = 1;
            var msg = 'Please enter the password.';
            showToast(err,msg);
            return false;
        } else if (isRealValue(password) && psswdErr == 1) {
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
        } else if (isRealValue(password) && isRealValue(confirmPassword) && password !== confirmPassword) {
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
                "t":t,
                "password":password,
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
@extends("app")
@section("contentbox")
<style>
.keyContainer{
    display:none;    
}

.keyoutput{
    width: 100%;
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}

.btn i {
    color: inherit;
}

.ChangePasswordIcon {
    right: 25px;
    top: 33px;
    font-size: 18px;
    position: absolute;
}

.adImage {
    width: 100px;
    height: 100px;
    padding: 0 0;
    margin-left: 10px;
    margin-bottom: 10px;
}

.addBanner {
    border: 1px dashed #155ed2;
    width: 100%;
    height: 100px;
    text-align: center;
    color: #155ed2;
    padding: 1em 0em;
    font-size: 19px;
    vertical-align: middle;
}

.adRemoveBtn {
    position: absolute;
    right: 0px;
    top: -4px;
}

</style>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>My Settings</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                        <div class="tab-content" id="v-pills-tabContent">
                            <h2 id="form-title-myprofile" class="form-title">Profile Settings</h2>
                            <h2 id="form-title-accesskey" class="form-title hideMe">Special Access Key</h2>
                            <h2 id="form-title-payment" class="form-title hideMe">Paystack Settings</h2>
                            <h2 id="form-title-email" class="form-title hideMe">Email SMTP Settings</h2>
                            <h2 id="form-title-users" class="form-title hideMe">Users settings</h2>
                            <h2 id="form-title-ad" class="form-title hideMe">Ad Settings</h2>
                        </div>
                        </div>
                    </div>
                    <div class="full inner_elements">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="tab_style3">
                                <div class="tabbar padding_infor_info">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                    <a class="nav-link active show" id="v-pills-myprofile-tab" data-toggle="pill" href="#v-pills-myprofile" role="tab" aria-controls="v-pills-myprofile" aria-selected="true" data-title="form-title-myprofile" onclick="toggleTitle(this)">Profile</a>

                                    <a class="nav-link" id="v-pills-accesskey-tab" data-toggle="pill" href="#v-pills-accesskey" role="tab" aria-controls="v-pills-accesskey" aria-selected="true" data-title="form-title-accesskey" onclick="toggleTitle(this)">Special Access Key</a>

                                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" data-title="form-title-payment" onclick="toggleTitle(this)">Payment</a>

                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" data-title="form-title-email" onclick="toggleTitle(this)">Email</a>

                                    <a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false" data-title="form-title-users" onclick="toggleTitle(this)">Users</a>
                                    
                                    <a class="nav-link" id="v-pills-ad-tab" data-toggle="pill" href="#v-pills-ad" role="tab" aria-controls="v-pills-ad" aria-selected="false" data-title="form-title-ad" onclick="toggleTitle(this)">Ad</a>

                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                    
                                    <div class="tab-pane fade active show" id="v-pills-myprofile" role="tabpanel" aria-labelledby="v-pills-myprofile-tab">
                                        <form class="full graph_head" id="documentForm1">

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
                                                <div class="col-md-12">
                                                    <label for="email" class="form-label">Email<span class="required">*</span></label>
                                                    <input type="email" class="form-input" name="email" id="email" placeholder="Email" value="{{$user->email}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <div class="col-md-12 profile-btn-box">
                                                    <button type="button" id="profSaveBtn" class="btn cur-p btn-primary" data-txt="Save" data-loadingtxt="Saving..." onclick="validateForm(this);">Save</button>
                                                </div>
                                            </div>

                                        </form>

                                        <form class="full graph_head" id="documentForm1-2">
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
                                                    <button type="button" id="profSaveBtn2" class="btn cur-p btn-primary" data-txt="Save" data-loadingtxt="Saving..." onclick="validatePasswordForm(this);">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-accesskey" role="tabpanel" aria-labelledby="v-pills-accesskey-tab">
                                        <form class="full graph_head" id="documentForm2">  
                                               <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <div class="row mb-3">
                                                            <div class="col-md-12">
                                                            <h5 style="font-weight: normal;" class="form-titled">Description:</h5>
                                                            <span>
                                                            The Special Access Key is a secure key required to perform sensitive actions in your system, such as deleting records or updating payment and email credentials. This key can be used multiple times. Whenever the key is regenerated, the previous key will be overwritten for security purposes.    
                                                            </span>
                                                            </div>
                                                        </div>
                                                            <div class="row mb-3">
                                                            <div class="col-md-12">

                                                            <h5 style="font-weight: normal;" class="form-titled">How to Use:</h5>

                                                            <ul>
                                                                <li>
                                                                <strong>Delete Records:</strong> Enter the Special Access Key to authorize the deletion of records.
                                                                </li>
                                                                <li>
                                                                <strong>Update Credentials:</strong> The key is needed to make changes to payment or email credentials.
                                                                </li>
                                                            </ul>
                                                            
                                                            </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                            <div class="col-md-12">
                                                            
                                                            
                                                            <span>Please note: The key is sensitive—copy and store it in a secure place. Use it only for authorized operations.</span>

                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div id="keyContainer" class="keyContainer">
                                                            <input type="text" id="keyoutput" class="keyoutput alert-primary" />
                                                            
                                                            <button style="float: right;" type="button" class="btn btn-outline-primary" onclick="copyKey();">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"></path>
                                                                </svg>
                                                                Copy
                                                            </button>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6 align-right">
                                                            <label class="label_field hidden">hidden label</label>
                                                            <button type="button" id="accessKeyBtn" class="btn cur-p btn-primary verifyEmailBtn" onclick="generateKey(this);" data-txt="Generate" data-loadingtxt="Generating...">Generate</button>
                                                        </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                
                                        </form>
                                    </div>



                                    
                                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <form class="full graph_head" id="documentForm3">  
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="row mb-3">
                                                        <div class="col-md-12">
                                                            <label for="title" class="form-label">Secret Key</label>
                                                            <input type="text" class="form-control" id="secretkey" name="secretkey" placeholder="Secret Key" value="{{$paystack['secretkey']}}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-12">
                                                            <label for="title" class="form-label">Public Key</label>
                                                            <input type="text" class="form-control" id="publickey" name="publickey" placeholder="Public Key" value="{{$paystack['publickey']}}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-12 align-right">
                                                            <label class="label_field hidden">hidden label</label>
                                                            <button type="button" id="savePayBtn" class="btn cur-p btn-primary verifyEmailBtn" onclick="savePayment(this);" data-txt="Save" data-loadingtxt="Saving...">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <form class="full graph_head" id="documentForm4">  
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Host</label>
                                                            <input type="text" class="form-control" id="host" name="host" placeholder="Host" value="{{$smtp['host']}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Port</label>
                                                            <input type="text" class="form-control" id="port" name="port" placeholder="Port" value="{{$smtp['port']}}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{$smtp['username']}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Password</label>
                                                            <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="{{$smtp['password']}}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Encryption</label>
                                                            <input type="text" class="form-control" id="encryption" name="encryption" placeholder="Encryption" value="{{$smtp['encryption']}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">From Email</label>
                                                            <input type="text" class="form-control" id="from_email" name="from_email" placeholder="From Email" value="{{$smtp['from_email']}}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row mb-3">
                                                        
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">From Name</label>
                                                            <input type="text" class="form-control" id="from_name" name="from_name" placeholder="From Name" value="{{$smtp['from_name']}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Reply To Email</label>
                                                            <input type="text" class="form-control" id="replyTo_email" name="replyTo_email" placeholder="Reply To Email" value="{{$smtp['replyTo_email']}}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Reply To Name</label>
                                                            <input type="text" class="form-control" id="replyTo_name" name="replyTo_name" placeholder="Reply To Name" value="{{$smtp['replyTo_name']}}">
                                                        </div>
                                                        <div class="col-md-6 align-right">
                                                            
                                                            <button type="button" id="testSmtpBtn" class="btn cur-p btn-primary verifyEmailBtn marginTop28" onclick="testSmtp(this);" data-txt="Send Test Email" data-loadingtxt="Sending...">Send Test Email</button>
                                                        
                                                            <button type="button" id="saveSmtpBtn" class="btn cur-p btn-primary verifyEmailBtn marginTop28" onclick="saveSmtp(this);" data-txt="Save" data-loadingtxt="Saving...">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">

                                    <h5 style="font-weight: normal;" class="form-titled">Subadmin List</h5>

                                    <div class="table_section padding_infor_infod">
                                        <div class="table-responsive-sm">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Password</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="usersContainer">
                                                    
                                                @foreach($subadmins as $k => $subadmin)
                                                <tr id="userRow_{{$subadmin->id}}">
                                                    <td>{{$k+1}}</td>
                                                    <td>{{ucwords($subadmin->fname .' '. $subadmin->lname)}}</td>
                                                    <td>{{$subadmin->email}}</td>
                                                    <td>{{$subadmin->plainpassword}}</td>
                                                    <td><a href="javascript:void(0);" class="btn cur-p btn-outline-primary" onclick="deleteRow('{{$subadmin->id}}')"><i class="danger fa fa-trash-o"></i></a></td>
                                                </tr>
                                                @endforeach
                                                
                                                </tbody>
                                            </table>

                                            <button type="button" id="addMoreUserBtn" class="btn btn-outline-primary float-right" onclick="openAddUserModal()">Create Subadmin</button>

                                        </div>
                                    </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-ad" role="tabpanel" aria-labelledby="v-pills-ad-tab"> 
                                        <form class="full graph_head" id="documentForm5">

                                        <div class="form-group row mb-3">
                                            <div class="col-md-12">
    
                                                <label for="activeCheckDefault" class="form-label">Advertisement<span class="required"></span></label>

                                                <label class="form-label toggle-switch">
                                                    <input type="checkbox" id="activeToggle" value="{{$ad['adActive']}}" {{ $ad['adActive'] == 1 ? 'checked' : '' }} >
                                                    <span class="toggle-slider"></span>
                                                </label>

                                                <label class="text-danger" style="font-size: 12px;">Toggling this option will enable or disable advertisements on the homepage.</label>
                                            </div>
   
                                        </div>

                                        <div class="form-group row mb-3">
                                        
                                        @php
                                        if(!empty($ad["adImages"])){
                                            foreach($ad["adImages"] as $imageName){
                                                $imageNameParts = explode(".", $imageName);
                                                $imgId = $imageNameParts[0];
                                                $imagePath = route('private.adimage', ['filename' => $imageName]);
                                        @endphp
                                        <div class="col-md-2 px-0 adImage" id="{{$imgId}}">
                                            <div class="addBanner">
                                                <i class="bi bi-x-square adRemoveBtn" onclick="RemoveMe('{{$imgId}}')" data-id="{{$imgId}}"></i>
                                                <img src="{{$imagePath}}" style="width: 100%; height: 100%;">
                                            </div>
                                        </div>

                                        @php
                                            }
                                        }
                                        @endphp

                                            <div id="addBox" onclick="editAdPhoto(this)" class="col-md-2 px-0 adImage" data-fileelm="adFile">
                                                <div class="addBanner" style="padding:1.6em 0em;">
                                                    <i class="bi bi-camera"></i>
                                                </div>
                                            </div>
                                            
                                        </div>


                                        <div class="form-group row mb-3">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6 text-right">
                                                <button type="button" id="saveAdBtn" class="btn cur-p btn-primary verifyEmailBtn marginTop28" onclick="activeAd(this);" data-txt="Save" data-loadingtxt="Saving...">Save</button>
                                            </div>
                                        </div>

                                        <input type="file" id="adFile" accept="image/*" style="height: 1px; width: 1px;" onchange="adDailog()">
                                        
                                        </form>
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
    </div>
</div>



<div class="modal fade" id="addUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 style="font-weight:normal;" class="modal-title">Create Subadmin</h4>
              <button type="button" class="close" data-dismiss="modal" onclick="closeUserModal();">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="userfname" class="form-label">First Name<span class="required">*</span></label>
                    <input type="text" class="form-input" name="userfname" id="userfname" placeholder="First Name" value="">
                </div>
                <div class="col-md-6">
                    <label for="userlname" class="form-label">Last Name<span class="required">*</span></label>
                    <input type="text" class="form-input" name="userlname" id="userlname" placeholder="Last Name" value="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="useremail" class="form-label">Email<span class="required">*</span></label>
                    <input type="useremail" class="form-input" name="useremail" id="useremail" placeholder="Email" value="">
                </div>
                <div class="col-md-6">
                    <label for="userpassword" class="form-label">Password<span class="required">*</span></label>
                    <input type="text" class="form-input" name="userpassword" id="userpassword" placeholder="Password" value="">
                </div>
            </div>
            
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal" onclick="closeUserModal();">Cancel</button>
                <button type="button" id="addUserBtn" data-txt="Add" data-loadingtxt="Adding..." class="btn btn-primary " data-dismiss="modal" onclick="addUser(this);">Add</button>
            </div>
        </div>
    </div>
</div>

@endsection
@push("js")
<script>

    var adImagesArr = {};
    var imageMaxCount = 10;

    $(function(){
        @php
        if (!empty($ad["adImages"])) {
            // Loop through each image name in adImages and prepare the JavaScript object
            foreach($ad["adImages"] as $imageName) {
                $imageNameParts = explode(".", $imageName);
                $imgId = $imageNameParts[0];
                echo "adImagesArr['$imgId'] = '$imageName';";  // Inject each $imgId as a key and $imageName as a value
            }
        }
        @endphp

        createToggle('#activeToggle', (isOn) => {
            
            $("#activeToggle").val(`${isOn ? 1 : 0}`);
        });

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

    function toggleTitle(elm){
        var elmId = $(elm).attr("data-title");
        $(".form-title").addClass("hideMe");
        $("#"+elmId).removeClass("hideMe");

        $(".keyContainer").hide();
        $("#keyoutput").val("");
    }

    function generateKey(elm){
        //accessKeyBtn
        var elmId = $(elm).attr("id");
        $(elm).attr("disabled",true);
        var orgTxt = $(elm).attr("data-txt");
        var loadingTxt = $(elm).attr("data-loadingtxt");
        showLoader(elmId,loadingTxt); 
        
        var requrl = "admin/generateaccesskey";
        var postdata = {};
        
        callajax(requrl, postdata, function(resp){
            $(elm).removeAttr("disabled");
            hideLoader(elmId,orgTxt);
            if(resp.C == 100){
                $("#keyoutput").val(resp.R.specialAccessKey);
                $(".keyContainer").show();
                var err = 0;
                var msg = resp.M;
                showToast(err,msg);
            }else{
                var err = 1;
                var msg = resp.M;
                showToast(err,msg);
            }
        });
    }

    function copyKey(){
        // Get the text field containing the link
        var key = document.getElementById("keyoutput");

        // Select the text field
        key.select();
        key.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        document.execCommand("copy");

        var err = 0;
        var msg = "Special Access Key copied to clipboard: " + key.text;
        showToast(err,msg);
    }

    function savePayment(elm){
        
        const secretkey = $("#secretkey").val();
        const publickey = $("#publickey").val();
    
        if(!isRealValue(secretkey)){
            var err = 1;
            var msg = "Please enter your secret key.";
            showToast(err,msg);
            return false;
        }

        if(!isRealValue(publickey)){
            var err = 1;
            var msg = "Please enter your public key.";
            showToast(err,msg);
            return false;
        }

        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
        myModal.show();

        var title = 'Paystack Settings';
        var message = 'Please enter your special access key to perform this action';
        var confirmText = 'Ok';
        var cancelText = 'Cancel';
        
        // Update modal content dynamically
        document.getElementById('SAKeyModalLabel').textContent = title;
        document.getElementById('SAKeyMessage').textContent = message;
        document.getElementById('SAKeyConfirmBtn').textContent = confirmText;
        document.getElementById('SAKeyCancelBtn').textContent = cancelText;

        // Reset event listeners
        const confirmButton = document.getElementById('SAKeyConfirmBtn');
        const cancelButton = document.getElementById('SAKeyCancelBtn');

        // Add event listener for confirmation action
        confirmButton.onclick = function() {
            // Place your confirmation action here
            
            var SAKeyInput = document.getElementById('SAKeyInput').value;
            if(!isRealValue(SAKeyInput)){
                var err = 1;
                var msg = "Please enter your Special Access Key.";
                showToast(err,msg);
                return false;
            }else{

                myModal.hide();
                document.getElementById('SAKeyInput').value = '';

                var elmId = $(elm).attr("id");
                $(elm).attr("disabled",true);
                var orgTxt = $(elm).attr("data-txt");
                var loadingTxt = $(elm).attr("data-loadingtxt");
                showLoader(elmId,loadingTxt); 
                
                var requrl = "admin/savepaymentsettings";
                var postdata = {
                    "sakey":SAKeyInput,
                    "secretkey":secretkey,
                    "publickey":publickey
                };
                
                callajax(requrl, postdata, function(resp){
                    $(elm).removeAttr("disabled");
                    hideLoader(elmId,orgTxt);
                    
                    if(resp.C == 100){
                        var err = 0;
                        var msg = resp.M;
                        showToast(err,msg);
                    }else if(resp.C == 101){
                        var err = 1;
                        var msg = resp.M;
                        showToast(err,msg);
                    }else if(resp.C == 102){
                        var err = 1;
                        var msg = resp.M;
                        showToast(err,msg);
                    }else{
                        var err = 1;
                        var msg = resp.M;
                        showToast(err,msg);
                    }
                });
            }
            
        };

        // Add event listener for cancel action
        cancelButton.onclick = function() {
            //var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
            myModal.hide();
        };

    }
    
    function saveSmtp(elm){
        
        const host = $("#host").val();
        const port = $("#port").val();
        const username = $("#username").val();
        const password = $("#password").val();
        const encryption = $("#encryption").val();
        const from_email = $("#from_email").val();
        const from_name = $("#from_name").val();
        const replyTo_email = $("#replyTo_email").val();
        const replyTo_name = $("#replyTo_name").val();
        
        if(!isRealValue(host)){
            var err = 1;
            var msg = "Please enter the SMTP host.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(port)){
            var err = 1;
            var msg = "Please enter the SMTP port.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(username)){
            var err = 1;
            var msg = "Please enter the SMTP username.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(password)){
            var err = 1;
            var msg = "Please enter the SMTP password.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(from_email)){
            var err = 1;
            var msg = "Please enter the 'from' email address.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(from_name)){
            var err = 1;
            var msg = "Please enter the 'from' name.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(replyTo_email)){
            var err = 1;
            var msg = "Please enter the reply-to email address.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(replyTo_name)){
            var err = 1;
            var msg = "Please enter the reply-to name.";
            showToast(err, msg);
            return false;
        }

        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
        myModal.show();

        var title = 'Email SMTP Settings';
        var message = 'Please enter your special access key to perform this action';
        var confirmText = 'Ok';
        var cancelText = 'Cancel';
        
        // Update modal content dynamically
        document.getElementById('SAKeyModalLabel').textContent = title;
        document.getElementById('SAKeyMessage').textContent = message;
        document.getElementById('SAKeyConfirmBtn').textContent = confirmText;
        document.getElementById('SAKeyCancelBtn').textContent = cancelText;

        // Reset event listeners
        const confirmButton = document.getElementById('SAKeyConfirmBtn');
        const cancelButton = document.getElementById('SAKeyCancelBtn');

        // Add event listener for confirmation action
        confirmButton.onclick = function() {
            // Place your confirmation action here
            
            var SAKeyInput = document.getElementById('SAKeyInput').value;
            if(!isRealValue(SAKeyInput)){
                var err = 1;
                var msg = "Please enter your Special Access Key.";
                showToast(err,msg);
                return false;
            }else{

                myModal.hide();
                document.getElementById('SAKeyInput').value = '';

                var elmId = $(elm).attr("id");
                $(elm).attr("disabled",true);
                var orgTxt = $(elm).attr("data-txt");
                var loadingTxt = $(elm).attr("data-loadingtxt");
                showLoader(elmId,loadingTxt); 
                
                var requrl = "admin/saveemailsettings";
                var postdata = {
                    "sakey":SAKeyInput,
                    "host":host,
                    "port":port,
                    "username":username,
                    "password":password,
                    "encryption":encryption,
                    "from_email":from_email,
                    "from_name":from_name,
                    "replyTo_email":replyTo_email,
                    "replyTo_name":replyTo_name
                };
                
                callajax(requrl, postdata, function(resp){
                    $(elm).removeAttr("disabled");
                    hideLoader(elmId,orgTxt);
                    if(resp.C == 100){
                        var err = 0;
                        var msg = resp.M;
                        showToast(err,msg);
                    }else{
                        var err = 1;
                        var msg = resp.M;
                        showToast(err,msg);
                    }            
                });
            }
        };

        // Add event listener for cancel action
        cancelButton.onclick = function() {
            //var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
            myModal.hide();
        };
            
    }

    function testSmtp(elm){

        var elmId = $(elm).attr("id");
        $(elm).attr("disabled",true);
        var orgTxt = $(elm).attr("data-txt");
        var loadingTxt = $(elm).attr("data-loadingtxt");
        showLoader(elmId,loadingTxt); 
        
        var requrl = "admin/sendTestEmail";
        var postdata = {};
        
        callajax(requrl, postdata, function(resp){
            $(elm).removeAttr("disabled");
            hideLoader(elmId,orgTxt);
            if(resp.C == 100){
                var err = 0;
                var msg = resp.M;
                showToast(err,msg);
            }else{
                var err = 1;
                var msg = resp.M;
                showToast(err,msg);
            }            
        });
    }


    function validateForm(elm) {

        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
        myModal.show();

        var title = 'Update profile';
        var message = 'Please enter your special access key to perform this action';
        var confirmText = 'Ok';
        var cancelText = 'Cancel';
        
        // Update modal content dynamically
        document.getElementById('SAKeyModalLabel').textContent = title;
        document.getElementById('SAKeyMessage').textContent = message;
        document.getElementById('SAKeyConfirmBtn').textContent = confirmText;
        document.getElementById('SAKeyCancelBtn').textContent = cancelText;

        // Reset event listeners
        const confirmButton = document.getElementById('SAKeyConfirmBtn');
        const cancelButton = document.getElementById('SAKeyCancelBtn');

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

            // Add event listener for confirmation action
            confirmButton.onclick = function() {
                // Place your confirmation action here
                var SAKeyInput = document.getElementById('SAKeyInput').value;
                if(!isRealValue(SAKeyInput)){
                    var err = 1;
                    var msg = "Please enter your Special Access Key.";
                    showToast(err,msg);
                    return false;
                }else{

                    myModal.hide();
                    document.getElementById('SAKeyInput').value = '';

                    var elmId = $(elm).attr("id");
                    $(elm).attr("disabled",true);
                    var orgTxt = $(elm).attr("data-txt");
                    var loadingTxt = $(elm).attr("data-loadingtxt");
                    showLoader(elmId,loadingTxt);
                    
                    var requrl = "admin/saveprofile";
                    var postdata = {
                        "sakey":SAKeyInput,
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

            };
            
        }

        // Add event listener for cancel action
        cancelButton.onclick = function() {
            //var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
            myModal.hide();
        };
    }

    function validatePasswordForm(elm){

        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
        myModal.show();

        var title = 'Update password';
        var message = 'Please enter your special access key to perform this action';
        var confirmText = 'Ok';
        var cancelText = 'Cancel';
        
        // Update modal content dynamically
        document.getElementById('SAKeyModalLabel').textContent = title;
        document.getElementById('SAKeyMessage').textContent = message;
        document.getElementById('SAKeyConfirmBtn').textContent = confirmText;
        document.getElementById('SAKeyCancelBtn').textContent = cancelText;

        // Reset event listeners
        const confirmButton = document.getElementById('SAKeyConfirmBtn');
        const cancelButton = document.getElementById('SAKeyCancelBtn');

        // Add event listener for confirmation action
        confirmButton.onclick = function() {
            
            // Place your confirmation action here
            var SAKeyInput = document.getElementById('SAKeyInput').value;
            if(!isRealValue(SAKeyInput)){
                var err = 1;
                var msg = "Please enter your Special Access Key.";
                showToast(err,msg);
                return false;
            }else{

                myModal.hide();
                document.getElementById('SAKeyInput').value = '';

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
                        "sakey":SAKeyInput,
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

        };

        // Add event listener for cancel action
        cancelButton.onclick = function() {
            //var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
            myModal.hide();
        };

    }

    function addUser(elm){

        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
        myModal.show();

        var title = 'Create user';
        var message = 'Please enter your special access key to perform this action';
        var confirmText = 'Ok';
        var cancelText = 'Cancel';
        
        // Update modal content dynamically
        document.getElementById('SAKeyModalLabel').textContent = title;
        document.getElementById('SAKeyMessage').textContent = message;
        document.getElementById('SAKeyConfirmBtn').textContent = confirmText;
        document.getElementById('SAKeyCancelBtn').textContent = cancelText;

        // Reset event listeners
        const confirmButton = document.getElementById('SAKeyConfirmBtn');
        const cancelButton = document.getElementById('SAKeyCancelBtn');

        // Add event listener for confirmation action
        confirmButton.onclick = function() {
            // Place your confirmation action here
            var SAKeyInput = document.getElementById('SAKeyInput').value;
            if(!isRealValue(SAKeyInput)){
                var err = 1;
                var msg = "Please enter your Special Access Key.";
                showToast(err,msg);
                return false;
            }else{

                myModal.hide();
                document.getElementById('SAKeyInput').value = '';
                
                var fname = $("#userfname").val();
                var lname = $("#userlname").val();
                var email = $("#useremail").val();
                var password = $("#userpassword").val();

                var fnameObj = validateName(fname);
                var lnameObj = validateName(lname);

                var passwordValidObj =validatePassword(password);
                var psswdErr = passwordValidObj.err;
                var psswdMsg = passwordValidObj.msg;
                

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
                } else if (!isRealValue(email)) {
                    var err = 1;
                    var msg = 'Please enter your email.';
                    showToast(err,msg);
                    return false;
                } else if (isRealValue(email) && !validateEmail(email)) {
                    var err = 1;
                    var msg = 'Please enter a valid email.';
                    showToast(err,msg);
                    return false;
                } else if (!isRealValue(password)) {
                    var err = 1;
                    var msg = 'Please enter the new password.';
                    showToast(err,msg);
                    return false;
                } else if (isRealValue(password) && psswdErr == 1) {
                    var err = 1;
                    var msg = psswdMsg;
                    showToast(err,msg);
                    return false;
                } else{
                    
                    var elmId = $(elm).attr("id");
                    $(elm).attr("disabled",true);
                    var orgTxt = $(elm).attr("data-txt");
                    var loadingTxt = $(elm).attr("data-loadingtxt");
                    showLoader(elmId,loadingTxt); 

                    var requrl = 'admin/createuser';
                    var postData = {
                        "_token":CSRFTOKEN,
                        "sakey":SAKeyInput,
                        "fname":fname,
                        "lname":lname,
                        "email":email,
                        "password":password
                    };

                    callajax(requrl, postData, function(resp){
                        
                        $(elm).removeAttr("disabled");
                        hideLoader(elmId,orgTxt);
                        var err = 0;
                        var msg = resp.M;
                        if(resp.C == 100){
                            err = 0;
                            var rowId = resp.R.id;
                            var currentRowNo = $("#usersContainer tr").length;
                            currentRowNo++;

                            var userRow = `<tr id="userRow_`+rowId+`">
                                <td>`+currentRowNo+`</td>
                                <td>`+fname+` `+lname+`</td>
                                <td>`+email+`</td>
                                <td>`+password+`</td>
                                <td><a href="javascript:void(0);" class="btn cur-p btn-outline-primary" onclick="deleteRow(\'`+rowId+`\')"><i class="danger fa fa-trash-o"></i></a></td>
                            </tr>`;

                            $("#usersContainer").append(userRow);
                                
                            closeUserModal()

                        }else{
                            err = 1;
                        }
                        
                        showToast(err,msg);

                    });

                }
            }

        };

        // Add event listener for cancel action
        cancelButton.onclick = function() {
            //var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
            myModal.hide();
        };
        
    }

    function openAddUserModal(){
        document.getElementById("addUserModal").classList.add("show");
        document.querySelector(".modal-backdrop").classList.add("show"); 
    }

    function closeUserModal() {
        // Close the Get Started modal

        $("#userfname").val('');
        $("#userlname").val('');
        $("#useremail").val('');
        $("#userpassword").val('');

        document.getElementById("addUserModal").classList.remove("show");
        document.querySelector(".modal-backdrop").classList.remove("show");
    }
    
    function deleteRow(rwId){
        
        var requrl = 'admin/deleteuser';
        var postData = {
            "_token":CSRFTOKEN,
            "subadminId":rwId
        };

        callajax(requrl, postData, function(resp){

            var err = 0;
            var msg = resp.M;
            if(resp.C == 100){
                err = 0;
                $("userRow_"+rwId).remove();
            }else{
                err = 1;
            }
            
            showToast(err,msg);

        });

    }

    function editAdPhoto(elm){
        $("#adFile").val('');
        $("#adFile").trigger("click");
    }

    function adDailog() {
        // Get the image input and file
        const imageInput = document.getElementById('adFile');
        const file = imageInput.files[0];

        // Get the current length of the images array
        const adImagesArrLength = Object.keys(adImagesArr).length;

        if (adImagesArrLength < imageMaxCount) {
            if (!file) {
                var err = 1;
                var msg = "No file selected!";
                showToast(err, msg);
                return;
            }

            // Validate file type (only allow jpg, jpeg, or png)
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!allowedTypes.includes(file.type)) {
                var err = 1;
                var msg = "Please upload a valid image file (JPG, JPEG, or PNG).";
                showToast(err, msg);
                return;
            }

            if (file.size > 5 * 1024 * 1024) { // 5MB limit
                var err = 1;
                var msg = "File size should not exceed 5MB.";
                showToast(err,msg);
                return;
            }

            // Create an image object to load the selected file
            const img = new Image();
            const reader = new FileReader();

            reader.onload = function (e) {
                img.src = e.target.result;
            };

            reader.readAsDataURL(file);

            img.onload = function () {
                // Check if image dimensions are valid
                if (img.width < 1280 || img.height < 768) {
                    // Clear input and show error message
                    $("#adFile").val('');
                    var err = 1;
                    var msg = "Image must be at least 1280x768 pixels.";
                    showToast(err, msg);
                    return;
                } else {
                    // Create a unique ID for the image
                    const imgId = 'ad_' + Date.now() + '_' + Math.floor(Math.random() * 100000);

                    // Create a canvas element for resizing
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    const width = 1280;
                    const height = 768;

                    // Resize the image and draw it on the canvas
                    canvas.width = width;
                    canvas.height = height;
                    ctx.drawImage(img, 0, 0, width, height);

                    // Convert the resized image back to a data URL
                    const resizedImage = canvas.toDataURL('image/jpeg');


                    //save to db
                    const requrl = "admin/uploadadphoto";
                    const postdata = {
                        "imgId":imgId,
                        "imgData":resizedImage
                    };
                    callajax(requrl, postdata, function(resp){
                        
                        var err = 1;
                        if(resp.C == 100){
                            err = 0;
                            var imagePath = resp.R.path;
                            //$(".profilephotoimg").attr("src",resizedImage);

                            
                            // Add the resized image to the display
                            const imgBox = `
                                <div class="col-md-2 px-0 adImage" id="${imgId}">
                                    <div class="addBanner">
                                        <i class="bi bi-x-square adRemoveBtn" onclick="RemoveMe('${imgId}')" data-id="${imgId}"></i>
                                        <img src="${imagePath}" style="width: 100%; height: 100%;">
                                    </div>
                                </div>
                            `;
                            $("#addBox").before(imgBox);

                            // Add the resized image to the object
                            adImagesArr[imgId] = imagePath;

                            // Update the length and handle the "Add Box" visibility
                            if (Object.keys(adImagesArr).length >= imageMaxCount) {
                                $("#addBox").hide();
                            }
                        }
                        
                        var msg = resp.M;
                        showToast(err,msg);
                        
                    });

                }
            };

            img.onerror = function () {
                var err = 1;
                var msg = "Invalid image file.";
                showToast(err, msg);
            };

        } else {
            // Max images reached, clear the input
            $("#addBox").addClass("y");
            $("#adFile").val('');
            $("#addBox").hide();
        }
    }

    function RemoveMe(imgId) {
        const requrl = "admin/deleteadphoto";
        const postdata = {
            "imgId":imgId
        };
        
        callajax(requrl, postdata, function(resp){
            var err = 1;
            if(resp.C == 100){
                err = 0;
                if (adImagesArr[imgId]) {
                    $("#" + imgId).remove();
                    delete adImagesArr[imgId];

                    // Update the "Add Box" visibility based on the length of the array
                    const adImagesArrLength = Object.keys(adImagesArr).length;
                    if (adImagesArrLength < imageMaxCount) {
                        $("#addBox").show();
                    }
                }

            }

            var msg = resp.M;
            showToast(err,msg);

        });
        
    }

    
    function activeAd(elm) {
    const adActive = $("#activeToggle").val();
    const adImagesArrLength = Object.keys(adImagesArr).length;

    console.log('adActive:', adActive); // Log the value of adActive correctly
    if (adActive > 0) {
        // If no images are uploaded
        if (!isRealValue(adImagesArr) || adImagesArrLength === 0) {
            var err = 1;
            var msg = "Please upload at least one image.";
            showToast(err, msg);
            return false;
        }
    }

    // Disable the button, show loading state
    var elmId = $(elm).attr("id");
    $(elm).attr("disabled", true);
    var orgTxt = $(elm).attr("data-txt");
    var loadingTxt = $(elm).attr("data-loadingtxt");
    showLoader(elmId, loadingTxt); 

    // Prepare data for the AJAX request
    const requrl = "admin/activeAd";
    const postdata = {
        "adActive": adActive
    };

    // Send the AJAX request
    callajax(requrl, postdata, function(resp) {
        $(elm).removeAttr("disabled");
        hideLoader(elmId, orgTxt);

        var err = 1;
        if (resp.C === 100) {
            err = 0;
        }

        var msg = resp.M;
        showToast(err, msg);
    });
}

    
</script>
@endpush
<!-- Footer -->
<!--<footer class="bg-primary-dark-2 text-white">-->
<footer style="padding-bottom: unset; padding-top: 1rem;" class="section-area !bg-primary !text-primary-color">
      <div class="container dk-py-20 dk-lg:py-[100px]">
        <div class="row">
          <div class="col-12 order-first lg:col-12">
            <div class="w-full">
              <a href="." class="inline-block mb-5">
                <img class="w-full fill-current" style="width: 220px;" id="NavbarBrand" data-name="NavbarBrand" src="{{url('images/logo.png')}}" alt="Smart Recruit"/>
              </a>
              <a href="javascript:void(0);" style="float: right;" onclick="adminStarted();"><img src="{{url('images/NDPC.png')}}" class="image wp-image-21834  attachment-full size-full" alt="" style="max-width: 100%;height: auto;width: 200px;" decoding="async"></a>

              <div class="w-full">
              <p class="text-body-dark-1 sm:col-6">
                We redefine the hiring and job-seeking experience with a secure, efficient, and modern approach.
              </p>
              <p class="mb-8 text-body-dark-1 sm:col-6">
              {{ config('custom.support_email') }}
              </p>
              </div>
            </div>
          </div>
          
          
          
           
          <!--<div class="col-12 -order-3 lg:col-4 lg:order-1">
            <div class="w-full">
              <h4 class="mb-9 text-lg font-semibold text-inherit">Subscribe</h4>

              <p class="text-body-dark-11">
              Subscribe us to get our newsletters
              </p>

              <form action="#" method="POST" target="_blank" class="mt-8 flex">
                <input
                  type="email"
                  name="email"
                  class="inline-block flex-grow px-5 py-3 rounded-md rounded-e-none border border-solid border-alpha-dark text-inherit text-base focus:border-primary"
                  placeholder="Email address"
                  required
                />

                <button
                  type="submit"
                  class="inline-block py-3 w-[50px] rounded-md rounded-s-none text-center text-lg/none bg-primary text-primary-color hover:bg-primary-light-10 dark:hover:bg-primary-dark-10 focus:bg-primary-light-10 dark:focus:bg-primary-dark-10"
                >
                  <i class="lni lni-envelope"></i>
                </button>
              </form>
            </div>
          </div>-->
         
        </div>
      </div>
      <div class="w-full border-t border-solid border-alpha-dark"></div>
      <div class="container py-2">
        <div class="flex flex-wrap">
          <div class="w-full md:w-1/2">
            <div class="my-1">
              <div class="flex flex-wrap justify-center gap-x-3 md:justify-start">

                <a href="{{url('/faq')}}" role="menuitem" class="ic-page-scroll text-body-dark-1 hover:text-body-dark-12 text-white">FAQ</a>

                <a href="{{url('/privacypolicy')}}" role="menuitem" class="ic-page-scroll text-body-dark-1 hover:text-body-dark-12 text-white">Privacy Policy</a>
                
                <a href="{{url('/pricing')}}" role="menuitem" class="ic-page-scroll text-body-dark-1 hover:text-body-dark-12 text-white">Pricing</a>
              </div>
            </div>
          </div>

          <div class="w-full md:w-1/2">
            <div class="my-1 flex justify-center md:justify-end">
              <p class="text-body-dark-1">
                &#169; {{date("Y")}} Smart Technology Services Ltd. All rights reserved.
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>

<!-- Modal -->
 <style>

  .hide{
    display: none;
  }

  .modal .row {
    margin-top: unset;
  }
  
  .modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
  }

  .fade.show {
    opacity: 1;
    display: block;
  }

  .modal {
    position: fixed;
    top: 3rem;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow-x: hidden;
    overflow-y: auto;
    outline: 0;
 }

  .fade {
    opacity: 0;
    transition: opacity .15s linear;
  }

  

  .modal.fade .modal-dialog {
    transition: -webkit-transform .3s ease-out;
    transition: transform .3s ease-out;
    transition: transform .3s ease-out,-webkit-transform .3s ease-out;
    -webkit-transform: translate(0,-25%);
    transform: translate(0,-25%);
  }
  
  .modal.show .modal-dialog {
    -webkit-transform: translate(0,0);
    transform: translate(0,0);
  }

  .modal-dialog {
    max-width: 625px;
    max-height: calc(100vh - 4rem);
    margin: 1.75rem auto;
    position: relative;
    width: auto;
    pointer-events: none;
  }

  .modal-content {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    height: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: .3rem;
    outline: 0;
  }

  .modal-header {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 1rem;
  }

  .modal-header h4.modal-title {
    font-family: "Open Sans", sans-serif;
    font-weight: 300;
    color: #3d63dd;
    font-size: 1.25rem;
    margin-bottom: 0;
    line-height: 1.5;
  }

  .modal-header .btn-close {
    padding: 1rem;
    margin: -1rem -1rem -1rem auto;
    color: #3d63dd;
    font-size: 1.5rem;
  }

  button.close {
    padding: 0;
    background-color: transparent;
    border: 0;
    -webkit-appearance: none;
  }

  .modal-body {
    position: relative;
    /*-webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;*/
    padding: 1rem;
    padding-bottom: 2rem;
    text-align: center;

    overflow-y: auto;
    flex-grow: 1;
  }

  .modal-footer {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    padding: 1rem;
    border-top: 1px solid #e9ecef;
  }

  .modal-backdrop.show {
    opacity: .5;
    display: block;
  }

  .modal-backdrop.fade {
    opacity: 0;
    display: none;
  }

  .fade.show {
    opacity: 1;
    display: block;
  }

  .modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #000;
    display: none;
  }

  .fade {
    opacity: 0;
    transition: opacity .15s linear;
  }

  .imemployer, .imcandidate {
    background-color: #3d63dd;
  }

  .imemployer:hover, .imcandidate:hover {
    --tw-bg-opacity: 1;
    background-color: rgb(54 87 195 / var(--tw-bg-opacity));
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
  }

  .text-right{
    text-align: right;
  }

  .text-left{
    text-align: left;
  }

  .passwordIcon {
    right: 40px;
    margin-top: -37px;
    font-size: 1.5rem;
    cursor: pointer;
    position: absolute;
    color: #1e1f24;
  }

  .pt-0 {
    padding-top: 0;
  }

  .mt-unset {
    margin-top: unset;
  }


  .forgotPasswordBtn{
    float: left;
    padding-left: 23px;
    font-size: 13px;
  }

/* Responsive Adjustments */
@media (max-width: 576px) {
  .modal-dialog {
    margin: 1rem auto;
  }

  .text-right, .text-left {
    text-align: center !important;
  }
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.alert {
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}

.toastMessage {
    display:none;
    position: fixed;
    width: fit-content;
    right: 10px;
    bottom: 10px;
    z-index: 1050;
}

/*Loading spinners*/
@keyframes spinner-border {
  to { transform: rotate(360deg); }
}

.spinner-border {
  display: inline-block;
  width: 1.5rem;
  height: 1.5rem;
  vertical-align: text-bottom;
  border: 0.20em solid #fff;
  border-right-color: transparent;
  border-radius: 50%;
  animation: spinner-border .75s linear infinite;
}

.spinner-border-sm {
    width: 1.5rem;
    height: 1.5rem;
    border-width: 0.20em;
}


@keyframes spinner-grow {
  0% {
    transform: scale(0);
  }
  50% {
    opacity: 1;
  }
}

.spinner-grow {
  display: inline-block;
  width: 1.5rem;
  height: 1.5rem;
  vertical-align: text-bottom;
  background-color: currentColor;
  border-radius: 50%;
  opacity: 0;
  animation: spinner-grow .75s linear infinite;
}

.spinner-grow-sm {
    width: 1.5rem;
    height: 1.5rem;
}
</style>

<div class="modal fade" id="getStartedModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="staticBackdropLabel">Are you a Recruiter or Candidate?</h4>
        <button type="button" class="btn-close" onclick="closeGetStartedModal();" aria-label="Close"><i class="bi bi-x"></i></button>
      </div>
      <div class="modal-body">
      <a href="javascript:void(0)" class="imemployer bbtn-navbar ml-5 px-6 py-3 rounded-md bg-primary-color bg-opacity-20 text-base font-medium text-primary-color hover:bg-opacity-100 hover:text-primary" role="button" onclick="openAuthModal('employer');">Recruiter</a>
      
      <a href="javascript:void(0)" class="imcandidate bbtn-navbar ml-5 px-6 py-3 rounded-md bg-primary-color bg-opacity-20 text-base font-medium text-primary-color hover:bg-opacity-100 hover:text-primary" role="button" onclick="openAuthModal('candidate');">Candidate</a>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>-->
    </div>
  </div>
</div>

<!--- Forgot password --->
<div class="modal fade" id="forgotpasswordModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="staticBackdropLabel">Forgot Password</h4>
        <button type="button" class="btn-close" onclick="closeforgotpasswordModal();" aria-label="Close"><i class="bi bi-x"></i></button>
      </div>
      <div class="modal-body pt-0">
        <div class="row"> 
          <div id="forgotPasswordSection" class="forgotPasswordSection text-body-dark-1 sm:col-12 mt-unset">
            <div class="text-center max-w-[550px] mx-auto hide">
                  <h6 class="block text-lg font-normal text-primary">Forgot Password</h6>
            </div>
            <form class="flex flex-col gap-6">
                
                  <div class="col-12 md:col-12 mb-3">
                    <input id="user_email" type="email" name="user_email" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Email" required="">
                  </div>
                  
                  <div class="col-12 md:col-12" style="text-align: left;">  
                    <!--A link to change your password has been sent to your registered email address.-->
                    <span style="font-size: 12px;margin-top: 24px;float: left;">A link to change your password will be sent to your registered email address.</span>
                    
                    <button id="forgotPasswordLikBtn" type="button" class="inline-block px-5 py-3 rounded-md text-base bg-primary text-primary-color hover:bg-primary-light-10 dark:hover:bg-primary-dark-10 focus:bg-primary-light-10 dark:focus:bg-primary-dark-10" data-txt="Send" data-loadingtxt="Sending..." onclick="forgotpassword(this)" style="float: right;">Send</button>
                    
                  </div>
                
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--- / - Forgot password --->


<div class="modal fade" id="candidateModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="staticBackdropLabel">Candidate</h4>
        <button type="button" class="btn-close" onclick="closecandidateModal();" aria-label="Close"><i class="bi bi-x"></i></button>
      </div>
      <div class="modal-body pt-0">
        <div class="row"> 
          <div id="candidateLoginSection" class="loginSection text-body-dark-1 sm:col-12 mt-unset">
            <div class="text-center max-w-[550px] mx-auto">
                  <h6 class="block text-lg font-normal text-primary">LogIn</h6>
            </div>
            <form class="flex flex-col gap-6">
                <div class="row">
                  <div class="col-12 md:col-12">
                    <input id="can_login_email" type="email" name="can_login_email" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Email" required="">
                  </div>
                  
                  <div class="col-12 md:col-12">
                    <input id="loginpassword" type="password" name="loginpassword" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Password" required="">
                    <i toggle="loginpassword" class="passwordIcon bi bi-eye-slash"></i>
                    <a href="javascript:void(0);" class="forgotPasswordBtn" onclick="openforgotpasswordModal()">Forgot password?</a>
                    
                  </div>
                
                  <div class="col-12 md:col-6">
                  New to Smart Recruit? <a href="javascript:void(0);" onclick="notHaveAccountCandidate();">Join Now</a>
                  </div>
                  <div class="col-6 md:col-6 text-right">
                    <button id="candidateLoginBtn" type="button" class="inline-block px-5 py-3 rounded-md text-base bg-primary text-primary-color hover:bg-primary-light-10 dark:hover:bg-primary-dark-10 focus:bg-primary-light-10 dark:focus:bg-primary-dark-10" data-txt="Login" data-loadingtxt="Logging In..." data-type="candidate" onclick="login(this)">
                      Login
                    </button>
                  </div>
                </div>
            </form>
          </div>
          
          <div id="candidateRegisterSection" class="registerSection text-body-dark-1 sm:col-12 mt-unset hide">
            <div class="text-center max-w-[550px] mx-auto">
              <h6 class="block text-lg font-normal text-primary">Register</h6>
            </div>
            <form class="flex flex-col gap-6">
              <div class="row">
                <div class="col-12 md:col-6">
                  <input id="can_fname" type="text" name="can_fname" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="First name" required="">
                </div>

                <div class="col-12 md:col-6">
                  <input id="can_lname" type="text" name="can_lname" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Last name" required="">
                </div>

                <div class="col-12 md:col-12">
                  <input id="can_reg_email" type="email" name="can_reg_email" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Email" required="">
                </div>
                
                <div class="col-12 md:col-12">
                  <input id="regpassword" type="password" name="regpassword" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Password" required="">
                  <i toggle="regpassword" class="passwordIcon bi bi-eye-slash"></i>
                </div>

                <div class="col-12 md:col-12">
                  <input id="confirmpassword" type="password" name="confirmpassword" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Confirm password" required="">
                  <i toggle="confirmpassword" class="passwordIcon bi bi-eye-slash"></i>
                </div>
                
                <div class="col-12 md:col-12">
                  <input type="checkbox" name="agree_term" id="agree_term" class="agree-term" />
                  <label for="agree_term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#termsandcondition" class="term-service">Terms & Conditions</a> and <a href="privacypolicy" class="term-service">Privacy Policy</a></label>
                </div> 

                  <div class="col-12 md:col-6"> Already have an account? <a href="javascript:void(0);" onclick="haveAnAccountCandidate();">Login here</a>
                  </div>
                  <div class="col-12 md:col-6 text-right">
                    <button id="candidateRegBtn" type="button" class="inline-block px-5 py-3 rounded-md text-base bg-primary text-primary-color hover:bg-primary-light-10 dark:hover:bg-primary-dark-10 focus:bg-primary-light-10 dark:focus:bg-primary-dark-10" data-txt="Register" data-loadingtxt="Registering..." data-type="candidate" onclick="register(this)">
                      Register
                    </button>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
      -->
    </div>
  </div>
</div>

<div class="modal fade" id="employerModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="staticBackdropLabel">Recruiter</h4>
        <button type="button" class="btn-close" onclick="closeemployerModal();" aria-label="Close"><i class="bi bi-x"></i></button>
      </div>
      <div class="modal-body pt-0">
        <div class="row"> 
          <div id="employerLoginSection" class="loginSection text-body-dark-1 sm:col-12 mt-unset">
            <div class="text-center max-w-[550px] mx-auto">
                  <h6 class="block text-lg font-normal text-primary">LogIn</h6>
            </div>
            <form class="flex flex-col gap-6">
                <div class="row">
                  <div class="col-12 md:col-12">
                    <input id="emp_login_email" type="email" name="emp_login_email" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Email" required="">
                  </div>
                
                  <div class="col-12 md:col-12">
                    <input id="loginpasswordEmp" type="password" name="loginpasswordEmp" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Password" required="">
                    <i toggle="loginpasswordEmp" class="passwordIcon bi bi-eye-slash"></i>
                    <a href="javascript:void(0);" class="forgotPasswordBtn" onclick="openforgotpasswordModal()">Forgot password?</a>
                  </div>
                
                  <div class="col-12 md:col-6">
                  New to Smart Recruit? <a href="javascript:void(0);" onclick="notHaveAccountEmployer();">Join Now</a>
                  </div>
                  <div class="col-12 md:col-6 text-right">
                    <button id="employerLoginBtn" type="button" class="inline-block px-5 py-3 rounded-md text-base bg-primary text-primary-color hover:bg-primary-light-10 dark:hover:bg-primary-dark-10 focus:bg-primary-light-10 dark:focus:bg-primary-dark-10" data-txt="Login" data-loadingtxt="Logging In..." data-type="employer" onclick="login(this)">
                      Login
                    </button>
                  </div>
                </div>
            </form>
          </div>
          
          <div id="employerRegisterSection" class="registerSection text-body-dark-1 sm:col-12 mt-unset hide">
            <div class="text-center max-w-[550px] mx-auto">
              <h6 class="block text-lg font-normal text-primary">Register</h6>
            </div>
            <form class="flex flex-col gap-6">
              <div class="row">
                <div class="col-12 md:col-6">
                  <input id="emp_fname" type="text" name="emp_fname" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="First name" required="">
                </div>

                <div class="col-12 md:col-6">
                  <input id="emp_lname" type="text" name="emp_lname" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Last name" required="">
                </div>

                <div class="col-12 md:col-12">
                  <input id="emp_reg_email" type="email" name="emp_reg_email" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Email" required="">
                </div>

                <div class="col-12 md:col-12">
                  <input id="regpasswordEmp" type="password" name="regpasswordEmp" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Password" required="">
                  <i toggle="regpasswordEmp" class="passwordIcon bi bi-eye-slash"></i>
                </div>
                
                <div class="col-12 md:col-12">
                  <input id="confirmpasswordEmp" type="password" name="confirmpasswordEmp" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Confirm password" required="">
                  <i toggle="confirmpasswordEmp" class="passwordIcon bi bi-eye-slash"></i>
                </div>
                
                <div class="col-12 md:col-12">
                  <input type="checkbox" name="emp_agree_term" id="emp_agree_term" class="agree-term" />
                  <label for="emp_agree_term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#termsandcondition" class="term-service">Terms & Conditions</a> and <a href="privacypolicy" class="term-service">Privacy Policy</a></label>
                </div> 

                <div class="col-12 md:col-6"> Already have an account? <a href="javascript:void(0);" onclick="haveAnAccountEmployer();">Login here</a>
                </div>
                <div class="col-12 md:col-6 text-right">
                  <button id="employerRegBtn" type="button" class="inline-block px-5 py-3 rounded-md text-base bg-primary text-primary-color hover:bg-primary-light-10 dark:hover:bg-primary-dark-10 focus:bg-primary-light-10 dark:focus:bg-primary-dark-10" data-type="employer" data-txt="Register" data-loadingtxt="Registering..." onclick="register(this)">
                      Register
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>    
      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
      -->
    </div>
  </div>
</div>


<div class="modal fade" id="adminStartedModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="staticBackdropLabel">Admin</h4>
        <button type="button" class="btn-close" onclick="closeAdminStartedModal();" aria-label="Close"><i class="bi bi-x"></i></button>
      </div>
      <div class="modal-body pt-0">
        <div class="row"> 
          <div id="adminLoginSection" class="loginSection text-body-dark-1 sm:col-12 mt-unset">
            <div class="text-center max-w-[550px] mx-auto">
                  <h6 class="block text-lg font-normal text-primary">LogIn</h6>
            </div>
            <form class="flex flex-col gap-6">
                <div class="row">
                  <div class="col-12 md:col-12">
                    <input id="adm_login_email" type="email" name="adm_login_email" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Email" required="">
                  </div>
                
                  <div class="col-12 md:col-12">
                    <input id="loginpasswordAdm" type="password" name="loginpasswordAdm" class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary" placeholder="Password" required="">
                    <i toggle="loginpasswordAdm" class="passwordIcon bi bi-eye-slash"></i>
                  </div>
                
                  <div class="col-12 md:col-6">
                  <!--You are logged in as an admin. <a href="javascript:void(0);" onclick="closeAdminStartedModal();">Go Back</a>-->
                  </div>

                  <div class="col-12 md:col-6 text-right">
                    <button id="adminLoginBtn" type="button" class="inline-block px-5 py-3 rounded-md text-base bg-primary text-primary-color hover:bg-primary-light-10 dark:hover:bg-primary-dark-10 focus:bg-primary-light-10 dark:focus:bg-primary-dark-10" data-txt="Login" data-loadingtxt="Logging In..." data-type="admin" onclick="adminLogin(this)">
                      Login
                    </button>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
      -->
    </div>
  </div>
</div>


<div class="modal-backdrop"></div>

<!-- Zoho SalesIQ Live Chat Script -->
<style>
   .chat-iframe-wrap.zsiq-medium-size.chat-iframe-open{
      bottom:115px !important;
      height: 480px !important;
   }
   .zsiq-float{
      bottom:60px !important;
   }
</style>
<script>window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}</script><script id="zsiqscript" src="https://salesiq.zohopublic.com/widget?wc=siq2f563662f6b8f6926b0f7eb892d700d5169cedcfcc2bdf839cdedb97f5c3c4e4" defer></script>
<!-- Zoho SalesIQ Live Chat Script -->

<script>

document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".passwordIcon").forEach(function (toggle) {
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


function adminStarted(){
  // Show the Get Started modal
  document.getElementById("adminStartedModal").classList.add("show");
  document.querySelector(".modal-backdrop").classList.add("show");
}

function closeAdminStartedModal() {
    // Close the Get Started modal
    document.getElementById("adminStartedModal").classList.remove("show");
    document.querySelector(".modal-backdrop").classList.remove("show");
}

function adminLogin(elm){
  var type = $(elm).attr("data-type");
    var txt = $(elm).attr("data-txt");
    var loadingtxt = $(elm).attr("data-loadingtxt");
    
    var email = $("#adm_login_email").val();
    var password = $("#loginpasswordAdm").val();
    var requrl = 'admin/login';
  
    
    if (!isRealValue(email)) {
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
      var msg = 'Please enter the password.';
      showToast(err,msg);
      return false;
    }else{

      var elmId = $(elm).attr("id");
      $(elm).attr("disabled",true);
      var orgTxt = $(elm).attr("data-txt");
      var loadingTxt = $(elm).attr("data-loadingtxt");
      showLoader(elmId,loadingTxt); 

      var postData = {
        "_token":CSRFTOKEN,
        "type":type,
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
            setTimeout(function(){
              
              window.location.href = 'admin/dashboard';
            }, 1000);
          }else{
            err = 1;
          }
          showToast(err,msg);
      });

    }
}

function getStarted() {
    // Show the Get Started modal
    document.getElementById("getStartedModal").classList.add("show");
    document.querySelector(".modal-backdrop").classList.add("show");
}

function closeGetStartedModal() {
    // Close the Get Started modal
    document.getElementById("getStartedModal").classList.remove("show");
    document.querySelector(".modal-backdrop").classList.remove("show");
}

function openAuthModal(role) {
    // Close the Get Started modal
    document.getElementById("getStartedModal").classList.remove("show");
    document.querySelector(".modal-backdrop").classList.remove("show");
    
    // You can implement role-specific logic here (e.g., for employer or candidate)
    if (role === "employer") {
        // Logic for employer
        openEmployerModal();
    } else if (role === "candidate") {
        // Logic for candidate
        openCandidateModal();
    }
}

function openCandidateModal(){
  document.getElementById("candidateModal").classList.add("show");
  document.querySelector(".modal-backdrop").classList.add("show");
}

function openEmployerModal(){
  document.getElementById("employerModal").classList.add("show");
  document.querySelector(".modal-backdrop").classList.add("show");
}

function closecandidateModal(){
  // Close the Get Started modal
  document.getElementById("candidateModal").classList.remove("show");
  document.querySelector(".modal-backdrop").classList.remove("show");
}

function closeemployerModal(){
  // Close the Get Started modal
  document.getElementById("employerModal").classList.remove("show");
  document.querySelector(".modal-backdrop").classList.remove("show");
}

function notHaveAccountCandidate(){
  document.getElementById("candidateLoginSection").classList.add("hide");
  document.getElementById("candidateRegisterSection").classList.remove("hide");
  
}

function haveAnAccountCandidate(){
  document.getElementById("candidateLoginSection").classList.remove("hide");
  document.getElementById("candidateRegisterSection").classList.add("hide");
}

function notHaveAccountEmployer(){
  document.getElementById("employerLoginSection").classList.add("hide");
  document.getElementById("employerRegisterSection").classList.remove("hide");
  
}

function haveAnAccountEmployer(){
  document.getElementById("employerLoginSection").classList.remove("hide");
  document.getElementById("employerRegisterSection").classList.add("hide");
}

function login(elm){
  
    var type = $(elm).attr("data-type");
    var txt = $(elm).attr("data-txt");
    var loadingtxt = $(elm).attr("data-loadingtxt");
    
    if(type == "candidate"){
      var email = $("#can_login_email").val();
      var password = $("#loginpassword").val();
      var requrl = 'candidate/login';
    }
    
    if(type == "employer"){
      var email = $("#emp_login_email").val();
      var password = $("#loginpasswordEmp").val();
      var requrl = 'recruiter/login';
    }
  
    
    if (!isRealValue(email)) {
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
      var msg = 'Please enter the password.';
      showToast(err,msg);
      return false;
    }else{

      var elmId = $(elm).attr("id");
      $(elm).attr("disabled",true);
      var orgTxt = $(elm).attr("data-txt");
      var loadingTxt = $(elm).attr("data-loadingtxt");
      showLoader(elmId,loadingTxt); 

      var postData = {
        "_token":CSRFTOKEN,
        "type":type,
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
            setTimeout(function(){
              
              if(type == "candidate"){
                window.location.href = 'candidate/dashboard';
              }
              
              if(type == "employer"){
                window.location.href = 'recruiter/dashboard';
              }
              
            }, 1000);
          }else{
            err = 1;
          }
          showToast(err,msg);
      });

    }

}
                  
function register(elm){

    var type = $(elm).attr("data-type");
    var txt = $(elm).attr("data-txt");
    var loadingtxt = $(elm).attr("data-loadingtxt");

    if(type == "candidate"){
      var fname = $("#can_fname").val();
      var lname = $("#can_lname").val();
      var email = $("#can_reg_email").val();
      var password = $("#regpassword").val();
      var confirmPassword = $("#confirmpassword").val();
      var agreeTerm = $("#agree_term").is(":checked");
      var requrl = 'candidate/register';
    }
    
    if(type == "employer"){
      var fname = $("#emp_fname").val();
      var lname = $("#emp_lname").val();
      var email = $("#emp_reg_email").val();
      var password = $("#regpasswordEmp").val();
      var confirmPassword = $("#confirmpasswordEmp").val();
      var agreeTerm = $("#emp_agree_term").is(":checked");
      var requrl = 'recruiter/register';
    }
    
    var fnameObj = validateName(fname);
    var lnameObj = validateName(lname);
    var psswdValidObj = validatePassword(password);
    var cpsswdValidObj =validatePassword(confirmPassword);
    
    var psswdErr = psswdValidObj.err;
    var psswdMsg = psswdValidObj.msg;
    var cpsswdErr = cpsswdValidObj.err;
    var cpsswdMsg = cpsswdValidObj.msg;
    
    if (!isRealValue(fname)) {
      var err = 1;
      var msg = 'Please enter your first name.';
      showToast(err,msg);
      return false;
    } else if (isRealValue(fname) && fnameObj.err == 1) {
      var err = 1;
      var msg = fnameObj.msg;
      showToast(err,msg);
      return false;
    } else if (!isRealValue(lname)) {
      var err = 1;
      var msg = 'Please enter your last name.';
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
    } else if (!agreeTerm) {
      // Validate Terms of Service Checkbox
      var err = 1;
      var msg = 'You must agree to the Terms of Service.';
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
        "type":type,
        "fname":fname,
        "lname":lname,
        "email":email,
        "password":password,
        "re_password":confirmPassword,
        "agree_term":agreeTerm
      };
      
      callajax(requrl, postData, function(resp){
          
          $(elm).removeAttr("disabled");
          hideLoader(elmId,orgTxt);
          var err = 0;
          var msg = resp.M;
          if(resp.C == 100){
            err = 0;
            
            setTimeout(function(){
              
              if(type == "candidate"){
                haveAnAccountCandidate();
              }
              
              if(type == "employer"){
                haveAnAccountEmployer();
              }
              
            }, 1000);
          }else{
            err = 1;
          }
          showToast(err,msg);
      });
      
    }

}

function openforgotpasswordModal(){
  closecandidateModal();
  closeemployerModal();
  
  document.getElementById("forgotpasswordModal").classList.add("show");
  document.querySelector(".modal-backdrop").classList.add("show");
}

function closeforgotpasswordModal(){
  // Close the Forgot Password modal
  document.getElementById("forgotpasswordModal").classList.remove("show");
  document.querySelector(".modal-backdrop").classList.remove("show");
}

function forgotpassword(elm){
  var type = $(elm).attr("data-type");
  var txt = $(elm).attr("data-txt");
  var loadingtxt = $(elm).attr("data-loadingtxt");
  var requrl = 'forgotpassword';
  var email = $("#user_email").val();

  if (!isRealValue(email)) {
    var err = 1;
    var msg = 'Please enter your email.';
    showToast(err,msg);
    return false;
  } else if (isRealValue(email) && !validateEmail(email)) {
    var err = 1;
    var msg = 'Please enter a valid email.';
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
      "email":email
    };
    
    callajax(requrl, postData, function(resp){
        
        
        $(elm).removeAttr("disabled");
        hideLoader(elmId,orgTxt);
        var err = 0;
        var msg = resp.M;

        if(resp.C == 100){
          err = 0;
          
        }else{
          err = 1;
        }
        showToast(err,msg);
        
    });
  }

}
</script>



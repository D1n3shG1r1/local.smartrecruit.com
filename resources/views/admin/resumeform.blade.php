@extends("app")
@section("contentbox")
@php

  $resumeDataId = $cvdata->id;
  $candidateId = $cvdata->candidateId;
  $profSummaryArr = $cvdata->profSummary;
  $workExperienceArr = $cvdata->workExperience;
  $skillsArr = $cvdata->skills;
  $languagesArr = $cvdata->languages;
  $degreeArr = $cvdata->degree;
  $certificationsArr = $cvdata->certifications;
  $videolink = $cvdata->videolink;
  $skillsOptions = config('custom.skills');

@endphp            

<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Create Resume</h2>
            </div>
        </div>
        </div>


        <!-- row -->
        <div class="row column1">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                    <h2>Skills & Academic Information</h2>
                    </div>

                    @if($basicProfile->verified == 0)

                      <button id="viewResumeBtn" type="button" class="viewResumeBtn btn cur-p btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to verify the candidate and send them the video interview link." onclick="markVerify()">Verify Candidate</button>

                    @else
                    
                    <button id="viewResumeBtn" type="button" class="viewResumeBtn btn cur-p btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Candidate is already verified." disabled><i class="bi bi-check2-all"></i>&nbsp; Verified</button>

                    <button id="viewResumeBtn" type="button" class="viewResumeBtn btn cur-p btn-outline-primary mx-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to resend the video interview link." onclick="resendVideoLink()">Resend Video Link</button>
                    
                      @endif

                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">

                    <!-- form new -->
                    <div class="container mt-5">
                      <form id="multiStepForm" method="post" action="{{url('candidate/updateresume')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="row justify-content-center">
                          <div class="col-lg-10">

                            <!-- Step Indicators (optional visual) -->
                            <ul class="formbold-steps nav nav-pillsd mb-4 justify-content-center gap-2">
                              <li class="formbold-step-menu1d actived nav-item"><span class="badge rounded-circle recruit_blue step-indicator">1</span>Basic Information</li>
                              <li class="formbold-step-menu2d nav-item"><span class="badge rounded-circle bg-light text-dark step-indicator">2</span>Professional Summary</li>
                              <li class="formbold-step-menu3d nav-item"><span class="badge rounded-circle bg-light text-dark step-indicator">3</span>Academic Summary</li>
                            </ul>
                            
                            <!-- ✅ Step 1 -->
                            <div class="step step-1">
                              <div class="row mb-3">
                                <div class="col-md-6">
                                  <label class="form-label">Full Name<span class="required">*</span></label>
                                  <input type="text" class="form-control" name="fullname" id="fullname" value="{{$basicProfile->fname}} {{$basicProfile->lname}}" readonly/>
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label">Gender<span class="required">*</span></label>
                                  <select id="gender" name="gender" class="form-control" readonly>
                                    <option value="0"></option>  
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Other</option>
                                  </select>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <div class="col-md-6">
                                  <label class="form-label">Email Address<span class="required">*</span></label>
                                  <input type="email" class="form-control" name="email" id="email" value="{{$basicProfile->email}}" readonly/>
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label">Phone Number<span class="required">*</span></label>
                                  <input type="tel" class="form-control" name="phone" id="phone" value="{{$basicProfile->phone}}" readonly/>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <div class="col-md-6">
                                  <label class="form-label">Address Line 1<span class="required">*</span></label>
                                  <input type="text" class="form-control" name="address1" id="address1" value="{{$basicProfile->address_1}}" readonly/>
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label">Address Line 2</label>
                                  <input type="text=" class="form-control" name="address2" id="address2" value="{{$basicProfile->address_2}}" readonly/>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <div class="col-md-6">
                                  <label class="form-label">City<span class="required">*</span></label>
                                  <input type="text=" class="form-control" name="city" id="city" value="{{$basicProfile->city}}" readonly/>
                                </div>  
                                <div class="col-md-6">
                                  <label class="form-label">Country<span class="required">*</span></label>
                                  <input type="text" class="form-control" name="country" id="country" value="{{$basicProfile->country}}" readonly/>
                                </div>
                                
                              </div>

                              <div class="row mb-3">
                                <div class="col-md-6">
                                  <label class="form-label"><a href="{{url('admin/candidate/'.$candidateId)}}"><strong>Click here</strong></a> to update your basic information.</label>
                                </div>
                              </div>
                            </div>

                            <!-- ✅ Step 2 -->
                            <div class="step step-2 d-none">
                              <div class="row mb-3">
                                <div class="col-md-12">    
                                  <label class="form-label">Professional Summary</label>
                                  <textarea class="form-control" rows="3" id="professionalsummary" name="professionalsummary">{{$profSummaryArr}}</textarea>
                                </div>
                              </div>
                              <div class="row mt-3">
                                <div class="col-md-12">  
                                  <label class="form-label fw-bold">Work Experience</label>
                                  <div id="workExperienceRows"></div>
                                  <button type="button" id="addMoreBtn" class="btn btn-outline-primary" onclick="addWorkExpRow(-1)"><i class="fa fa-plus"></i>Add More</button>
                                </div>
                              </div>
                            </div>

                            <!-- ✅ Step 3 -->
                            <div class="step step-3 d-none">
                               
                            <div class="row mx-0 mb-3">
                            
                              <label class="form-label fw-bold">Skills & Language</label>
                              <div class="skillLanguageRows">
                                <div class="border p-3 mb-3 rounded skillLangugeRow">
                                  <div class="row">
                                    <div class="col-md-6" id="skillsContainer">
                                      <label class="form-label">Select Core Skills</label>

                                      <select id="skills" name="skills" class="form-control" multiple>
                                          @foreach($skillsOptions as $optGrpKey => $optGrp)
                                              <optgroup label="{{$optGrpKey}}">
                                                  @foreach($optGrp as $opt)
                                                  <option value="{{$opt}}">{{$opt}}</option>
                                                  @endforeach        
                                              </optgroup>
                                          @endforeach
                                      </select>
                                      <input type="hidden" class="form-control" name="customskill" id="customskill" />
                                    </div>

                                    <div class="col-md-6">
                                      <label class="form-label">Choose Language<span class="required">*</span></label>
                                      <select id="languageSelect" name="languageSelect" class="form-control" onchange="handleLanguageChange()">
                                        <option value="">-- Select Language --</option>
                                        <option value="English">English</option>
                                        <option value="Spanish">Spanish</option>
                                        <option value="French">French</option>
                                        <option value="German">German</option>
                                        <option value="Chinese">Chinese</option>
                                        <option value="Japanese">Japanese</option>
                                        <option value="Arabic">Arabic</option>
                                        <option value="Hindi">Hindi</option>
                                        <option value="Portuguese">Portuguese</option>
                                        <option value="Russian">Russian</option>
                                      </select>
                                      <div id="selectedLanguages" style="margin-top: 20px;"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                              <div class="row mx-0 mt-3">
                                <label class="form-label fw-bold">Education Background</label>
                                <div id="educationRows"></div>
                                <button type="button" id="addMoreEduBtn" class="btn btn-outline-primary" onclick="addEduRow(-1)"><i class="fa fa-plus"></i>Add More</button>
                              </div>
                              
                              <div class="row mx-0 mt-3">
                                <label class="form-label fw-bold">Certifications</label>
                                <div id="certificationRows"></div>
                                <button type="button" id="addMoreCertfBtn" class="btn btn-outline-primary" onclick="addCertfRow(-1)"><i class="fa fa-plus"></i>Add More</button>
                              </div>


                            <!--- video section -->
                            <div class="row mx-0 mt-3">
                                <label class="form-label fw-bold">Video Interview</label>
                                <div id="videoInterviewRows" style="float: left; width: 100%;">
                                  <div id="videoInterviewRow-1" class="border p-3 mb-3 rounded videoInterviewRow">
                                    <div class="row">
                                      <div class="col-md-12 mb-3">
                                        <label class="form-label">Add Video Interview Link</label>
                                        
                                        <input type="text" class="form-control" name="videolink" placeholder="Add Video Interview Link" value="{{$videolink}}" onblur="convertVideoLink(event)" 
                                        onpaste="convertVideoLink(event)"/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          <!--- video section -->

                            </div>

                            
                            <input type="hidden" name="candidateId" id="candidateId" value="{{$candidateId}}"/>

                            <!-- ✅ Navigation Buttons -->
                            <div class="d-flex-dk justify-content-between-dk mt-4">
                              <button type="button" id="backBtn" class="backBtn btn btn-outline-secondary d-none">Back</button>
                              <button type="button" id="nextBtn" class="nextBtn btn btn-primary" data-txt="Next" data-loadingtxt="Next...">Next</button>
                              <button type="button" id="submitBtn" class="submitBtn btn btn-success d-none" data-txt="Save" data-loadingtxt="Submit..." onclick="submitForm(this);">Submit</button>
                            </div>
                            
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- / form new -->

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


<div class="modal fade" id="verifyModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 style="font-weight:normal;" class="modal-title">Send Video Interview Link</h4>
              <button type="button" class="close" data-dismiss="modal" onclick="closeVerifyModal();">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <p>Please enter the candidate's video interview link below. This link will be sent to the candidate upon verification.</p>
              <input type="text" class="form-control" id="interviewLinkInput" placeholder="Enter video interview link here..." value="{{config('custom.videoInterviewLink')}}"/>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal" onclick="closeVerifyModal();">Cancel</button>
                <button type="button" id="sendVideoLinkBtn" data-txt="Send Link & Verify" data-loadingtxt="Sending..." class="btn btn-primary " data-dismiss="modal" onclick="sendVideoLink(this);">Send Link & Verify</button>
            </div>
        </div>
    </div>
</div>

<style>
  .formbold-main-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }

  .formbold-form-wrapper {
    margin: 0 auto;
    /*max-width: 550px;*/
    width: 100%;
    background: white;
  }

  .formbold-steps {
    padding-bottom: 18px;
    margin-bottom: 35px;
    border-bottom: 1px solid #DDE3EC;
  }
  .formbold-steps ul {
    padding: 0;
    margin: 0;
    list-style: none;
    display: flex;
    gap: 40px;
  }
  .formbold-steps li {
    display: flex;
    align-items: center;
    gap: 3px;
    font-weight: 500;
    font-size: 16px;
    line-height: 24px;
    color: #536387;
    padding: 0px 5px 0px 5px;
  }
  .formbold-steps li span {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #DDE3EC;
    border-radius: 50%;
    width: 36px;
    height: 36px;
    font-weight: 500;
    font-size: 16px;
    line-height: 24px;
    color: #536387;
  }
  .formbold-steps li.active {
    color: #07074D;;
  }
  .formbold-steps li.active span {
    background: #6A64F1;
    color: #FFFFFF;
  }

  .formbold-input-flex {
    display: flex;
    gap: 20px;
    margin-bottom: 22px;
  }
  .formbold-input-flex > div {
    width: 50%;
  }
  .formbold-form-input {
    width: 100%;
    padding: 13px 22px;
    border-radius: 5px;
    border: 1px solid #DDE3EC;
    background: #FFFFFF;
    font-weight: 500;
    font-size: 16px;
    color: #536387;
    outline: none;
    resize: none;
  }
  .formbold-form-input:focus {
    border-color: #6a64f1;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
  .formbold-form-label {
    color: #07074D;
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
    display: block;
    margin-bottom: 10px;
  }

  .formbold-form-confirm {
    border-bottom: 1px solid #DDE3EC;
    padding-bottom: 35px;
  }
  .formbold-form-confirm p {
    font-size: 16px;
    line-height: 24px;
    color: #536387;
    margin-bottom: 22px;
    width: 75%;
  }
  .formbold-form-confirm > div {
    display: flex;
    gap: 15px;
  }

  .formbold-confirm-btn {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #FFFFFF;
    border: 0.5px solid #DDE3EC;
    border-radius: 5px;
    font-size: 16px;
    line-height: 24px;
    color: #536387;
    cursor: pointer;
    padding: 10px 20px;
    transition: all .3s ease-in-out;
  }
  .formbold-confirm-btn {
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.12);
  }
  .formbold-confirm-btn.active {
    background: #6A64F1;
    color: #FFFFFF;
  }

  .formbold-form-step-1,
  .formbold-form-step-2,
  .formbold-form-step-3,
  .formbold-form-step-4,
  .formbold-form-step-5 {
    display: none;
  }
  .formbold-form-step-1.active,
  .formbold-form-step-2.active,
  .formbold-form-step-3.active,
  .formbold-form-step-4.active,
  .formbold-form-step-5.active {
    display: block;
  }

  .formbold-form-btn-wrapper {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 25px;
    margin-top: 25px;
  }
  .formbold-back-btn {
    cursor: pointer;
    background: #FFFFFF;
    border: none;
    color: #07074D;
    font-weight: 500;
    font-size: 16px;
    line-height: 24px;
    display: none;
  }
  .formbold-back-btn.active {
    display: block;
  }
  
  .formbold-btn:hover {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }


  .workExperienceTitle{
    padding-top: 10px;
    padding-bottom: 0px;
  }

  .workExperienceRows{
    padding-left: 10px;
  }

  .workExperienceRow{
    margin-bottom: 25px;
    border-bottom: 0.1rem solid #cecece;
    padding-bottom: 25px;
  }

  .addMoreBtn, .addMoreBtn:hover{
    background-color: #fff !important;
    color: #007bff !important;
  }

  .addMoreBtn i{
    color: #007bff !important;
  }

  .language-label {
    /*font-weight: bold;*/
    margin-right: 10px;
  }

  .remove-btn {
    margin-left: 10px;
    background-color: red;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
  }
  
  .proficiency-input {
    width: 60px;
  }

  .iconButton {
    border: none;
    padding: 0;
    background: none;
    cursor: pointer;
    position: absolute;
    right: 30px;
    z-index: 1;
  }

  .iconButton i.danger{
    color:#bd2130;
  }

  .btn i{
    color:inherit;
  }

  textarea{
    resize: none;
  }

  .selection{
    width: 100%;
  }

  .select2-container--default.select2-container--focus .select2-selection--multiple {
    border: solid #ced4da 1px !important;
    outline: 0;
  }

  .skillLanguageRows{
    width: 100%;
  }

  .backBtn{
    float: left;
  }
  
  .nextBtn, .submitBtn, .viewResumeBtn{
    float: right;
  }


</style>
@endsection
@push("js")
<script>
  
  const resumeDataId = '<?php echo $resumeDataId; ?>';
  const candidateId = '<?php echo $candidateId; ?>';
  const profSummaryArr = '<?php echo $profSummaryArr; ?>';
  const workExperienceArr = JSON.parse('<?php echo $workExperienceArr; ?>');
  const skillsArr = JSON.parse('<?php echo $skillsArr; ?>');
  const languagesArr = JSON.parse('<?php echo $languagesArr; ?>');
  const degreeArr = JSON.parse('<?php echo $degreeArr; ?>');
  const certificationsArr = JSON.parse('<?php echo $certificationsArr; ?>');
  
  let workExperienceIndex = 1;
  let educationIndex = 1;
  let CertificationIndex = 1;

  let currentStep = 1;
  const totalSteps = 3;

  const steps = document.querySelectorAll('.step');
  const indicators = document.querySelectorAll('.step-indicator');

  const backBtn = document.getElementById('backBtn');
  const nextBtn = document.getElementById('nextBtn');
  const submitBtn = document.getElementById('submitBtn');

  var setSelectedSkills = [];
  $(document).ready(function() {
    
    $("#gender").val("{{$basicProfile->gender}}");

    $('#skills').select2({
      placeholder: "Select skills",
      allowClear: true,
      multiple: true,
      width: '100%',
      dropdownParent: $('#skillsContainer'),
      tokenSeparators: [','],
    });
    $('#skills').val(skillsArr).trigger('change'); // Set the preselected values
    setSelectedSkills = skillsArr;
    $('#skills').on('change', function () {
        const selectedValues = $(this).val();
        setSelectedSkills = selectedValues;
    });

    //add previous values
    
    if(workExperienceArr.length > 0){
      //work experience row
      $.each(workExperienceArr, function(i, v){
        
        var tmp_jobtitle = v.jobtitle;
        var tmp_companyname = v.companyname;
        var tmp_startdate = v.startdate;
        var tmp_enddate = v.enddate;
        var tmp_responsibilities = v.responsibilities;
        var tmp_achievements = v.achievements;
        
        const workExperienceValues = {
          "jobtitle" : tmp_jobtitle,
          "companyname" : tmp_companyname,
          "startdate" : tmp_startdate,
          "enddate": tmp_enddate,
          "responsibilities" : tmp_responsibilities,
          "achievements":tmp_achievements
        };
        
        workExperienceIndex++;
        addWorkExpRow(workExperienceIndex, workExperienceValues);
      });

    }else{
      // Add initial row
      const workExperienceValues = {
        "jobtitle":"",
        "companyname":"",
        "startdate":"",
        "enddate":"",
        "responsibilities":"",
        "achievements":""
      };

      addWorkExpRow(workExperienceIndex, workExperienceValues);
    }


    if(degreeArr.length > 0){
      //degree row
      $.each(degreeArr, function(i, v){
        
        var tmp_degree = v.degree;
        var tmp_schoolinstitution = v.schoolinstitution;
        var tmp_startdate = v.startdate;
        var tmp_enddate = v.enddate;
        var tmp_fieldofstudy = v.fieldofstudy;
        
        const educationValues = {
          "degree":tmp_degree,
          "schoolinstitution":tmp_schoolinstitution,
          "startdate":tmp_startdate,
          "enddate":tmp_enddate,
          "fieldofstudy":tmp_fieldofstudy,
        };
        
        educationIndex++;
        addEduRow(educationIndex, educationValues);
      });

    }else{
      // Add initial row
      const educationValues = {
        "degree":"",
        "schoolinstitution":"",
        "startdate":"",
        "enddate":"",
        "fieldofstudy":"",
      };

      addEduRow(educationIndex, educationValues);
    }

    if(certificationsArr.length > 0){
      //certificate row
      $.each(certificationsArr, function(i, v){
        
        var tmp_title = v.title;
        var tmp_organization = v.organization;
        var tmp_date = v.date;
        
        const certificationValues = {
          "title":tmp_title,
          "organization":tmp_organization,
          "date":tmp_date
        };
        
        CertificationIndex++;
        addCertfRow(CertificationIndex, certificationValues);
      });

    }else{
      // Add initial row
      const certificationValues = {
        "title":"",
        "organization":"",
        "date":""
      };

      addCertfRow(CertificationIndex, certificationValues);
    }

    
    if(languagesArr.length > 0){
      //language row
      $.each(languagesArr, function(i, v){
        var tmp_language = v.language;
        $("#languageSelect").val(tmp_language).trigger('change');
      });
    }else{

    }
  });


  function updateStepDisplay() {
    steps.forEach((step, index) => {
      step.classList.toggle('d-none', index !== currentStep - 1);
    });

    indicators.forEach((ind, index) => {
      var prevStep = currentStep - 1;
      
      ind.classList.remove('recruit_blue', 'text-white');
      ind.classList.add('bg-light', 'text-dark');
      ind.parentElement.classList.remove('active');
      if (index === prevStep) {

        ind.parentElement.classList.add('active');
        ind.classList.add('recruit_blue', 'text-white');
        ind.classList.remove('bg-light', 'text-dark');  
      }

    });

    backBtn.classList.toggle('d-none', currentStep === 1);
    nextBtn.classList.toggle('d-none', currentStep === totalSteps);
    submitBtn.classList.toggle('d-none', currentStep !== totalSteps);
  }

  nextBtn.addEventListener('click', () => {
    if (currentStep < totalSteps) {
      if (validateForm()) {
        currentStep++;
        updateStepDisplay();
      }
    }
  });

  backBtn.addEventListener('click', () => {
    if (currentStep > 1) {
      currentStep--;
      updateStepDisplay();
    }
  });

  // Initialize
  updateStepDisplay();

  //Work Experience Logic
  
  function createWorkExperienceRow(index, dataValues) {
    
    var deleteButton = '';
    if(index > 1){
      deleteButton = `<button type="button" class="cur-p iconButton deleteRowBtn" onclick="deleteWorkExpRow(`+index+`)"><i class="danger fa fa-trash-o"></i></button>`;
    }

    return `
      <div id="workExperienceRow-`+index+`" class="border p-3 mb-3 rounded workExperienceRow">`+deleteButton+`<div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Job Title</label>
            <input type="text" class="form-control" name="jobtitle[]" value="`+dataValues.jobtitle+`">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Company Name</label>
            <input type="text" class="form-control" name="jobcompany[]" value="`+dataValues.companyname+`">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" class="form-control" name="jobstartdate[]" value="`+dataValues.startdate+`">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">End Date</label>
            <input type="date" class="form-control" name="jobenddate[]" value="`+dataValues.enddate+`">
          </div>
          <div class="col-6 mb-3">
            <label class="form-label">Responsibilities</label>
            <textarea class="form-control" rows="3" name="jobresponsibilities[]">`+dataValues.responsibilities+`</textarea>
          </div>
          <div class="col-6 mb-3">
            <label class="form-label">Achievements (optional)</label>
            <textarea type="text" rows="3" class="form-control" name="jobachievements[]">`+dataValues.achievements+`</textarea>
          </div>
        </div>
      </div>
    `;
  }

  function addWorkExpRow(index, dataValues){
    if(parseInt(index) < 0){
      var index = workExperienceIndex;
      index++;
    }

    if(!isRealValue(dataValues)){
      var dataValues = {
        "jobtitle":"",
        "companyname":"",
        "startdate":"",
        "enddate":"",
        "responsibilities":"",
        "achievements":""
      };
    }
    if(index == 0){
      // Add initial row
      document.getElementById('workExperienceRows').innerHTML = createWorkExperienceRow(index,dataValues);
    }else{
      //Add further rows
      document.getElementById('workExperienceRows')
      .insertAdjacentHTML('beforeend', createWorkExperienceRow(index,dataValues));
    }
  }

  function deleteWorkExpRow(index){
    document.getElementById("workExperienceRow-"+index).remove();
  }

  
  //Education Rows Logic
  function createEducationRow(index, dataValues) {
    var deleteButton = '';
    if(index > 1){
      deleteButton = `<button type="button" class="cur-p iconButton deleteEduRowBtn" onclick="deleteEduRow(`+index+`)"><i class="danger fa fa-trash-o"></i></button>`;
    }
    
    return `
      <div id="educationRow-`+index+`" class="border p-3 mb-3 rounded educationRow">`+deleteButton +`<div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Degree/Certificate</label>
            <input type="text" class="form-control" name="degree-certificate[]" value=`+dataValues.degree+`>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">School/Institution</label>
            <input type="text" class="form-control" name="school-institution[]" value="`+dataValues.schoolinstitution+`">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" class="form-control" name="edustartdate[]" value="`+dataValues.startdate+`">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">End Date</label>
            <input type="date" class="form-control" name="eduenddate[]" value="`+dataValues.enddate+`">
          </div>
          <div class="col-12 mb-3">
            <label class="form-label">Field of Study</label>
            <input type="text" class="form-control" name="field-of-study[]" value="`+dataValues.fieldofstudy+`">
          </div>
        </div>
      </div>
    `;
  }

  function addEduRow(index, dataValues){

    if(parseInt(index) < 0){
      var index = educationIndex;
      index++;
    }

    if(!isRealValue(dataValues)){
      var dataValues = {
        "degree":"",
        "schoolinstitution":"",
        "startdate":"",
        "enddate":"",
        "fieldofstudy":"",
      };
    }

    if(index == 0){
      // Add initial row
      document.getElementById('educationRows').innerHTML = createEducationRow(index,dataValues);
    }else{
      //Add further rows
      document.getElementById('educationRows')
      .insertAdjacentHTML('beforeend', createEducationRow(index,dataValues));
    }

  }
  
  function deleteEduRow(index){
    document.getElementById("educationRow-"+index).remove();
  }
 
  //Certification Rows Logic
  function createCertificationRow(index, dataValues) {
    var deleteButton = '';
    if(index > 1){
      deleteButton = `<button type="button" class="cur-p iconButton deleteCertfRowBtn" onclick="deleteCertfRow(`+index+`)"><i class="danger fa fa-trash-o"></i></button>`;
    }
    
    return `
      <div id="certificationRow-`+index+`" class="border p-3 mb-3 rounded certificationRow">`+deleteButton+`<div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="certification-title[]" value="`+dataValues.title+`">
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">organization</label>
            <input type="text" class="form-control" name="certification-organization[]" value="`+dataValues.organization+`">
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Date</label>
            <input type="date" class="form-control" name="certification-date[]" value="`+dataValues.date+`">
          </div>
        </div>
      </div>
    `;
  }
  
  function addCertfRow(index, dataValues){
    if(parseInt(index) < 0){
      var index = educationIndex;
      index++;
    }

    if(!isRealValue(dataValues)){
      var dataValues = {
        "title":"",
        "organization":"",
        "date":""
      };
    }

    if(index == 0){
      // Add initial row
      document.getElementById('certificationRows').innerHTML = createCertificationRow(index,dataValues);
      
    }else{
      //Add further rows
      document.getElementById('certificationRows')
      .insertAdjacentHTML('beforeend', createCertificationRow(index,dataValues));
    }
  }

  function deleteCertfRow(index){
    document.getElementById("certificationRow-"+index).remove();
  }

  
  //Select Language logic
  const languageSelect = document.getElementById('languageSelect');
  const selectedLanguagesDiv = document.getElementById('selectedLanguages');
    
  function createProficiencyInput(lang) {
    var profVal = 1;
    //selectedLanguage
    if(languagesArr.length > 0){
    
      $.each(languagesArr, function(i, v){
        var tmp_language = v.language;
        var tmp_proficiency = v.proficiency;
        if(tmp_language.toLowerCase() == lang.toLowerCase()){
          profVal = tmp_proficiency;
        }
      });
    
    }

    const input = document.createElement('select');
    input.name = 'languageProficiency[]';
    input.className = 'proficiency-input form-control col-md-4xx';
    input.style.setProperty("width", "auto");
    input.innerHTML = `<option value="0">--Select Proficiency--</option><option value="1">Beginner</option><option value="2">Intermediate</option><option value="3">Advanced</option>`;
    input.value = profVal;
    return input;
    
    /*const input = document.createElement('input');
    input.type = 'number';
    input.name = 'languageProficiency[]';
    input.min = 1;
    input.max = 10;
    input.value = profVal;
    input.className = 'proficiency-input form-control col-md-4';
    return input;*/
  }

    function restoreLanguageToDropdown(language) {
      const option = document.createElement('option');
      option.value = language;
      option.textContent = language;
      languageSelect.appendChild(option);

      // Sort dropdown options alphabetically
      const options = Array.from(languageSelect.options).slice(1);
      options.sort((a, b) => a.text.localeCompare(b.text));
      options.unshift(languageSelect.options[0]); // add back the placeholder
      languageSelect.innerHTML = '';
      options.forEach(opt => languageSelect.appendChild(opt));
    }

    function handleLanguageChange() {
      const selectedLanguage = $('#languageSelect').val();
      if (!selectedLanguage) return;

      const row = $('<div>', { class: 'row mb-2' });

      const label = $('<span>', { 
          class: 'language-label col-md-3',
          text: selectedLanguage
      });

      const input = $('<input>', {
          type: 'hidden',
          name: 'language[]',
          value: selectedLanguage
      });

      const proficiencyInput = createProficiencyInput(selectedLanguage); // Assuming this function is defined elsewhere

      const removeBtn = $('<button>', {
          class: 'cur-p iconButton ml-3',
          html: '<i class="danger fa fa-trash-o"></i>',
          click: function() {
              row.remove();
              restoreLanguageToDropdown(selectedLanguage); // Assuming this function is defined elsewhere
          }
      });

      row.append(label, input, proficiencyInput, removeBtn);

      // Make sure selectedLanguagesDiv is selected as a jQuery object
      const selectedLanguagesDiv = $('#selectedLanguages'); // Assuming this is the ID of the container div
      selectedLanguagesDiv.append(row); // Append row properly

      // Remove the selected language from the dropdown
      $('#languageSelect option[value="' + selectedLanguage + '"]').remove();
      
      // Clear the select box value
      $('#languageSelect').val('');
    }


    //validate form
    // Function to validate step 1 fields
    function validateStep1() {
      const fullname = document.getElementById("fullname").value;
      const gender = document.getElementById("gender").value; 
      const email = document.getElementById("email").value;
      const phone = document.getElementById("phone").value;
      const address1 = document.getElementById("address1").value;
      const city = document.getElementById("city").value;
      const country = document.getElementById("country").value;
      
      if(!isRealValue(fullname)) {
        var err = 1;
        var msg = "Full Name is required.";
        showToast(err,msg);
        return false; 
      }else if(!isRealValue(gender) || parseInt(gender) == 0){
        var err = 1;
        var msg = "Gender is required.";
        showToast(err,msg);
        return false;
      }else if(!isRealValue(email)){
        var err = 1;
        var msg = "Email is required.";
        showToast(err,msg);
        return false;
      }else if(!isRealValue(phone)){
        var err = 1;
        var msg = "Phone is required.";
        showToast(err,msg);
        return false;
      }else if(!isRealValue(address1)){
        var err = 1;
        var msg = "Address Line 1 is required.";
        showToast(err,msg);
        return false;
      }else if(!isRealValue(city)){
        var err = 1;
        var msg = "City is required.";
        showToast(err,msg);
        return false;
      }else if(!isRealValue(country)){
        var err = 1;
        var msg = "Country is required.";
        showToast(err,msg);
        return false;
      }else{
        return true;
      }

      /*if (!fullname || !email || !phone || !gender) {
        alert("Please fill in all required fields in Step 1.");
        return false;
      }
      
      // Simple email validation
      const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      if (!emailRegex.test(email)) {
        alert("Please enter a valid email.");
        return false;
      }
      
      // Simple phone number validation (basic)
      const phoneRegex = /^\d{10}$/;
      if (!phoneRegex.test(phone)) {
        alert("Please enter a valid phone number.");
        return false;
      }
      
      return true;*/
    }

    // Function to validate step 2 fields
    function validateStep2() {

      const professionalsummary = document.getElementById("professionalsummary").value;
      
      if(!isRealValue(professionalsummary)) {
        var err = 1;
        var msg = "Professional summary is required.";
        showToast(err,msg);
        return false; 
      }

      // Check work experience fields (at least one row should have data)
      const workExperienceRows = document.querySelectorAll(".workExperienceRow");
      let validWorkExp = false;
      workExperienceRows.forEach(row => {
        const jobtitle = row.querySelector("input[name='jobtitle[]']").value;
        const jobcompany = row.querySelector("input[name='jobcompany[]']").value;
        const jobstartdate = row.querySelector("input[name='jobstartdate[]']").value;
        const jobenddate = row.querySelector("input[name='jobenddate[]']").value;

        if (jobtitle && jobcompany && jobstartdate && jobenddate) {
          validWorkExp = true;
        }
      });
      
      if (!validWorkExp) {
        var err = 1;
        var msg = "Please provide at least one work experience.";
        showToast(err,msg);
        return false; 
      }
      
     
      
      var requrl = "admin/updatecandidateresume";
      var postdata = {
        "formData" : $("#multiStepForm").serialize(),
        "skills":setSelectedSkills
      };
      
      callajax(requrl, postdata, function(resp){});  

      return true;

    }

    // Function to validate step 3 fields
    function validateStep3() {
      const skills = document.getElementById("skills").value;
      const languageSelect = document.getElementById("languageSelect").value;
      
      if(setSelectedSkills.length == 0){
        var err = 1;
        var msg = "Please select at least one skill.";
        showToast(err,msg);
        return false;
      }

      const languageLabel = document.querySelectorAll(".language-label");
      if(languageLabel.length == 0){
        var err = 1;
        var msg = "Please select at least one language.";
        showToast(err,msg);
        return false;
      }


      // Validate proficiency inputs
      const proficiencyInputs = document.querySelectorAll(".proficiency-input");
      let validProficiency = true;
      proficiencyInputs.forEach(input => {
        const proficiency = input.value;
        if (!proficiency || proficiency < 1 || proficiency > 10) {
          validProficiency = false;
        }
      });
      
      if (!validProficiency) {
        var err = 1;
        var msg = "Please select a proficiency for each language.";
        showToast(err,msg);
        return false;
      }
      
      // Check education fields (at least one row should have data)
      const educationRows = document.querySelectorAll(".educationRow");
      let validEducationRow = false;
      educationRows.forEach(row => {
        const certificate = row.querySelector("input[name='degree-certificate[]']").value;
        const institution = row.querySelector("input[name='school-institution[]']").value;
        const edustartdate = row.querySelector("input[name='edustartdate[]']").value;
        const jobenddate = row.querySelector("input[name='eduenddate[]']").value;
        const fieldOfStudy = row.querySelector("input[name='field-of-study[]']").value;
        
        if (certificate && institution && edustartdate && jobenddate && fieldOfStudy) {
          validEducationRow = true;
        }
      });
      
      if (!validEducationRow) {
        var err = 1;
        var msg = "Please provide at least one education.";
        showToast(err,msg);
        return false; 
      }


      // Check certification fields (at least one row should have data)
      const certificationRows = document.querySelectorAll(".certificationRow");
      let validCertificationRow = false;
      certificationRows.forEach(row => {
        const certificationTitle = row.querySelector("input[name='certification-title[]']").value;
        const certificationOrganization = row.querySelector("input[name='certification-organization[]']").value;
        const certificationDate = row.querySelector("input[name='certification-date[]']").value;
        
        if (certificationTitle && certificationOrganization && certificationDate) {
          validCertificationRow = true;
        }
      });
      
      if (!validCertificationRow) {
        var err = 1;
        var msg = "Please provide at least one Certification.";
        showToast(err,msg);
        return false; 
      }

      return true;
    }

    // Function to validate the entire form before submission
    function validateForm() {
      if (currentStep === 1 && !validateStep1()) return false;
      if (currentStep === 2 && !validateStep2()) return false;
      if (currentStep === 3 && !validateStep3()) return false;
      return true;
    }

    function submitForm(elm){

      if (!validateForm()) return;

      var elmId = $(elm).attr("id");
      $(elm).attr("disabled",true);
      
      var orgTxt = $(elm).attr("data-txt");
      var loadingTxt = $(elm).attr("data-loadingtxt");
      
      showLoader(elmId,loadingTxt);

      var requrl = "admin/updatecandidateresume";
      
      var postdata = {
        "formData" : $("#multiStepForm").serialize(),
        "skills":setSelectedSkills
      };
      
      callajax(requrl, postdata, function(resp){
          $(elm).removeAttr("disabled");
          hideLoader(elmId,orgTxt);
          
          var err = 1;
          if(resp.C == 100){
              err = 0;
          }
          
          var msg = resp.M;
          showToast(err,msg);
          
      });   
    }

  var resendLink = 0;  
  function resendVideoLink(){
    resendLink = 1;  
    markVerify();
  }

  function markVerify(){
    // Show the Get Started modal
    document.getElementById("verifyModal").classList.add("show");
    document.querySelector(".modal-backdrop").classList.add("show");    
    // mark candidate as verified and send video-interview email

    if(resendLink > 0){
      var btnText = 'Send Link';
    }else{
      var btnText = 'Send Link & Verify';
    }

    document.getElementById("sendVideoLinkBtn").innerText = btnText;

  }

  
  function sendVideoLink(elm){
      var resumeDataId = "{{$resumeDataId}}";
      var candidateId = "{{$candidateId}}";
      var interviewLinkInput = $("#interviewLinkInput").val();

      if(!isRealValue(interviewLinkInput)) {
          var err = 1;
          var msg = "video interview link is required.";
          showToast(err,msg);
          return false; 
      }

      var elmId = $(elm).attr("id");
      $(elm).attr("disabled",true);
      
      var orgTxt = $(elm).attr("data-txt");
      var loadingTxt = $(elm).attr("data-loadingtxt");
      
      showLoader(elmId,loadingTxt);

      var requrl = "admin/sendlinkandverify";
      var postdata = {
        "resumeId": resumeDataId,
        "candidateId": candidateId,
        "interviewLinkInput": interviewLinkInput,
        "resendLink":resendLink
      };
        
      callajax(requrl, postdata, function(resp){
        
        $(elm).removeAttr("disabled");
        hideLoader(elmId,orgTxt);

        var err = 0;
        if(resp.C == 100){
          err = 0;
          closeVerifyModal();
        }else{
          err = 1;
        }
          
        var msg = resp.M;
        showToast(err,msg);

      });
  }

  function closeVerifyModal() {
    // Close the Get Started modal
    document.getElementById("verifyModal").classList.remove("show");
    document.querySelector(".modal-backdrop").classList.remove("show");
  }

  function convertVideoLink(event) {
    let inputValue = event.target.value;

    // Regular expression to capture the videoId from the original URL
    const regex = /https:\/\/api\.cliptakes\.com\/share\/smartrecruit\/([a-f0-9\-]{36})/;
    const match = inputValue.match(regex);

    // Ensure we found the videoId
    if (match) {
      
      var inputValueParts = inputValue.split("/");
      const videoId = inputValueParts[inputValueParts.length - 1];

      // Construct the new URL with the extracted videoId
      const newUrl = `https://files.cliptakes.com/smartrecruit/${videoId}.mp4`;

      // Log the new URL to verify it's being correctly constructed
      console.log('New Video URL:', newUrl);

      // Set the input value to the new URL
      event.target.value = newUrl;
    } else {
      console.error("No valid video ID found in the input URL");
    }
   
  }
</script>
@endpush
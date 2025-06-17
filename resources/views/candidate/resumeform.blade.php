@extends("app")
@section("contentbox")
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>My Resume</h2>
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
                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">

                    <!-- form new -->
                    <div class="container mt-5">
                      <form id="multiStepForm">
                        <div class="row justify-content-center">
                          <div class="col-lg-10">

                            <!-- Step Indicators (optional visual) -->
                            <ul class="formbold-steps nav nav-pills mb-4 justify-content-center gap-2">
                              <li class="formbold-step-menu1d actived nav-item"><span class="badge rounded-circle bg-primary step-indicator">1</span>Basic Information</li>
                              <li class="formbold-step-menu2d nav-item"><span class="badge rounded-circle bg-light text-dark step-indicator">2</span>Professional Summary</li>
                              <li class="formbold-step-menu3d nav-item"><span class="badge rounded-circle bg-light text-dark step-indicator">3</span>Academic Summary</li>
                              <li class="formbold-step-menu4d nav-item"><span class="badge rounded-circle bg-light text-dark step-indicator">4</span>Other Details</li>
                              <li class="formbold-step-menu5d nav-item"><span class="badge rounded-circle bg-light text-dark step-indicator">5</span>Uploads</li>
                            </ul>

                            <!-- ✅ Step 1 -->
                            <div class="step step-1">
                              <div class="row mb-3">
                                <div class="col-md-6">
                                  <label class="form-label">Full Name</label>
                                  <input type="text" class="form-control" name="fullname" id="fullname" />
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label">Gender</label>
                                  <select id="gender" class="form-control">
                                    <option value="0"></option>  
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Other</option>
                                  </select>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <div class="col-md-6">
                                  <label class="form-label">Email Address</label>
                                  <input type="email" class="form-control" name="email" id="email"/>
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label">Phone Number</label>
                                  <input type="tel" class="form-control" name="phone" id="phone"/>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <div class="col-md-6">
                                  <label class="form-label">Address Line 1</label>
                                  <input type="text" class="form-control" name="address1" id="address1"/>
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label">Address Line 2</label>
                                  <input type="text=" class="form-control" name="address2" id="address2"/>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <div class="col-md-6">
                                  <label class="form-label">State</label>
                                  <input type="text" class="form-control" name="state" id="state" />
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label">City</label>
                                  <input type="text=" class="form-control" name="city" id="city" />
                                </div>
                              </div>
                            </div>

                            <!-- ✅ Step 2 -->
                            <div class="step step-2 d-none">
                              <div class="mb-3">
                                <label class="form-label">Professional Summary</label>
                                <textarea class="form-control" rows="3" name="summary"></textarea>
                              </div>
                              <div class="mt-3">
                                <label class="form-label fw-bold">Work Experience</label>
                                <div id="workExperienceRows"></div>
                                <button type="button" id="addMoreBtn" class="btn btn-outline-primary mt-3"><i class="fa fa-plus"></i>Add More</button>
                              </div>
                            </div>

                            <!-- ✅ Step 3 -->
                            <div class="step step-3 d-none">
                              <div class="row mb-3">
                                <div class="col-md-6">
                                  <label class="form-label">Select Core Skills</label>
                                  <select id="skills" class="form-control" multiple>
                                      <optgroup label="Administrative & Office Skills">
                                          <option value="Office Administration">Office Administration</option>
                                          <option value="Data Entry">Data Entry</option>
                                          <option value="Calendar Management">Calendar Management</option>
                                          <option value="Customer Service">Customer Service</option>
                                          <option value="Receptionist Duties">Receptionist Duties</option>
                                      </optgroup>
                                      <optgroup label="Business & Management">
                                          <option value="Project Management">Project Management</option>
                                          <option value="Operations Management">Operations Management</option>
                                          <option value="Business Development">Business Development</option>
                                          <option value="Strategic Planning">Strategic Planning</option>
                                          <option value="Procurement Management">Procurement Management</option>
                                      </optgroup>
                                      <optgroup label="Sales & Marketing">
                                          <option value="Sales Strategy">Sales Strategy</option>
                                          <option value="Digital Marketing">Digital Marketing</option>
                                          <option value="SEO/SEM">SEO/SEM</option>
                                          <option value="Social Media Management">Social Media Management</option>
                                          <option value="Content Writing">Content Writing</option>
                                          <option value="Telemarketing">Telemarketing</option>
                                          <option value="Advertising">Advertising</option>
                                      </optgroup>
                                      <optgroup label="IT & Technology">
                                          <option value="Web Development">Web Development</option>
                                          <option value="Mobile App Development">Mobile App Development</option>
                                          <option value="Database Management">Database Management</option>
                                          <option value="IT Support">IT Support</option>
                                          <option value="Cybersecurity">Cybersecurity</option>
                                          <option value="Cloud Computing">Cloud Computing</option>
                                          <option value="UI/UX Design">UI/UX Design</option>
                                          <option value="Graphic Design">Graphic Design</option>
                                          <option value="Software Development">Software Development</option>
                                          <option value="Networking & Infrastructure">Networking & Infrastructure</option>
                                      </optgroup>
                                      <optgroup label="Finance & Accounting">
                                          <option value="Bookkeeping">Bookkeeping</option>
                                          <option value="Financial Analysis">Financial Analysis</option>
                                          <option value="Payroll Management">Payroll Management</option>
                                          <option value="Auditing">Auditing</option>
                                          <option value="Tax Preparation">Tax Preparation</option>
                                          <option value="Budget Management">Budget Management</option>
                                      </optgroup>
                                      <optgroup label="Engineering & Technical Skills (Expanded)">
                                          <option value="Civil Engineering">Civil Engineering</option>
                                          <option value="Mechanical Engineering">Mechanical Engineering</option>
                                          <option value="Electrical Engineering">Electrical Engineering</option>
                                          <option value="Structural Engineering">Structural Engineering</option>
                                          <option value="Petroleum Engineering">Petroleum Engineering</option>
                                          <option value="Chemical Engineering">Chemical Engineering</option>
                                          <option value="Process Engineering">Process Engineering</option>
                                          <option value="Pipeline Engineering">Pipeline Engineering</option>
                                          <option value="Instrumentation and Control Engineering">Instrumentation and Control Engineering</option>
                                          <option value="Drilling Engineering">Drilling Engineering</option>
                                          <option value="Subsea Engineering">Subsea Engineering</option>
                                          <option value="Reservoir Engineering">Reservoir Engineering</option>
                                          <option value="Production Engineering">Production Engineering</option>
                                          <option value="Facilities Engineering">Facilities Engineering</option>
                                          <option value="Health, Safety, and Environment (HSE Management)">Health, Safety, and Environment (HSE Management)</option>
                                          <option value="Maintenance Engineering (Oil & Gas Facilities)">Maintenance Engineering (Oil & Gas Facilities)</option>
                                          <option value="Project Engineering">Project Engineering</option>
                                          <option value="Offshore Operations Engineering">Offshore Operations Engineering</option>
                                          <option value="Rig Operations and Maintenance">Rig Operations and Maintenance</option>
                                          <option value="CAD Design (AutoCAD, SolidWorks, etc.)">CAD Design (AutoCAD, SolidWorks, etc.)</option>
                                          <option value="Quality Assurance/Quality Control (QA/QC)">Quality Assurance/Quality Control (QA/QC)</option>
                                          <option value="Welding and Fabrication Engineering">Welding and Fabrication Engineering</option>
                                          <option value="Corrosion Engineering">Corrosion Engineering</option>
                                          <option value="Environmental Engineering">Environmental Engineering</option>
                                          <option value="Marine Engineering (for offshore oil operations)">Marine Engineering (for offshore oil operations)</option>
                                          <option value="Rotating Equipment Engineering">Rotating Equipment Engineering</option>
                                          <option value="Piping Engineering">Piping Engineering</option>
                                          <option value="Materials Engineering">Materials Engineering</option>
                                          <option value="Energy Management">Energy Management</option>
                                      </optgroup>
                                      <optgroup label="Healthcare & Medical">
                                          <option value="Nursing">Nursing</option>
                                          <option value="Medical Laboratory Technology">Medical Laboratory Technology</option>
                                          <option value="Patient Care">Patient Care</option>
                                          <option value="Medical Records Management">Medical Records Management</option>
                                          <option value="Pharmacy Assistance">Pharmacy Assistance</option>
                                      </optgroup>
                                      <optgroup label="Education & Training">
                                          <option value="Teaching">Teaching</option>
                                          <option value="Curriculum Development">Curriculum Development</option>
                                          <option value="Training Facilitation">Training Facilitation</option>
                                          <option value="Educational Consulting">Educational Consulting</option>
                                      </optgroup>
                                      <optgroup label="Legal">
                                          <option value="Legal Research">Legal Research</option>
                                          <option value="Contract Drafting">Contract Drafting</option>
                                          <option value="Corporate Law">Corporate Law</option>
                                          <option value="Paralegal Services">Paralegal Services</option>
                                      </optgroup>
                                      <optgroup label="Creative & Media">
                                          <option value="Photography">Photography</option>
                                          <option value="Videography">Videography</option>
                                          <option value="Content Creation">Content Creation</option>
                                          <option value="Animation">Animation</option>
                                          <option value="Creative Writing">Creative Writing</option>
                                          <option value="Copywriting">Copywriting</option>
                                          <option value="Branding">Branding</option>
                                      </optgroup>
                                      <optgroup label="Human Resources">
                                          <option value="Recruitment">Recruitment</option>
                                          <option value="HR Administration">HR Administration</option>
                                          <option value="Payroll Administration">Payroll Administration</option>
                                          <option value="Employee Relations">Employee Relations</option>
                                          <option value="Talent Management">Talent Management</option>
                                      </optgroup>
                                      <optgroup label="Hospitality & Tourism">
                                          <option value="Hotel Management">Hotel Management</option>
                                          <option value="Food and Beverage Service">Food and Beverage Service</option>
                                          <option value="Tour Guiding">Tour Guiding</option>
                                          <option value="Event Planning">Event Planning</option>
                                      </optgroup>
                                      <optgroup label="Construction & Real Estate">
                                          <option value="Construction Management">Construction Management</option>
                                          <option value="Quantity Surveying">Quantity Surveying</option>
                                          <option value="Real Estate Sales">Real Estate Sales</option>
                                          <option value="Property Management">Property Management</option>
                                      </optgroup>
                                      <optgroup label="Logistics & Supply Chain">
                                          <option value="Logistics Coordination">Logistics Coordination</option>
                                          <option value="Warehouse Management">Warehouse Management</option>
                                          <option value="Procurement">Procurement</option>
                                          <option value="Fleet Management">Fleet Management</option>
                                      </optgroup>
                                      <optgroup label="Other Skills">
                                          <option value="Negotiation">Negotiation</option>
                                          <option value="Time Management">Time Management</option>
                                          <option value="Leadership">Leadership</option>
                                          <option value="Teamwork">Teamwork</option>
                                          <option value="Problem Solving">Problem Solving</option>
                                          <option value="Communication Skills">Communication Skills</option>
                                          <option value="Critical Thinking">Critical Thinking</option>
                                      </optgroup>
                                  </select>
                                  <input type="hidden" class="form-control" name="customskill" id="customskill" />
                                </div>

                                <div class="col-md-6">
                                  <label class="form-label">Choose Language </label>
                                  <div id="selectedLanguages" style="margin-top: 20px;"></div>
                                  <select id="languageSelect" class="form-control">
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
                                </div>
                                
                              </div>  
                              
                              <div class="row mt-3">
                                <label class="form-label fw-bold">Education Background</label>
                                <div id="educationRows"></div>
                                <button type="button" id="addMoreEduBtn" class="btn btn-outline-primary mt-3"><i class="fa fa-plus"></i>Add More</button>
                              </div>

                              <div class="row mt-3">
                                <label class="form-label fw-bold">Certifications</label>
                                <div id="certificationRows"></div>
                                <button type="button" id="addMoreCertfBtn" class="btn btn-outline-primary mt-3"><i class="fa fa-plus"></i>Add More</button>
                              </div>
                            
                            </div>

                            <!-- ✅ Step 4 -->
                            <div class="step step-4 d-none">
                              <p>Step 4: Other Details (content here...)</p>
                            </div>

                            <!-- ✅ Step 5 -->
                            <div class="step step-5 d-none">
                              <p>Step 5: Uploads & Final Confirmation (content here...)</p>
                            </div>

                            <!-- ✅ Navigation Buttons -->
                            <div class="d-flex justify-content-between mt-4">
                              <button type="button" id="backBtn" class="btn btn-outline-secondary d-none">Back</button>
                              <button type="button" id="nextBtn" class="btn btn-primary">Next Step</button>
                              <button type="button" id="submitBtn" class="btn btn-success d-none">Submit</button>
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

<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: "Inter", sans-serif;
  }
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
    gap: 14px;
    font-weight: 500;
    font-size: 16px;
    line-height: 24px;
    color: #536387;
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
  .formbold-btn {
    /*display: flex;
    align-items: center;
    gap: 5px;
    font-size: 16px;
    border-radius: 5px;
    padding: 10px 25px;
    border: none;
    font-weight: 500;
    background-color: #6A64F1;
    color: white;
    cursor: pointer;*/
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
    font-weight: bold;
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

  .iconButton{
    border: none;
    padding: 0;
    background: none;
    cursor:pointer;
  }

  .iconButton i.danger{
    color:#bd2130;
  }

  .btn i{
    color:inherit;
  }
</style>
@endsection
@push("js")
<script>
  
  let currentStep = 1;
  const totalSteps = 5;

  const steps = document.querySelectorAll('.step');
  const indicators = document.querySelectorAll('.step-indicator');

  const backBtn = document.getElementById('backBtn');
  const nextBtn = document.getElementById('nextBtn');
  const submitBtn = document.getElementById('submitBtn');

  function updateStepDisplay() {
    steps.forEach((step, index) => {
      step.classList.toggle('d-none', index !== currentStep - 1);
    });

    indicators.forEach((ind, index) => {
      ind.classList.remove('bg-primary', 'text-white');
      if (index === currentStep - 1) {
        ind.classList.add('bg-primary', 'text-white');
      } else {
        //ind.classList.add('bg-light', 'text-dark');
      }
    });

    backBtn.classList.toggle('d-none', currentStep === 1);
    nextBtn.classList.toggle('d-none', currentStep === totalSteps);
    submitBtn.classList.toggle('d-none', currentStep !== totalSteps);
  }

  nextBtn.addEventListener('click', () => {
    if (currentStep < totalSteps) {
      currentStep++;
      updateStepDisplay();
    }
  });

  backBtn.addEventListener('click', () => {
    if (currentStep > 1) {
      currentStep--;
      updateStepDisplay();
    }
  });

  submitBtn.addEventListener('click', () => {
    alert('Form submitted successfully!');
    // Optionally: document.getElementById('multiStepForm').submit();
  });

  // Initialize
  updateStepDisplay();

  // ✅ Work Experience Logic
  let workExperienceIndex = 1;

  function createWorkExperienceRow(index) {
    return `
      <div class="border p-3 mb-3 rounded workExperienceRow">
        <button type="button" class="cur-p iconButton deleteRowBtn"><i class="danger fa fa-trash-o"></i></button>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Job Title</label>
            <input type="text" class="form-control" name="jobtitle-${index}">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Company Name</label>
            <input type="text" class="form-control" name="company-${index}">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" class="form-control" name="startdate-${index}">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">End Date</label>
            <input type="date" class="form-control" name="enddate-${index}">
          </div>
          <div class="col-12 mb-3">
            <label class="form-label">Responsibilities</label>
            <input type="text" class="form-control" name="responsibilities-${index}">
          </div>
          <div class="col-12 mb-3">
            <label class="form-label">Achievements (optional)</label>
            <input type="text" class="form-control" name="achievements-${index}">
          </div>
        </div>
      </div>
    `;
  }

  document.getElementById('addMoreBtn').addEventListener('click', () => {
    workExperienceIndex++;
    document.getElementById('workExperienceRows')
      .insertAdjacentHTML('beforeend', createWorkExperienceRow(workExperienceIndex));
  });

  document.getElementById('workExperienceRows').addEventListener('click', (e) => {
    if (e.target.classList.contains('deleteRowBtn')) {
      e.target.closest('.workExperienceRow').remove();
    }
  });

  // Add initial row
  document.getElementById('workExperienceRows').innerHTML = createWorkExperienceRow(workExperienceIndex);


  //Education Rows Logic
  let educationIndex = 1;

  function createEducationRow(index) {
    return `
      <div class="border p-3 mb-3 rounded educationRow">
        <button type="button" class="cur-p iconButton deleteEduRowBtn"><i class="danger fa fa-trash-o"></i></button>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Degree/Certificate</label>
            <input type="text" class="form-control" name="degree-certificate-${index}">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">School/Institution</label>
            <input type="text" class="form-control" name="school-institution-${index}">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" class="form-control" name="edustartdate-${index}">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">End Date</label>
            <input type="date" class="form-control" name="eduenddate-${index}">
          </div>
          <div class="col-12 mb-3">
            <label class="form-label">Field of Study</label>
            <input type="text" class="form-control" name="field-of-study-${index}">
          </div>
        </div>
      </div>
    `;
  }

  
  document.getElementById('addMoreEduBtn').addEventListener('click', () => {
    educationIndex++;
    document.getElementById('educationRows')
      .insertAdjacentHTML('beforeend', createEducationRow(educationIndex));
  });

  document.getElementById('educationRows').addEventListener('click', (e) => {
    if (e.target.classList.contains('deleteEduRowBtn')) {
      e.target.closest('.educationRow').remove();
    }
  });

  // Add initial row
  document.getElementById('educationRows').innerHTML = createEducationRow(educationIndex);


  //Certification Rows Logic
  let CertificationIndex = 1;

  function createCertificationRow(index) {
    return `
      <div class="border p-3 mb-3 rounded certificationRow">
        <button type="button" class="cur-p iconButton deleteCertfRowBtn"><i class="danger fa fa-trash-o"></i></button>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="certification-title-${index}">
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">organization</label>
            <input type="text" class="form-control" name="certification-organization-${index}">
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Date</label>
            <input type="date" class="form-control" name="certification-date-${index}">
          </div>
        </div>
      </div>
    `;
  }

  
  document.getElementById('addMoreCertfBtn').addEventListener('click', () => {
    CertificationIndex++;
    document.getElementById('certificationRows')
      .insertAdjacentHTML('beforeend', createCertificationRow(CertificationIndex));
  });

  document.getElementById('certificationRows').addEventListener('click', (e) => {
    if (e.target.classList.contains('deleteCertfRowBtn')) {
      e.target.closest('.certificationRow').remove();
    }
  });

  // Add initial row
  document.getElementById('certificationRows').innerHTML = createCertificationRow(CertificationIndex);


  //Select Language logic
  const languageSelect = document.getElementById('languageSelect');
    const selectedLanguagesDiv = document.getElementById('selectedLanguages');

    function createProficiencyInput() {
      const input = document.createElement('input');
      input.type = 'number';
      input.min = 1;
      input.max = 10;
      input.value = 1;
      input.className = 'proficiency-input form-control';
      return input;
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

    languageSelect.addEventListener('change', function () {
      const selectedLanguage = this.value;
      if (!selectedLanguage) return;

      const row = document.createElement('div');
      row.className = 'row';

      const label = document.createElement('span');
      label.className = 'language-label';
      label.textContent = selectedLanguage;

      const proficiencyInput = createProficiencyInput();

      const removeBtn = document.createElement('button');
      removeBtn.className = 'cur-p iconButton ml-3';
      removeBtn.innerHTML = '<i class="danger fa fa-trash-o"></i>';
      removeBtn.onclick = () => {
        selectedLanguagesDiv.removeChild(row);
        restoreLanguageToDropdown(selectedLanguage);
      };

      row.appendChild(label);
      row.appendChild(proficiencyInput);
      row.appendChild(removeBtn);
      selectedLanguagesDiv.appendChild(row);

      this.querySelector(`option[value="${selectedLanguage}"]`).remove();
      this.value = '';
    });
</script>
@endpush
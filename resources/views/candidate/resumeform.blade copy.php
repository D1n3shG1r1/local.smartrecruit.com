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
                    <!-- form -->
                    <div class="col-md-12 formbold-main-wrapper">
                        <div class="formbold-form-wrapper">
                            <form action="https://formbold.com/s/FORM_ID" method="POST">
                                <div class="formbold-steps">
                                    <ul>
                                        <li class="formbold-step-menu1 active">
                                            <span>1</span>
                                            Basic Information
                                        </li>
                                        <li class="formbold-step-menu2">
                                            <span>2</span>
                                            Professional Summary
                                        </li>
                                        <li class="formbold-step-menu3">
                                            <span>3</span>
                                            Academic Summary
                                        </li>
                                        <li class="formbold-step-menu4">
                                            <span>4</span>
                                            Other Details
                                        </li>
                                        <li class="formbold-step-menu5">
                                            <span>5</span>
                                            Uploads
                                        </li>
                                    </ul>
                                </div>

                                <div class="formbold-form-step-1 active">
                                  <div class="formbold-input-flex">
                                      <div>
                                          <label for="firstname" class="formbold-form-labeld form-label"> First name </label>
                                          <input
                                          type="text"
                                          name="firstname"
                                          placeholder="Andrio"
                                          id="firstname"
                                          class="formbold-form-inputd form-input"
                                          />
                                      </div>
                                      <div>
                                          <label for="lastname" class="formbold-form-labeld form-label"> Last name </label>
                                          <input
                                          type="text"
                                          name="lastname"
                                          placeholder="Dolee"
                                          id="lastname"
                                          class="formbold-form-inputd form-input"
                                          />
                                      </div>
                                  </div>
                                  
                                  <div class="formbold-input-flex">
                                      <div>
                                          <label for="email" class="formbold-form-labeld form-label"> Email Address </label>
                                          <input
                                          type="email"
                                          name="email"
                                          placeholder="example@mail.com"
                                          id="email"
                                          class="formbold-form-inputd form-input"
                                          />
                                      </div>

                                      <div>
                                          <label for="phone" class="formbold-form-labeld form-label"> Phone Number </label>
                                          <input
                                          type="tel"
                                          name="phone"
                                          placeholder="Phone number"
                                          id="phone"
                                          class="formbold-form-inputd form-input"
                                          />
                                      </div>
                                  </div>
                          
                                  <div class="formbold-input-flex">
                                    <div>
                                        <label for="dob" class="formbold-form-labeld form-label"> Date of Birth </label>
                                        <input 
                                        type="date" 
                                        name="dob" 
                                        id="dob" 
                                        class="formbold-form-inputd form-input"
                                        />
                                    </div>

                                    <div>
                                        <label for="gender" class="formbold-form-labeld form-label"> Gender </label>
                                        <select id="gender" class="form-input">
                                          <option value="1">Male</option>
                                          <option value="2">Female</option>
                                          <option value="3">Other</option>
                                        </select>
                                    </div>
                                  </div>

                                  <div class="formbold-input-flex">
                                    <div>
                                        <label for="address1" class="formbold-form-labeld form-label"> Address Line 1 </label>
                                        <input
                                        type="text"
                                        name="address1"
                                        id="address1"
                                        placeholder="Flat 4, 24 Castle Street, Perth, PH1 3JY"
                                        class="formbold-form-inputd form-input"
                                        />
                                    </div>

                                    <div>
                                        <label for="address2" class="formbold-form-labeld form-label"> Address Line 2 </label>
                                        <input
                                        type="text"
                                        name="address2"
                                        id="address2"
                                        placeholder="Flat 4, 24 Castle Street, Perth, PH1 3JY"
                                        class="formbold-form-inputd form-input"
                                        />
                                    </div>
                                  </div>


                                  <div class="formbold-input-flex">
                                    <div>
                                        <label for="city" class="formbold-form-labeld form-label"> City </label>
                                        <input
                                        type="text"
                                        name="city"
                                        id="city"
                                        placeholder="Flat 4, 24 Castle Street, Perth, PH1 3JY"
                                        class="formbold-form-inputd form-input"
                                        />
                                    </div>

                                    <div>
                                        <label for="state" class="formbold-form-labeld form-label"> State </label>
                                        <input
                                        type="text"
                                        name="state"
                                        id="state"
                                        placeholder="Flat 4, 24 Castle Street, Perth, PH1 3JY"
                                        class="formbold-form-inputd form-input"
                                        />
                                    </div>
                                  </div>

                                </div>

                                <div class="formbold-form-step-2">
                                  <div>
                                    <!--
                                      step2

                                      Write a short professional summary (optional)

                                      Work Experience
                                      • Add Job Title
                                      • Company Name
                                      • Start Date – End Date
                                      • Responsibilities
                                      • Achievements (optional)
                                      
                                      (Allow user to "Add another experience" button if they have more than one.)
                                    -->
                                      
                                        <div>
                                            <label for="professionalSummary" class="formbold-form-labeld form-label"> Write a short professional summary (optional) </label>
                                            <textarea
                                            type="text"
                                            name="city"
                                            id="city"
                                            placeholder="Professional summary"
                                            class="formbold-form-inputd form-input"
                                            ></textarea>
                                        </div>
                                      
                                      
                                        
                                      
                                        <!-- Work Experience Section -->
<div class="container mt-4">
  <div class="workExperienceTitle mb-3">
    <label class="formbold-form-labeld form-label">Work Experience</label>
  </div>

  <!-- Work Experience Rows Container -->
  <div id="workExperienceRows" class="workExperienceRows"></div>

  <!-- Add More Button -->
  <button id="addMoreBtn" class="btn btn-outline-success mt-3">Add More</button>
</div>

                                  </div>
                                  
                                </div>

                                <div class="formbold-form-step-3">
                                  <div>
                                      step3

                                      Education Background
                                        • Degree/Certificate
                                        • School/Institution
                                        • Start Date – End Date
                                        • Field of Study
                                    (Allow user to "Add another education" button.)
                                    (Button: "Next")

                                    Skills, Certifications & Languages
                                        • Select Core Skills (multi-select dropdown + option to add custom skill)
                                        • Certifications (Add certification title, organization, date)
                                        • Languages (Choose language + proficiency level)
                                    (Button: "Next")
                                  </div>
                                </div>

                                <div class="formbold-form-step-4">
                                  <div>
                                      step4 other details

                                      • Availability (Ready to start? Yes/No)
                                      • Current Employment Status
                                      • Preferred Industry
                                      • Salary Expectation (₦)
                                      • Willing to relocate? (Yes/No) (Optional)
                                      • Career Goals (Optional)
                                  </div>
                                </div>

                                <div class="formbold-form-step-5">
                                <div class="formbold-form-confirm">
                                    <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                                    </p>

                                    <div>
                                    <button class="formbold-confirm-btn active">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="11" cy="11" r="10.5" fill="white" stroke="#DDE3EC"/>
                                        <g clip-path="url(#clip0_1667_1314)">
                                        <path d="M9.83343 12.8509L15.1954 7.48828L16.0208 8.31311L9.83343 14.5005L6.12109 10.7882L6.94593 9.96336L9.83343 12.8509Z" fill="#536387"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_1667_1314">
                                        <rect width="14" height="14" fill="white" transform="translate(4 4)"/>
                                        </clipPath>
                                        </defs>
                                        </svg>
                                        Yes! I want it.
                                    </button>

                                    <button class="formbold-confirm-btn">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="11" cy="11" r="10.5" fill="white" stroke="#DDE3EC"/>
                                        <g clip-path="url(#clip0_1667_1314)">
                                        <path d="M9.83343 12.8509L15.1954 7.48828L16.0208 8.31311L9.83343 14.5005L6.12109 10.7882L6.94593 9.96336L9.83343 12.8509Z" fill="#536387"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_1667_1314">
                                        <rect width="14" height="14" fill="white" transform="translate(4 4)"/>
                                        </clipPath>
                                        </defs>
                                        </svg>
                                        No! I don’t want it.
                                    </button>
                                    </div>
                                </div>
                                </div>

                                <div class="formbold-form-btn-wrapper">
                                <button class="formbold-back-btn btn cur-p btn-outline-primary">Back</button>

                                <button class="formbold-btn btn cur-p btn-primary">
                                    Next Step
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1675_1807)">
                                    <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_1675_1807">
                                    <rect width="16" height="16" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form -->
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

</style>
@endsection
@push("js")
<script>
  const stepMenus = [
    document.querySelector('.formbold-step-menu1'),
    document.querySelector('.formbold-step-menu2'),
    document.querySelector('.formbold-step-menu3'),
    document.querySelector('.formbold-step-menu4'),
    document.querySelector('.formbold-step-menu5')
  ];

  const steps = [
    document.querySelector('.formbold-form-step-1'),
    document.querySelector('.formbold-form-step-2'),
    document.querySelector('.formbold-form-step-3'),
    document.querySelector('.formbold-form-step-4'),
    document.querySelector('.formbold-form-step-5')
  ];

  const formSubmitBtn = document.querySelector('.formbold-btn');
  const formBackBtn = document.querySelector('.formbold-back-btn');

  let currentStep = 0;

  const updateSteps = () => {
    stepMenus.forEach((menu, index) => {
      menu.classList.toggle('active', index === currentStep);
    });
    steps.forEach((step, index) => {
      step.classList.toggle('active', index === currentStep);
    });
    formBackBtn.classList.toggle('active', currentStep > 0);
    formSubmitBtn.textContent = (currentStep === steps.length - 1) ? 'Submit' : 'Next Step';
  };

  formSubmitBtn.addEventListener("click", function (event) {
    event.preventDefault();
    if (currentStep < steps.length - 1) {
      currentStep++;
      updateSteps();
    } else {
      // Optionally submit form or show confirmation
      document.querySelector('form').submit();
    }
  });

  formBackBtn.addEventListener("click", function (event) {
    event.preventDefault();
    if (currentStep > 0) {
      currentStep--;
      updateSteps();
    }
  });

  // Initialize
  updateSteps();

  let workExperienceIndex = 1;

function createWorkExperienceRow(index) {
  return `
    <div class="workExperienceRow border p-3 mb-3 rounded">
      <button type="button" class="btn btn-outline-danger mb-3 deleteRowBtn">Delete Row</button>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="jobtitle-${index}" class="formbold-form-labeld form-label">Job Title</label>
          <input type="text" id="jobtitle-${index}" name="jobtitle-${index}" placeholder="Job title" class="formbold-form-inputd form-control" />
        </div>
        <div class="col-md-6 mb-3">
          <label for="company-${index}" class="formbold-form-labeld form-label">Company Name</label>
          <input type="text" id="company-${index}" name="company-${index}" placeholder="Company name" class="formbold-form-inputd form-control" />
        </div>
        <div class="col-md-6 mb-3">
          <label for="startdate-${index}" class="formbold-form-labeld form-label">Start Date</label>
          <input type="date" id="startdate-${index}" name="startdate-${index}" class="formbold-form-inputd form-control" />
        </div>
        <div class="col-md-6 mb-3">
          <label for="enddate-${index}" class="formbold-form-labeld form-label">End Date</label>
          <input type="date" id="enddate-${index}" name="enddate-${index}" class="formbold-form-inputd form-control" />
        </div>
        <div class="col-12 mb-3">
          <label for="responsibilities-${index}" class="formbold-form-labeld form-label">Responsibilities</label>
          <input type="text" id="responsibilities-${index}" name="responsibilities-${index}" class="formbold-form-inputd form-control" />
        </div>
        <div class="col-12 mb-3">
          <label for="achievements-${index}" class="formbold-form-labeld form-label">Achievements (optional)</label>
          <input type="text" id="achievements-${index}" name="achievements-${index}" class="formbold-form-inputd form-control" />
        </div>
      </div>
    </div>
  `;
}

// Handle Add More
document.getElementById('addMoreBtn').addEventListener('click', function () {
  workExperienceIndex++;
  const container = document.getElementById('workExperienceRows');
  container.insertAdjacentHTML('beforeend', createWorkExperienceRow(workExperienceIndex));
});

// Handle Delete Row using event delegation
document.getElementById('workExperienceRows').addEventListener('click', function (e) {
  if (e.target.classList.contains('deleteRowBtn')) {
    e.target.closest('.workExperienceRow').remove();
  }
});

// Initial row
document.getElementById('workExperienceRows').innerHTML = createWorkExperienceRow(workExperienceIndex);

</script>
@endpush
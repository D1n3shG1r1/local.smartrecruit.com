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
                    <div class="container mt-5">
  <form id="multiStepForm">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        <!-- Step Indicators (optional visual) -->
        <ul class="nav nav-pills mb-4 justify-content-center gap-2">
          <li class="nav-item"><span class="badge rounded-circle bg-primary step-indicator">1</span></li>
          <li class="nav-item"><span class="badge rounded-circle bg-light text-dark step-indicator">2</span></li>
          <li class="nav-item"><span class="badge rounded-circle bg-light text-dark step-indicator">3</span></li>
          <li class="nav-item"><span class="badge rounded-circle bg-light text-dark step-indicator">4</span></li>
          <li class="nav-item"><span class="badge rounded-circle bg-light text-dark step-indicator">5</span></li>
        </ul>

        <!-- ✅ Step 1 -->
        <div class="step step-1">
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">First Name</label>
              <input type="text" class="form-control" name="firstname" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Last Name</label>
              <input type="text" class="form-control" name="lastname" />
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
            <button type="button" id="addMoreBtn" class="btn btn-outline-success mt-3">Add More</button>
          </div>
        </div>

        <!-- ✅ Step 3 -->
        <div class="step step-3 d-none">
          <p>Step 3: Academic Summary (content here...)</p>
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
        ind.classList.add('bg-light', 'text-dark');
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
        <button type="button" class="btn btn-outline-danger mb-3 deleteRowBtn">Delete Row</button>
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
</script>
@endpush
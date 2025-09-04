@extends("app")
@section("contentbox")
@php

  $resumeDataId = $cvdata->id;
  $candidateId = $cvdata->candidateId;
  $profSummaryArr = $cvdata->profSummary;
  $workExperienceArr = json_decode($cvdata->workExperience);
  $skillsArr = json_decode($cvdata->skills);
  $languagesArr = json_decode($cvdata->languages); 
  $degreeArr = json_decode($cvdata->degree);
  $certificationsArr = json_decode($cvdata->certifications);
  
@endphp

<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<style>
    /* Fonts */
:root {
  --default-font: "Roboto",  system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  --heading-font: "Raleway",  sans-serif;
  --nav-font: "Poppins",  sans-serif;
}

/* Global Colors - The following color variables are used throughout the website. Updating them here will change the color scheme of the entire website */
:root { 
  --background-color: #ffffff; /* Background color for the entire website, including individual sections */
  --default-color: #444444; /* Default color used for the majority of the text content across the entire website */
  --heading-color: #222222; /* Color for headings, subheadings and title throughout the website */
  --accent-color: #34b7a7; /* Accent color that represents your brand on the website. It's used for buttons, links, and other elements that need to stand out */
  --surface-color: #ffffff; /* The surface color is used as a background of boxed elements within sections, such as cards, icon boxes, or other elements that require a visual separation from the global background. */
  --contrast-color: #ffffff; /* Contrast color for text, ensuring readability against backgrounds of accent, heading, or default colors. */
}
/* Color Presets - These classes override global colors when applied to any section or element, providing reuse of the sam color scheme. */

.light-background {
  --background-color: #e9e8e6;
  --surface-color: #ffffff;
}

.dark-background {
  --background-color: #060606;
  --default-color: #ffffff;
  --heading-color: #ffffff;
  --surface-color: #252525;
  --contrast-color: #ffffff;
}

/* Smooth scroll */
:root {
  scroll-behavior: smooth;
}

/*--------------------------------------------------------------
# General Styling & Shared Classes
--------------------------------------------------------------*/
/*body {
  color: var(--default-color);
  background-color: var(--background-color);
  font-family: var(--default-font);
}*/

a {
  color: var(--accent-color);
  text-decoration: none;
  transition: 0.3s;
}

a:hover {
  color: color-mix(in srgb, var(--accent-color), transparent 25%);
  text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  color: var(--heading-color);
  font-family: var(--heading-font);
}

    /*--------------------------------------------------------------
# Global Page Titles & Breadcrumbs
--------------------------------------------------------------*/
.page-title {
  color: var(--default-color);
  background-color: var(--background-color);
  padding: 25px 0;
  position: relative;
  border-bottom: 1px solid color-mix(in srgb, var(--default-color), transparent 85%);
}

.page-title h1 {
  font-size: 24px;
  font-weight: 400;
}

.page-title .breadcrumbs ol {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  padding: 0;
  margin: 0;
  font-size: 14px;
  font-weight: 400;
}

.page-title .breadcrumbs ol li+li {
  padding-left: 10px;
}

.page-title .breadcrumbs ol li+li::before {
  content: "/";
  display: inline-block;
  padding-right: 10px;
  color: color-mix(in srgb, var(--default-color), transparent 70%);
}

/*--------------------------------------------------------------
# Global Sections
--------------------------------------------------------------*/
section,
.section {
  color: var(--default-color);
  background-color: var(--background-color);
  padding: 60px 0;
  scroll-margin-top: 100px;
  overflow: clip;
}

@media (max-width: 1199px) {

  section,
  .section {
    scroll-margin-top: 66px;
  }
}

/*--------------------------------------------------------------
# Global Section Titles
--------------------------------------------------------------*/
.section-title {
  text-align: center;
  padding-bottom: 60px;
  position: relative;
}

.section-title h2 {
  font-size: 32px;
  font-weight: 700;
  margin-bottom: 20px;
  padding-bottom: 20px;
  position: relative;
}

.section-title h2:after {
  content: "";
  position: absolute;
  display: block;
  width: 50px;
  height: 3px;
  background: var(--accent-color);
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
}

.section-title p {
  margin-bottom: 0;
}
/*--------------------------------------------------------------
# Resume Section
--------------------------------------------------------------*/
.resume .container {
    width: 100% !important;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.resume .resume-title {
  color: var(--heading-color);
  font-size: 26px;
  font-weight: 700;
  margin-top: 20px;
  margin-bottom: 20px;
}

.resume .resume-item {
  padding: 0 0 20px 20px;
  margin-top: -2px;
  border-left: 2px solid var(--accent-color);
  position: relative;
}

.resume .resume-item h4 {
  line-height: 18px;
  font-size: 18px;
  font-weight: 600;
  text-transform: uppercase;
  color: color-mix(in srgb, var(--default-color), transparent 20%);
  margin-bottom: 10px;
}

.resume .resume-item h5 {
  font-size: 16px;
  padding: 5px 15px;
  display: inline-block;
  font-weight: 600;
  margin-bottom: 10px;
}

.resume .resume-item ul {
  padding-left: 20px;
}

.resume .resume-item ul li {
  padding-bottom: 10px;
}

.resume .resume-item:last-child {
  padding-bottom: 0;
}

.resume .resume-item::before {
  content: "";
  position: absolute;
  width: 16px;
  height: 16px;
  border-radius: 50px;
  left: -9px;
  top: 0;
  background: var(--background-color);
  border: 2px solid var(--accent-color);
}

.photoSection{
  text-align: left;
}

.photoSection img{
    width: 84px;
    border-radius: 50%;
}

.addressSection{
  text-align: right;
}
.addressSection p{
  font-size:12px;
  font-style: italic;
}
</style>


<div class="midde_cont">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <section id="resume" class="resume section">
                    <div class="row container section-title" >
  
                    <div class="col-md-4 photoSection">
                      <img class="img-responsive" src="{{ route('private.image', ['userId' => $basicProfile->id, 'filename' => 'pp-' . $basicProfile->id . '.jpg']) }}" onerror="this.onerror=null; this.src='{{ url('assets/admin/img/user-avatar.png') }}';"
                      alt="{{ucfirst($basicProfile->fname)}} {{ucfirst($basicProfile->lname)}}" />
                    </div>

                    <div class="col-md-4">
                      <h2>Resume</h2>
                      <p>{{ucfirst($basicProfile->fname)}} {{ucfirst($basicProfile->lname)}}</p>
                    </div>
                    
                    <div class="col-md-4 addressSection">
                      <p>{{ucfirst($basicProfile->address_1)}}</p>
                      <p>{{ucfirst($basicProfile->address_2)}}</p>
                      <p>{{ucfirst($basicProfile->city)}}</p>
                      <p>{{ucfirst($basicProfile->country)}}</p>
                    </div>
                        


                    </div>
                   
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                                <h3 class="resume-title">Professional Summary</h3>

                                <div class="resume-item pb-0">
                                    <h4>{{ucfirst($basicProfile->fname)}} {{ucfirst($basicProfile->lname)}}</h4>
                                    <p><em>{{$profSummaryArr}}</em></p>
                                    <!--<ul>
                                    <li>Portland par 127,Orlando, FL</li>
                                    <li>(123) 456-7891</li>
                                    <li>alice.barkley@example.com</li>
                                    </ul>-->
                                </div><!-- Edn Resume Item -->

                                <h3 class="resume-title">Education</h3>
                                @php
                                  foreach($degreeArr as $degreeRw){
                                    $tmp_degree = $degreeRw->degree;
                                    $tmp_schoolinstitution = $degreeRw->schoolinstitution;
                                    $tmp_startdate = $degreeRw->startdate;
                                    $tmp_enddate = $degreeRw->enddate;
                                    $tmp_fieldofstudy = $degreeRw->fieldofstudy;
                                @endphp

                                    <div class="resume-item">
                                      <h4>{{ ucwords($tmp_degree)}}</h4>
                                      <h5>{{date("Y", strtotime($tmp_startdate))}} - {{date("Y", strtotime($tmp_enddate))}}</h5>
                                      <p><em>{{ucwords($tmp_schoolinstitution)}}</em></p>
                                      <p>{{ucwords($tmp_fieldofstudy)}}</p>
                                    </div>

                                @php } @endphp
                                
                                <h3 class="resume-title">Certifications</h3>
                                @php
                                  foreach($certificationsArr as $certificationRw){
                                    $tmp_title = $certificationRw->title;
                                    $tmp_organization = $certificationRw->organization;
                                    $tmp_date = $certificationRw->date;
                                @endphp
                                <div class="resume-item">
                                    <h4>{{ucwords($tmp_title)}}</h4>
                                    <h5>{{date("Y", strtotime($tmp_date))}}</h5>
                                    <p><em>{{ucwords($tmp_organization)}}</em></p>
                                </div>
                                @php } @endphp
                                
                            </div>

                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                <h3 class="resume-title">Work Experience</h3>
                                @php
                                  foreach($workExperienceArr as $workExperienceRw){
                                    $tmp_jobtitle = $workExperienceRw->jobtitle;
                                    $tmp_companyname = $workExperienceRw->companyname;
                                    $tmp_startdate = $workExperienceRw->startdate;
                                    $tmp_enddate = $workExperienceRw->enddate;
                                    $tmp_responsibilities = $workExperienceRw->responsibilities;
                                    $tmp_achievements = $workExperienceRw->achievements;

                                @endphp
                                <div class="resume-item">
                                    <h4>{{ucwords($tmp_jobtitle)}}</h4>
                                    <h5>{{date("Y", strtotime($tmp_startdate))}} - {{date("Y", strtotime($tmp_enddate))}}</h5>
                                    <p><em>{{ucwords($tmp_companyname)}}</em></p>
                                    <ul>
                                      <li>{{ucwords($tmp_responsibilities)}}</li>
                                      <li>{{ucwords($tmp_achievements)}}</li>
                                    </ul>
                                </div>
                                @php } @endphp
                                 
                                <h3 class="resume-title">Skills & Languages known</h3>
                                <div class="resume-item">
                                  <h4>Skills</h4>
                                  <h5></h5>
                                  @php
                                  foreach($skillsArr as $kk => $skillRw){
                                    $tmp_skill = $skillRw;
                                    $comma = '';
                                    if($kk > 0){
                                      $comma = ',';
                                    }
                                  @endphp
                                      <p style="width:fit-content; float:left; margin-bottom:0px">{{$comma}} &nbsp;<em>{{ucwords($tmp_skill)}} </em></p>
                                    
                                  @php
                                  }
                                  @endphp
                                </div>
                                
                                <div class="resume-item">
                                  <h4 style="float:left; width: 100%;">Languages</h4>
                                  <h5></h5>
                                  
                                  @php
                                  foreach($languagesArr as $k => $languageRw){
                                    $tmp_language = $languageRw->language;
                                    $tmp_profeciency = $languageRw->proficiency;
                                    if($tmp_profeciency == 1){
                                      $tmp_profeciency = "Beginner";
                                    }else if($tmp_profeciency == 2){
                                      $tmp_profeciency = "Intermediate";
                                    }else if($tmp_profeciency == 3){
                                      $tmp_profeciency = "Advanced";
                                    }

                                    $comma = '';
                                    if($k > 0){
                                      $comma = ',';
                                    }  
                                  @endphp
                                  <p style="width:fit-content; float:left; margin-bottom:0px;">{{$comma}} &nbsp;<em>{{ucfirst($tmp_language)}} - {{{ucfirst($tmp_profeciency)}}} </em></p>
                                    
                                  @php
                                  }
                                  @endphp
                                     
                                </div>

                                <!--
                                <div class="resume-item">
                                    <h4>Master of Fine Arts &amp; Graphic Design</h4>
                                    <h5>2015 - 2016</h5>
                                    <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                                    <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend</p>
                                </div>
                                -->
                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
@push("js")
<script>
</script>
@endpush
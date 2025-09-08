@extends("app")
@section("contentbox")
@php
  

$degree = json_decode($candidate->degree);
$certifications =  json_decode($candidate->certifications);
$skills = json_decode($candidate->skills);
$languages = json_decode($candidate->languages);
$workExperience = json_decode($candidate->workExperience);
$videolink = $candidate->videolink;
@endphp

<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="https://vjs.zencdn.net/8.23.3/video-js.css" rel="stylesheet" />

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
# About Section
--------------------------------------------------------------*/
.about .content h2 {
  font-weight: 700;
  font-size: 24px;
}

.about .content ul {
  list-style: none;
  padding: 0;
}

.about .content ul li {
  margin-bottom: 20px;
  display: flex;
  align-items: center;
}

.about .content ul strong {
  margin-right: 10px;
}

.about .content ul i {
  font-size: 16px;
  margin-right: 5px;
  color: var(--accent-color);
  line-height: 0;
}

/*--------------------------------------------------------------
# Skills Section
--------------------------------------------------------------*/
.skills .progress {
  height: 60px;
  display: block;
  background: none;
  border-radius: 0;
}

.skills .progress .skill {
  color: var(--heading-color);
  padding: 0;
  margin: 0 0 6px 0;
  text-transform: uppercase;
  display: block;
  font-weight: 600;
  font-family: var(--heading-font);
}

.skills .progress .skill .val {
  float: right;
  font-style: normal;
}

.skills .progress-bar-wrap {
  background: color-mix(in srgb, var(--default-color), transparent 90%);
  height: 10px;
}

.skills .progress-bar {
  width: 1px;
  height: 10px;
  transition: 0.9s;
  background-color: var(--accent-color);
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

.bookmarkBtn i.bi.bi-bookmark-star{
  color: inherit;
}

.video-interview-btn{
  position: absolute;
  right: 30px;
  top: 15px;
  padding-left: 20px !important;
  padding-right: 20px !important;
  font-size: 14px;
  line-height: 0.5;
  padding-top: 10px !important;
  padding-bottom: 10px !important;
}
</style>


<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="row page_title">
                    <div class="col-md-6">        
                        <h2>Candidate</h2>
                    </div>
                    <div class="col-md-6 text-right">        
                    <button style="padding-left: 20px; padding-right: 20px;" class="btn btn-outline-primary bookmarkBtn" type="button" id="bookmarkbtn-{{$candidate->candidateId}}" data-id="{{$candidate->candidateId}}" data-shortlist="{{$candidate->shortlist}}" onclick="bookmark(this)"><i class="bi bi-bookmark-star"></i>@if($candidate->shortlist > 0) Unbookmark @else Bookmark @endif</button>

                    @if($candidate->purchased <= 0)
                    <button class="btn btn-outline-primary" type="button" id="buybtn-{{$candidate->candidateId}}" data-id="{{$candidate->candidateId}}" onclick="buycandidate(this)" data-txt="Purchase candidate" data-loadingtxt="Purchase candidate...">Purchase candidate</button>
                    @endif

                    </div>
                </div>
            </div>
        </div>


        <div class="row column1">
            <div class="col-md-12">
                <!-- About Section -->
                 
                <!-- video button -->
                @if(!empty($candidate->videolink))
                <button class="btn btn-danger video-interview-btn video-popup video-interview-popup flex items-center gap-4 rounded-md bg-primary-color/[0.15] px-5 py-3 text-base font-medium text-primary-color hover:bg-primary-color hover:text-primary md:px-7 md:py-[14px]" type="button" id="buybtn-{{$candidate->candidateId}}" data-id="{{$candidate->candidateId}}" data-glightbox="type: video" onclick="watchinterview(this)" data-txt="Watch Interview" data-loadingtxt="Watch Interview..."><i class="bi bi-play-circle"></i> Watch Interview</button>
                @endif

                <section id="about" class="about section resume">

                    <!-- Section Title -->
                    <div class="section-title" data-aos="fade-up">
                    <h2>{{ucwords($candidate->fname." ".$candidate->lname)}}</h2>
                    <p></p>
                    </div><!-- End Section Title -->

                    <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4 justify-content-center">
                        <div class="col-lg-3">
                        <img style="max-width:100px;" src="{{ route('private.image', ['userId' => $candidate->candidateId, 'filename' => 'pp-' . $candidate->candidateId . '.jpg']) }}" onerror="this.onerror=null; this.src='{{ url('assets/admin/img/user-avatar.png') }}';" class="img-fluid" alt="{{ucwords($candidate->fname.' '.$candidate->lname)}}">
                        </div>
                        <div class="col-lg-9 content">
                        <h2>Basic Profile</h2>
                        <p class="fst-italic py-3"></p>
                        <div class="row">
                            <div class="col-lg-6">
                            <ul>
                                
                                
                                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{$candidate->age}}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>{{$degree[0]->degree}}</span></li>
                                @if($candidate->purchased == 1)
                                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{$candidate->phone}}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{$candidate->email}}</span></li>
                                @endif
                            </ul>
                            </div>
                            <div class="col-lg-6">
                            <ul>
                                @if($candidate->purchased == 1)  
                                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>{{date("d M Y", strtotime($candidate->dob))}}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Address:</strong> <span>{{$candidate->address_1}} {{$candidate->address_2}}</span></li>
                                @endif
                                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{$candidate->city}}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Country:</strong> <span>{{$candidate->country}}</span></li>
                                
                                
                                
                            </ul>
                            </div>
                        </div>
                        <p class="py-3">
                        </p>
                        </div>
                    </div>

                    </div>

                    <div class="container">
                        <div class="row">

                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                                <h3 class="resume-title">Professional Summary</h3>

                                <div class="resume-item pb-0">
                                    <h4>{{ucwords($candidate->fname." ".$candidate->lname)}}</h4>
                                    <p><em>{{$candidate->profSummary}}</em></p>
                                    <!--<ul>
                                    <li>Portland par 127,Orlando, FL</li>
                                    <li>(123) 456-7891</li>
                                    <li>alice.barkley@example.com</li>
                                    </ul>-->
                                </div><!-- Edn Resume Item -->

                                <h3 class="resume-title">Education</h3>
                                @php
                                  foreach($degree as $degreeRw){
                                    $tmp_degree = $degreeRw->degree;
                                    $tmp_schoolinstitution = $degreeRw->schoolinstitution;
                                    $tmp_startdate = $degreeRw->startdate;
                                    $tmp_enddate = $degreeRw->enddate;
                                    $tmp_fieldofstudy = $degreeRw->fieldofstudy;
                                @endphp

                                    <div class="resume-item">
                                      <h4>{{ ucwords($tmp_degree)}}</h4>
                                      <h5>{{date("M Y", strtotime($tmp_startdate))}} - {{date("M Y", strtotime($tmp_enddate))}}</h5>
                                      <p><em>{{ucwords($tmp_schoolinstitution)}}</em></p>
                                      <p>{{ucwords($tmp_fieldofstudy)}}</p>
                                    </div>

                                @php } @endphp
                                
                                <h3 class="resume-title">Certifications</h3>
                                @php
                                  foreach($certifications as $certificationRw){
                                    $tmp_title = $certificationRw->title;
                                    $tmp_organization = $certificationRw->organization;
                                    $tmp_date = $certificationRw->date;
                                @endphp
                                <div class="resume-item">
                                    <h4>{{ucwords($tmp_title)}}</h4>
                                    <h5>{{date("M Y", strtotime($tmp_date))}}</h5>
                                    <p><em>{{ucwords($tmp_organization)}}</em></p>
                                </div>
                                @php } @endphp
                                
                            </div>

                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                <h3 class="resume-title">Work Experience</h3>
                                @php
                                  foreach($workExperience as $workExperienceRw){
                                    $tmp_jobtitle = $workExperienceRw->jobtitle;
                                    $tmp_companyname = $workExperienceRw->companyname;
                                    $tmp_startdate = $workExperienceRw->startdate;
                                    $tmp_enddate = $workExperienceRw->enddate;
                                    $tmp_responsibilities = $workExperienceRw->responsibilities;
                                    $tmp_achievements = $workExperienceRw->achievements;

                                @endphp
                                <div class="resume-item">
                                    <h4>{{ucwords($tmp_jobtitle)}}</h4>
                                    <h5>{{date("M Y", strtotime($tmp_startdate))}} - 
                                  
                                    @if(!empty($tmp_enddate))
                                        {{ date("M Y", strtotime($tmp_enddate)) }}
                                    @else
                                        Present
                                    @endif
                                  </h5>
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
                                  foreach($skills as $kk => $skillRw){
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
                                  foreach($languages as $k => $languageRw){
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
            <!-- /About Section -->
            </div>


    
        </div>

    </div>
</div>

<!--- videoplayer --->

<!--<video
    id="my-video"
    class="video-js"
    controls
    preload="auto"
    width="640"
    height="264"
    poster="poster.jpg"
    data-setup="{}"
>
  <source src="{{$candidate->videolink}}" type="video/mp4" />
  <p class="vjs-no-js">
    To view this video please enable JavaScript, and consider upgrading to a
    web browser that
    <a href="https://videojs.com/html5-video-support/" target="_blank">
      supports HTML5 video
    </a>
  </p>
</video>-->


<!--<video id="cliptakes-player" src="{{$candidate->videolink}}" oncontextmenu="{return false}" disablepictureinpicture="" controls="" controlslist="nodownload" type="video/mp4"> 
        Your browser doesn't support this video.
      </video>-->

<!--<video
    id="my-video"
    class="video-js"
    controls
    preload="auto"
    width="640"
    height="264"
    data-setup="{}"
  >
    <source src="{{$candidate->videolink}}" type="video/mp4" />
    
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      >
    </p>
  </video>-->
    <div id="myplayer"></div>
@endsection
@push("js")
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

<script>
  
  $(function(){
   /* setTimeout(function(){
      var playerHtml = fetch("{{$candidate->videolink}}");

      // Parse HTML string into a DOM
      let parser = new DOMParser();
      let doc = parser.parseFromString(playerHtml, 'text/html');

      // Get the <video> element
      let videoEl = doc.querySelector('video');

      console.log(videoEl); // Logs the <video> element
      console.log(videoEl.outerHTML); // Logs the full HTML of the video tag
      console.log(videoEl.querySelector('source').src); // Logs the video source URL

      //myplayer
    }, 5000);*/
  });  

  function bookmark(elm){

    var elmId = $(elm).attr("id");
    var flag = $(elm).attr("data-shortlist");
    flag = parseInt(flag);

    if(flag > 0){
        flag = 0;
    }else{
        flag = 1;
    }

    var elmIdParts = elmId.split("-");
    var candidateId = elmIdParts[1];
    var loadingTxt = $("#"+elmId).html();
    var orgTxt = loadingTxt;
    showLoader(elmId,loadingTxt);

    const requrl = "recruiter/bookmark";
    const postdata = {
        "candidateId":candidateId,
        "flag":flag
    };
    callajax(requrl, postdata, function(resp){
        
        hideLoader(elmId,orgTxt);
        setTimeout(function(){
            $(elm).attr("data-shortlist", flag);
            if(flag == 1){
              $("#"+elmId).html('<i class="bi bi-bookmark-star"></i>Unbookmark');
            }else{
              $("#"+elmId).html('<i class="bi bi-bookmark-star"></i>Bookmark');
            }
        }, 500);
        
    });
  }

  function buycandidate(elm){

    var elmId = $(elm).attr("id");
    var flag = $(elm).attr("data-shortlist");
    flag = parseInt(flag);

    if(flag > 0){
        flag = 0;
    }else{
        flag = 1;
    }

    var elmId = $(elm).attr("id");
    var elmIdParts = elmId.split("-");
    var candidateId = elmIdParts[1];
    var orgTxt = $(elm).attr("data-txt");
    var loadingTxt = $(elm).attr("data-loadingtxt");
    $(elm).attr("disabled",true);
    showLoader(elmId,loadingTxt);

    const requrl = "recruiter/buycandidate";
    const postdata = {
        "candidateId":candidateId,
        "flag":flag
    };
    callajax(requrl, postdata, function(resp){
        
        hideLoader(elmId,orgTxt);
        
        var err = 0;
        if(resp.C == 100){
          err = 0;
        }else{
          err = 1;
        }
        
        var msg = resp.M;
        showToast(err,msg);

        if(resp.C == 101 || resp.C == 102 || resp.C == 103){
          setTimeout(function(){
           window.location.href = "{{ url('/recruiter/mypackage') }}";
          }, 5000);    
        }
    });
  }

  function watchinterview(){
    // GLightBox
    GLightbox({
        selector: ".video-popup",
        /*href: "{{$candidate->videolink}}"+"?t="+"{{time()}}",*/
        href: "{{$candidate->videolink}}",
        type: "video",
        source: "local",
        width: 900,
        autoplayVideos: true,
        download:true,
        // onOpen event handler
        onOpen: () => {
            console.log('GLightbox is now open!');
            

          setTimeout(function(){
            /*// Your custom logic when GLightbox opens
            $("#glightbox-body .gcontainer #glightbox-slider .gslide.loaded.current .gslide-inner-content .gvideo-container .gslide-media .gvideo-wrapper .plyr.plyr--video .plyr__controls")
                .append(`
                    <a href="${"{{$candidate->videolink}}"}" download="video.mp4" class="download-video" target="_blank">
                        <button>Download Video</button>
                    </a>
                `);*/
            /*const plyr__controls = $("#glightbox-body .gcontainer #glightbox-slider .gslide.loaded.current .gslide-inner-content .gvideo-container .gslide-media .gvideo-wrapper .plyr.plyr--video .plyr__controls");

                console.log("plyr__controls", plyr__controls);*/
            
            const videoUrl = "{{$candidate->videolink}}";
            const videoId = videoUrl.split('/').pop().split('.').shift();  // Extract videoId or name

            // Create a download link dynamically
            const downloadLink = document.createElement('a');
            downloadLink.href = videoUrl;
            downloadLink.download = `${videoId}.mp4`;  // Set filename to videoId.mp4

            const downloadButton = document.createElement('button');
            downloadButton.textContent = 'Download Video';
            downloadLink.appendChild(downloadButton);

            // Append the download link to the GLightbox container (or customize based on your structure)
            //const controls = document.querySelector('.plyr__controls');
            //console.log("controls", controls);
            //controls.appendChild(downloadLink);

            const playerVideoTag = document.querySelector('#gvideo0');
            playerVideoTag.setAttribute("disablepictureinpicture",true);
            playerVideoTag.setAttribute("controls",true);
            playerVideoTag.setAttribute("controlslist","download");

          }, 500);

        },

        // onClose event handler
        onClose: () => {
            console.log('GLightbox has been closed!');
            // Your custom logic when GLightbox closes
        },

        // You can also add other events like onSlideChange if needed
        onSlideChange: (slide) => {
            console.log('Slide changed!', slide);
        }
    });
    
  }
</script>
@endpush
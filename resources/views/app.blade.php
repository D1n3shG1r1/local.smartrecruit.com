<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Copyright" content="Smart Recruit" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Smart Recruit" />
    <meta name="rating" content="general" />
    <meta name="language" content="English" />
    <meta name="application-name" content="Smart Recruit" />
    <meta name="description" content="Smart Recruit is Nigeria’s premier recruitment platform where top companies meet top talent, effortlessly. Smart Recruit is proudly owned and operated by Smart Technology Services Ltd, a leading provider of innovative digital solutions in Nigeria." />
    <meta name="keywords" content="Smart Recruit, recruitment platform, top talent, top companies, Nigeria recruitment, digital solutions Nigeria, hiring platform, job-seeking experience, verified candidates, CV profiles, pre-recorded video interviews, efficient hiring, job opportunities Nigeria, secure recruitment, candidates showcase, talent recruitment Nigeria, recruitment solutions, employers platform, transparency in hiring, innovative recruitment, user-friendly recruitment, modern hiring solutions, Smart Technology Services Ltd, trusted recruitment portal, job seekers Nigeria, recruitment technology" />

    <!--
    <meta
      name="twitter:title"
      content=""
    />
    <meta
      name="twitter:description"
      content=""
    />
    <meta name="twitter:image" content="" />
    -->

    <meta property="og:title" content="Smart Recruit - Premier Recruitment Platform in Nigeria" />
    <meta property="og:description" content="SmartRecruit is a modern recruitment platform where candidates upload their CVs and pre-recorded video interviews, allowing recruiters to search by specific skills, review profiles, and make faster, informed hiring decisions." />
    <meta property="og:url" content="https://www.smartrecruit.ng" />


    <meta content="Smart Recruit" property="og:site_name" />
    
    <meta content="{{url('images/logo.png')}}" property="og:image" />
    
    <meta content="website" property="og:type" />

    <meta name="msapplication-TileColor" content="#3d63dd" />
    <meta
      name="msapplication-TileImage"
      content="./assets/favicon/mstile-144x144.png"
    />
    <meta name="theme-color" content="#3d63dd" />

    <!-- Page title -->
    <title>SmartRecruit- The Future of Recruitment</title>

    <!-- Canonical -->
    <!--<link rel="canonical" href="" />-->

    <!-- Favicon -->
    <!--<link
      rel="apple-touch-icon"
      sizes="180x180"
      href="./assets/favicon/apple-touch-icon.png"
    />-->
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="{{url('assets/favicon/favicon-32.png')}}"
    />
    <!--
    <link
      rel="icon"
      type="image/png"
      sizes="194x194"
      href="./assets/favicon/favicon-194x194.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="192x192"
      href="./assets/favicon/android-chrome-192x192.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="./assets/favicon/favicon-16x16.png"
    />
    <link rel="manifest" href="./assets/favicon/site.webmanifest.json" />
    <link
      rel="mask-icon"
      href="./assets/favicon/safari-pinned-tab.svg"
      color="#3d63dd"
    />
    -->

    <!-- CSS Plugins -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"
    />
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
    <link rel="stylesheet" href="https://icons.getbootstrap.com/assets/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css" />
  
    @if(request()->is('recruiter/*') || request()->is('candidate/*') || request()->is('admin/*'))
    <link rel="stylesheet" href="{{ url('assets/admin/css/bootstrap.min.css'); }}">
    <link rel="stylesheet" href="{{ url('assets/admin/css/bootstrap-icons.css'); }}"></link>
    <link rel="stylesheet" href="{{ url('assets/admin/css/style.css'); }}">
    <link rel="stylesheet" href="{{ url('assets/admin/css/responsive.css'); }}">
    <link rel="stylesheet" href="{{ url('assets/admin/css/color_2.css'); }}">
    <link rel="stylesheet" href="{{ url('assets/admin/css/bootstrap-select.css'); }}">
    <link rel="stylesheet" href="{{ url('assets/admin/css/perfect-scrollbar.css'); }}">
    <link rel="stylesheet" href="{{ url('assets/admin/css/custom.css'); }}">
    @else
    <link rel="stylesheet" href="{{ url('assets/css/main.css'); }}" />
    <link rel="stylesheet" href="{{ url('assets/css/custom.css'); }}" />
    @endif

    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17527605400">
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'AW-17527605400');
    </script>
    <!-- Google tag (gtag.js) -->
    
  </head>
  <body>
    <!-- Page loading -->
    <div
      class="page-loading fixed top-0 bottom-0 left-0 right-0 z-[99999] flex items-center justify-center bg-primary-light-1 dark:bg-primary-dark-1 opacity-100 visible pointer-events-auto"
      role="status"
      aria-live="polite"
      aria-atomic="true"
      aria-label="Loading..."
    >
      <div class="grid-loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>

    
<!-- header -->
@if(request()->is('recruiter/*'))
@include("employer.header")
@elseif(request()->is('candidate/*'))
@include("candidate.header")
@elseif(request()->is('admin/*'))
@include("admin.header")
@else
@include("header")
@endif
<!-- / header -->

<main class="main relative">
@yield("contentbox")
</main>

<div id="toastMessage" class="toastMessage alert alert-danger" role="alert">This is a danger alert—check it out!</div>

@if(!request()->is('recruiter/*') && !request()->is('candidate/*') && !request()->is('admin/*'))
<!--
<button
      type="button"
      class="inline-flex w-12 h-12 rounded-md items-center justify-center text-lg/none bg-primary text-primary-color hover:bg-primary-light-10 dark:hover:bg-primary-dark-10 focus:bg-primary-light-10 dark:focus:bg-primary-dark-10 fixed bottom-[117px] right-[20px] hover:-translate-y-1 opacity-100 visible z-50 is-hided"
      data-web-trigger="scroll-top"
      aria-label="Scroll to top"
    >
      <i class="lni lni-chevron-up"></i>
    </button>
-->
@endif

    <script>
      var CSRFTOKEN = "{{ csrf_token() }}";
      var SERVICEURL = "{{ url('') }}";
    </script>
    <script src="{{ url('assets/js/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    
    @if(request()->is('recruiter/*') || request()->is('candidate/*') || request()->is('admin/*'))
    <script src="{{ url('/assets/admin/js/popper.min.js') }}"></script>
    <script src="{{ url('/assets/admin/js/bootstrap.min.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ url('/assets/admin/js/animate.js') }}"></script>
    <!-- select country -->
    <script src="{{ url('/assets/admin/js/bootstrap-select.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ url('/assets/admin/js/owl.carousel.js') }}"></script> 
    <!-- chart js -->
    <script src="{{ url('/assets/admin/js/Chart.min.js') }}"></script>
    <script src="{{ url('/assets/admin/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ url('/assets/admin/js/utils.js') }}"></script>
    <script src="{{ url('/assets/admin/js/analyser.js') }}"></script>
    <!-- nice scrollbar -->
    <script src="{{ url('/assets/admin/js/perfect-scrollbar.min.js') }}"></script>
    <script>
      
      $(function(){
          setTimeout(function(){
            var ps = new PerfectScrollbar('#sidebar');
          },500);

          var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
          var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
          })
      });
    
    </script>
    <!-- custom js -->
    <script src="{{ url('/assets/admin/js/custom.js') }}"></script>
    <script src="{{ url('/assets/admin/js/chart_custom_style2.js') }}"></script>
    @else
    <script src="{{ url('assets/js/main.js')}}"></script>
    <script src="{{ url('assets/js/script.js')}}"></script>
    @endif

    <!-- footer -->
    @if(request()->is('recruiter/*'))
    @include("employer.footer")
    @elseif(request()->is('candidate/*'))
    @include("candidate.footer")
    @elseif(request()->is('admin/*'))
    @include("admin.footer")
    @else
    @include("footer")
    @endif
    <!-- / footer -->
    
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
      // Scroll Reveal
      const sr = ScrollReveal({
        origin: "bottom",
        distance: "16px",
        duration: 1000,
        reset: false,
      });

      sr.reveal(`.scroll-revealed`, {
        cleanup: true,
      });

      // GLightBox
      /*GLightbox({
        selector: ".video-popup",
        href: "https://youtu.be/27tUOrx-o2w",
        type: "video",
        source: "youtube",
        width: 900,
        autoplayVideos: true,
      });

      const myGallery3 = GLightbox({
        selector: ".portfolio-box",
        type: "image",
        width: 900,
      });*/

      // Testimonial
      //const testimonialSwiper = new Swiper(".testimonial-carousel", {
      const testimonialSwiper = new Swiper(".advertisement-carousel", {
        slidesPerView: 3,
        spaceBetween: 30,

        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },

        autoplay: {
          delay: 3000, // Slide change delay in milliseconds (3 seconds)
          disableOnInteraction: false, // Keep autoplay running after user interaction
        },

        effect: 'slide',  // Slide effect (default)
        speed: 600,  // Speed of slide transition in ms
        slideToClickedSlide: true, // Allow clicking on a slide to navigate to it
        
        breakpoints: {
          640: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          1280: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
        },
      });
    </script>
    @stack('js')
  </body>
</html>



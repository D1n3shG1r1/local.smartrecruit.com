@extends("app")
@section("contentbox")
 <!-- Hero section | About Us -->
 <section
        id="aboutus"
        class="relative overflow-hidden bg-primary text-primary-color pt-[120px] md:pt-[130px] lg:pt-[160px]"
      >
        <div class="container">
          <div class="-mx-5 flex flex-wrap items-center">
            <div class="w-full px-5">
              <div class="scroll-revealed mx-auto max-w-[780px] text-center">
                <h1
                  class="mb-6 text-3xl font-bold leading-snug text-primary-color sm:text-4xl sm:leading-snug lg:text-5xl lg:leading-tight"
                >
                Smart Recruit  Nigeria’s premier recruitment platform. 
                </h1>

                <p
                  class="mx-auto mb-9 max-w-[600px] text-base text-primary-color sm:text-lg sm:leading-normal"
                >
                connecting top talent with leading employers across industries.
                </p>

                <ul
                  class="mb-10 flex flex-wrap items-center justify-center gap-4 md:gap-5"
                >
                  <li>
                    <a
                      href="javascript:void(0)"
                      class="inline-flex items-center justify-center rounded-md bg-primary-color text-primary px-5 py-3 text-center text-base font-medium shadow-md hover:bg-primary-light-5 md:px-7 md:py-[14px]"
                      role="button" onclick="getStarted();"
                      >Get Started</a
                    >
                  </li>

                  <li>
                    <a
                      href="javascript:boid(0)"
                      class="video-popup-dk flex items-center gap-4 rounded-md bg-primary-color/[0.15] px-5 py-3 text-base font-medium text-primary-color hover:bg-primary-color hover:text-primary md:px-7 md:py-[14px]"
                      role="button"
                      ><i class="lni lni-play text-lg/none"></i> Watch How to Use Video</a
                    >
                  </li>
                </ul>

                <!--<div>
                  <p class="mb-4 text-center text-primary-color">Powered by</p>

                  <div class="scroll-revealed flex items-center justify-center gap-4 text-center">
                    <a href="{{ url('') }}" target="_blank" class="text-primary-color/60 hover:text-primary-color">SmartRECRUIT</a>
                  </div>
                </div>-->
              </div>
            </div>
            <div class="w-full px-5">
              <div class="scroll-revealed relative z-10 mx-auto max-w-[845px]">
                <figure class="mt-16">
                  <!--<img
                    src="./assets/img/hero.png"
                    alt="Hero image"
                    class="mx-auto max-w-full rounded-t-xl rounded-tr-xl"
                  />-->
                  <img
                    src="./assets/img/image-18.jpg"
                    alt="Hero image"
                    class="mx-auto max-w-full rounded-t-xl rounded-tr-xl"
                  />
                  
                </figure>

                <div class="absolute -left-9 bottom-0 z-[-1]">
                  <img
                    src="./assets/img/dots.svg"
                    alt
                    class="w-[120px] opacity-75"
                  />
                </div>

                <div class="absolute -right-6 -top-6 z-[-1]">
                  <img
                    src="./assets/img/dots.svg"
                    alt
                    class="w-[120px] opacity-75"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- About section -->
      <section id="about" class="section-area">
        <div class="container">
          <div class="grid grid-cols-1 gap-14 lg:grid-cols-2">
            <div class="w-full">
              <figure class="scroll-revealed max-w-[480px] mx-auto">
                <!--<img
                  src="./assets/img/about-img.jpg"
                  alt="About image"
                  class="rounded-xl"
                />-->
                <img
                  src="./assets/img/image-10.jpg"
                  alt="About image"
                  class="rounded-xl"
                />
              </figure>
            </div>

            <div class="w-full">
              <div class="scroll-revealed">
                <h6 class="mb-2 block text-lg font-semibold text-primary">
                  About Us
                </h6>
                <h2 class="mb-6">
                Welcome to Smart Recruit Nigeria’s premier recruitment platform where top companies meet top talent, effortlessly.
                </h2>
              </div>

              <div class="tabs scroll-revealed">
                <nav
                  class="tabs-nav flex flex-wrap gap-4 my-8"
                  role="tablist"
                  aria-label="About us tabs"
                >
                  <button
                    type="button"
                    class="tabs-link inline-block py-2 px-4 rounded-md text-body-light-12 dark:text-body-dark-12 bg-body-light-12/10 dark:bg-body-dark-12/10 text-inherit font-medium hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color"
                    data-web-toggle="tabs"
                    data-web-target="tabs-panel-profile"
                    id="tabs-list-profile"
                    role="tab"
                    aria-controls="tabs-panel-profile"
                  >
                    Our Profile
                  </button>

                  <button
                    type="button"
                    class="tabs-link inline-block py-2 px-4 rounded-md text-body-light-12 dark:text-body-dark-12 bg-body-light-12/10 dark:bg-body-dark-12/10 text-inherit font-medium hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color"
                    data-web-toggle="tabs"
                    data-web-target="tabs-panel-vision"
                    id="tabs-list-vision"
                    role="tab"
                    aria-controls="tabs-panel-vision"
                  >
                    Our Vision
                  </button>

                  <button
                    type="button"
                    class="tabs-link inline-block py-2 px-4 rounded-md text-body-light-12 dark:text-body-dark-12 bg-body-light-12/10 dark:bg-body-dark-12/10 text-inherit font-medium hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color"
                    data-web-toggle="tabs"
                    data-web-target="tabs-panel-history"
                    id="tabs-list-history"
                    role="tab"
                    aria-controls="tabs-panel-history"
                  >
                    Our Mission
                  </button>
                </nav>

                <div
                  class="tabs-content mt-4"
                  id="tabs-panel-profile"
                  tabindex="-1"
                  role="tabpanel"
                  aria-labelledby="tabs-list-profile"
                >
                  <p>
                    Smart Recruit is proudly owned and operated by Smart Technology Services Ltd, a leading provider of innovative digital solutions in Nigeria.
                  </p>
                  <p>
                    At Smart Recruit, we redefine the hiring and job-seeking experience with a secure, efficient, and modern approach.
                  </p>
                  <p>
                    For recruiters, we offer a curated database of verified candidates, complete with detailed CV profiles and pre-recorded video interviews — ensuring faster, smarter hiring decisions.
                  </p>
                  <p>
                    For candidates, we provide a platform to showcase your skills and professionalism directly to employers, increasing your chances of landing your dream job. We are passionate about building trust, transparency, and opportunity. Our system ensures that only active and ready-to-work candidates are visible, saving recruiters valuable time and effort.
                  </p>
                  <p><a href="http://smarttechnology.ng/" target="_blank">Read about Smart Technology Board of Directors</a></p>
                </div>

                <div
                  class="tabs-content mt-4"
                  id="tabs-panel-vision"
                  tabindex="-1"
                  role="tabpanel"
                  aria-labelledby="tabs-list-vision"
                >
                  <p>
                    To become Nigeria’s most trusted and efficient recruitment portal, empowering businesses and individuals alike.
                  </p>
                </div>

                <div
                  class="tabs-content mt-4"
                  id="tabs-panel-history"
                  tabindex="-1"
                  role="tabpanel"
                  aria-labelledby="tabs-list-history"
                >
                  <p>
                    To connect recruiters with qualified candidates through a secure, innovative, and user-friendly platform.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- advertisement swiper -->
      <section id="advertisement" class="section-area">
        <div class="container">
          <div class="swiper advertisement-carousel common-carousel scroll-revealed">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div
                  class="rounded-xl-dk bg-body-light-1 dark:bg-body-dark-12/10 px-5-dk py-8-dk shadow-card-2 sm:px-8-dk"
                >
                  <figure class="flex-dk items-center gap-4">
                    <div class="h-[500px] w-[700px] overflow-hidden">
                      <img
                        src="{{url('images/advertisement/ad-1.jpg')}}"
                        alt=""
                        class="h-full w-full rounded-full-dk object-cover-dk"
                      />
                    </div>
                  </figure>
                </div>
              </div>

              <div class="swiper-slide">
                <div
                  class="rounded-xl-dk bg-body-light-1 dark:bg-body-dark-12/10 px-5-dk py-8-dk shadow-card-2 sm:px-8-dk"
                >
                  <figure class="flex-dk items-center gap-4">
                    <div class="h-[500px] w-[700px] overflow-hidden">
                      <img
                        src="{{url('images/advertisement/ad-2.jpg')}}"
                        alt=""
                        class="h-full w-full rounded-full-dk object-cover-dk"
                      />
                    </div>
                  </figure>
                </div>
              </div>
            </div>

            <!--
            <div class="mt-[60px] flex items-center justify-center gap-1">
              <div class="swiper-button-prev">
                <i class="lni lni-arrow-left"></i>
              </div>
              <div class="swiper-button-next">
                <i class="lni lni-arrow-right"></i>
              </div>
            </div>
            -->
          </div>
        </div>
      </section>
      <!-- advertisement section -->


      <!-- how to use section -->
      <section id="howtouse" class="section-area">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">
            How to Use SmartRecruit.ng
            </h6>
            <h2 class="mb-6">Recruiter</h2>
            <p>Use SmartRecruit.ng as a Recruiter in 3 Easy Steps</p>
          </div>

          <div class="row">
            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-1-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Create Your Recruiter Account
                  </h4>
                  <p>
                  Sign up, verify your email, and complete your company profile.
                  </p>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-2-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Find and Purchase Access to Candidates
                  </h4>
                  <p>
                  Search for candidates, preview profiles, and securely pay to unlock full contact details.
                  </p>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-3-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Connect and Hire
                  </h4>
                  <p>
                  Reach out directly to candidates and make smarter, faster hiring decisions.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container" style="margin-top:6rem;">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
          <h6 class="mb-2 block text-lg font-semibold text-primary">
            How to Use SmartRecruit.ng
            </h6>  
          <h2 class="mb-6">Candidate</h2>
            <p>Use SmartRecruit.ng as a Candidate in 3 Easy Steps</p>
          </div>

          <div class="row">
            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-1-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Create Your Candidate Account
                  </h4>
                  <p>
                  Sign up, verify your email, upload your CV, complete your profile, and record your video interview.
                  </p>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-2-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Stay Active and Get Featured
                  </h4>
                  <p>
                  Update your profile every 7 days to stay visible; optionally pay ₦2,000 to feature your profile on the homepage.
                  </p>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-3-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Get Hired
                  </h4>
                  <p>
                  Respond quickly to recruiters who contact you and seize new career opportunities.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Intro video section -->
      <section id="intro" class="section-area hide">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">
              Intro Video
            </h6>
            <h2 class="mb-6">Watch Our Intro Video</h2>
            <p>
              There are many variations of passages of Lorem Ipsum available but
              the majority have suffered alteration in some form.
            </p>
          </div>

          <div class="scroll-revealed relative max-w-[900px] mx-auto">
            <img
              src="./assets/img/smartkyc-intro.jpeg"
              alt="Intro video"
              class="w-full h-full aspect-video rounded-xl object-cover"
            />
            <a
              href="javascript:void(0)"
              class="video-popup-dk w-[80px] h-[80px] rounded-full inline-flex items-center justify-center bg-primary text-primary-color text-[1.875rem] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 shadow-md hover:bg-primary-color hover:text-primary hover:shadow-xl focus:bg-primary-color focus:text-primary focus:shadow-xl"
            >
              <i class="lni lni-play"></i>
            </a>
          </div>
        </div>
      </section>

      <!-- Pricing section -->
      <section id="pricing" class="section-area">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">
              Pricing
            </h6>
            <h2 class="mb-6">Pricing & Plans for Recruiter</h2>
            <p>
            Choose the right plan for accessing verified, ready-to-hire candidates.
            </p>
          </div>

          <div class="row">
            <div class="scroll-revealed col-12 sm:col-6 lg:col-3">
              <div
                class="rounded-xl py-12 px-9 bg-body-light-1 dark:bg-body-dark-12/10 text-center shadow-card-1 hover:shadow-lg"
              >
                <div>
                  <h6
                    class="inline-block font-medium text-base mb-6 text-primary bg-primary/10 rounded-md py-2 px-8 pricing-title"
                  >
                  Pay as you go
                  </h6>
                  <p>
                  View 1 candidate’s full profile + Video Interview + Full Support
                  </p>
                  <div class="pt-8">
                    <h2
                      class="font-semibold inline-block relative pl-4 text-[51px]"
                    >
                      <span
                        class="font-normal text-body-light-11 dark:text-body-dark-11 text-[1.25rem] absolute left-0 top-1.5"
                        ><i class="fa-solid fa-naira-sign"></i></span
                      >7,000<span
                        class="text-[1.125rem] inline-block text-body-light-11 dark:text-body-dark-11 font-normal"
                        >/mo</span
                      >
                    </h2>
                  </div>
                </div>
                <div class="pt-8 pb-10">
                  <a
                    href="javascript:void(0)"
                    class="inline-block font-medium px-6 py-3 rounded-md bg-primary/10 text-primary hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color" onclick="getStarted();"
                    >Get Started</a
                  >
                </div>
                <div>
                  <ul>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>View 1 candidate’s full profile.</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>Video Interview.</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <!--
                      <i
                        class="lni lni-checkmark-circle text-body-light-11 dark:text-body-dark-11 text-base leading-[24px]"
                      ></i>
                      -->
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>Full Support.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-3">
              <div
                class="rounded-xl py-12 px-9 bg-body-light-1 dark:bg-body-dark-12/10 text-center shadow-card-1 hover:shadow-lg"
              >
                <div>
                  <h6
                    class="inline-block font-medium text-base mb-6 text-primary bg-primary/10 rounded-md py-2 px-8 pricing-title"
                  >
                  Basic Access
                  </h6> 
                  
                  <p>
                  View 5 candidate’s full profile + Video Interview + Full Support
                  </p>
                  <div class="pt-8">
                    <h2
                      class="font-semibold inline-block relative pl-4 text-[51px]"
                    >
                      <span
                        class="font-normal text-body-light-11 dark:text-body-dark-11 text-[1.25rem] absolute left-0 top-1.5"
                        ><i class="fa-solid fa-naira-sign"></i></span
                      >30,000<span
                        class="text-[1.125rem] inline-block text-body-light-11 dark:text-body-dark-11 font-normal"
                        >/mo</span
                      >
                    </h2>
                  </div>
                </div>
                <div class="pt-8 pb-10">
                  <a
                    href="javascript:void(0)"
                    class="inline-block font-medium px-6 py-3 rounded-md bg-primary/10 text-primary hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color" onclick="getStarted();"
                    >Get Started</a
                  >
                </div>
                <div>
                  <ul>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>View 5 candidate’s full profile.</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>Video Interview.</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>Full Support.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-3">
              <div
                class="rounded-xl py-12 px-9 bg-body-light-1 dark:bg-body-dark-12/10 text-center shadow-card-1 hover:shadow-lg"
              >
                <div>
                  <h6
                    class="inline-block font-medium text-base mb-6 text-primary bg-primary/10 rounded-md py-2 px-8 pricing-title"
                  >
                  Recruiters Package
                  </h6>
                  <p>
                  View 10 candidate’s full profile + Video Interview + Full Support
                  </p>
                  <div class="pt-8">
                    <h2
                      class="font-semibold inline-block relative pl-4 text-[51px]"
                    >
                      <span
                        class="font-normal text-body-light-11 dark:text-body-dark-11 text-[1.25rem] absolute left-0 top-1.5"
                        ><i class="fa-solid fa-naira-sign"></i></span
                      >55,000<span
                        class="text-[1.125rem] inline-block text-body-light-11 dark:text-body-dark-11 font-normal"
                        >/mo</span
                      >
                    </h2>
                  </div>
                </div>
                <div class="pt-8 pb-10">
                  <a
                    href="javascript:void(0)"
                    class="inline-block font-medium px-6 py-3 rounded-md bg-primary/10 text-primary hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color" onclick="getStarted();"
                    >Get Started</a
                  >
                </div>
                <div>
                  <ul>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>View 10 candidate’s full profile.</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>Video Interview.</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>Full Support.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-3">
              <div
                class="rounded-xl py-12 px-9 bg-body-light-1 dark:bg-body-dark-12/10 text-center shadow-card-1 hover:shadow-lg"
              >
                <div>
                  <h6
                    class="inline-block font-medium text-base mb-6 text-primary bg-primary/10 rounded-md py-2 px-8 pricing-title"
                  >
                  Custom Package
                  </h6>
                  <p>
                  View unlimited candidate’s full profile + Video Interview + Full Support
                  </p>
                  <div class="pt-8">
                    <h2
                      class="font-semibold inline-block relative pl-4 text-[51px]"
                    >
                      <span
                        class="font-normal text-body-light-11 dark:text-body-dark-11 text-[1.25rem] absolute left-0 top-1.5"
                        ></span
                      ><span
                        class="text-[1.125rem] inline-block text-body-light-11 dark:text-body-dark-11 font-normal"
                        >Get Your Quote</span
                      >
                    </h2>
                  </div>
                </div>
                <div class="pt-8 pb-10">
                  <a
                    href="javascript:void(0)"
                    class="inline-block font-medium px-6 py-3 rounded-md bg-primary/10 text-primary hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color" onclick="getStarted();"
                    >Get Started</a
                  >
                </div>
                <div>
                  <ul>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>View unlimited candidate’s full profile.</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>Video Interview.</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>Full Support.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

          </div>

          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary"></h6>
            <h2 class="mb-6"></h2>
            <p>All payments processed via Paystack securely.</p>
          </div>

        </div>
      </section>

      <!-- Call action section -->
      <section
        id="call-action"
        class="section-area !bg-primary !text-primary-color"
      >
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto">
            <h2 class="mb-8 text-inherit">
              We love to make perfect solutions for your business
            </h2>
            <p>
              Why I say old chap that is, spiffing off his nut cor blimey
              guvnords geeza bloke knees up bobby, sloshed arse William cack
              Richard. Bloke fanny around chesed of bum bag old lost the pilot
              say there spiffing off his nut.
            </p>
            <a
              href="javascript:void(0)"
              class="inline-block px-5 py-3 rounded-md mt-11 bg-green-400 text-white hover:bg-green-500 hover:text-white focus:bg-green-500 focus:text-white"
              role="button" onclick="getStarted();"
              >Get Started Now</a
            >
          </div>
        </div>
      </section>

      <!-- FAQ section -->
      <section id="faq" class="section-area relative">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">FAQ</h6>
            <h2 class="mb-6">Any Questions? Look Here</h2>
            <p>
              There are many variations of passages of Lorem Ipsum available but
              the majority have suffered alteration in some form.
            </p>
          </div>

          <div class="grid gap-x-8 gap-y-12 grid-cols-1 lg:grid-cols-2">
            <div class="scroll-revealed flex">
              <div
                class="mr-4 flex h-[50px] w-full max-w-[50px] items-center justify-center rounded-xl bg-primary text-primary-color text-[28px] sm:mr-6 sm:h-[60px] sm:max-w-[60px] sm:text-[32px]"
              >
                <i class="lni lni-question-circle"></i>
              </div>
              <div class="w-full">
                <h3
                  class="mb-6 text-xl font-semibold text-body-light-12 dark:text-body-dark-12 sm:text-2xl lg:text-xl xl:text-2xl"
                >
                How does SmartRecruit.ng work for recruiters?
                </h3>
                <p class="text-body-light-11 dark:text-body-dark-11">
                Recruiters create an account, search candidates by industry or keyword, browse profiles with CVs and video interviews, and purchase to unlock full contact details.
                </p>
              </div>
            </div>

            <div class="scroll-revealed flex">
              <div
                class="mr-4 flex h-[50px] w-full max-w-[50px] items-center justify-center rounded-xl bg-primary text-primary-color text-[28px] sm:mr-6 sm:h-[60px] sm:max-w-[60px] sm:text-[32px]"
              >
                <i class="lni lni-question-circle"></i>
              </div>
              <div class="w-full">
                <h3
                  class="mb-6 text-xl font-semibold text-body-light-12 dark:text-body-dark-12 sm:text-2xl lg:text-xl xl:text-2xl"
                >
                How does SmartRecruit.ng work for job seekers?
                </h3>
                <p class="text-body-light-11 dark:text-body-dark-11">
                Candidates create an account, complete their profile, record a video interview, and keep their profile updated weekly to remain visible to recruiters.
                </p>
              </div>
            </div>

            <div class="scroll-revealed flex">
              <div
                class="mr-4 flex h-[50px] w-full max-w-[50px] items-center justify-center rounded-xl bg-primary text-primary-color text-[28px] sm:mr-6 sm:h-[60px] sm:max-w-[60px] sm:text-[32px]"
              >
                <i class="lni lni-question-circle"></i>
              </div>
              <div class="w-full">
                <h3
                  class="mb-6 text-xl font-semibold text-body-light-12 dark:text-body-dark-12 sm:text-2xl lg:text-xl xl:text-2xl"
                >
                Is it mandatory to update my profile every 7 days?
                </h3>
                <p class="text-body-light-11 dark:text-body-dark-11">
                Yes. If a candidate does not update their profile within 7 days, their profile will automatically become hidden from recruiters until updated again.
                </p>
              </div>
            </div>

            <div class="scroll-revealed flex">
              <div
                class="mr-4 flex h-[50px] w-full max-w-[50px] items-center justify-center rounded-xl bg-primary text-primary-color text-[28px] sm:mr-6 sm:h-[60px] sm:max-w-[60px] sm:text-[32px]"
              >
                <i class="lni lni-question-circle"></i>
              </div>
              <div class="w-full">
                <h3
                  class="mb-6 text-xl font-semibold text-body-light-12 dark:text-body-dark-12 sm:text-2xl lg:text-xl xl:text-2xl"
                >
                How do recruiters pay to access candidates’ full profiles?
                </h3>
                <p class="text-body-light-11 dark:text-body-dark-11">
                Payments are securely processed via Paystack. Once payment is made, recruiters can view candidate contact details.
                </p>
              </div>
            </div>

            <div class="scroll-revealed flex">
              <div
                class="mr-4 flex h-[50px] w-full max-w-[50px] items-center justify-center rounded-xl bg-primary text-primary-color text-[28px] sm:mr-6 sm:h-[60px] sm:max-w-[60px] sm:text-[32px]"
              >
                <i class="lni lni-question-circle"></i>
              </div>
              <div class="w-full">
                <h3
                  class="mb-6 text-xl font-semibold text-body-light-12 dark:text-body-dark-12 sm:text-2xl lg:text-xl xl:text-2xl"
                >
                What is the "Feature Myself" option for candidates?
                </h3>
                <p class="text-body-light-11 dark:text-body-dark-11">
                Candidates can pay NGN 2,000 to have their profile featured on the homepage, gaining extra visibility among top recruiters.
                </p>
              </div>
            </div>

            <div class="scroll-revealed flex">
              <div
                class="mr-4 flex h-[50px] w-full max-w-[50px] items-center justify-center rounded-xl bg-primary text-primary-color text-[28px] sm:mr-6 sm:h-[60px] sm:max-w-[60px] sm:text-[32px]"
              >
                <i class="lni lni-question-circle"></i>
              </div>
              <div class="w-full">
                <h3
                  class="mb-6 text-xl font-semibold text-body-light-12 dark:text-body-dark-12 sm:text-2xl lg:text-xl xl:text-2xl"
                >
                How secure is my information?
                </h3>
                <p class="text-body-light-11 dark:text-body-dark-11">
                All your information is protected. Contact information is only shared after purchase by verified recruiters.
                </p>
              </div>
            </div>

            <div class="scroll-revealed flex">
              <div
                class="mr-4 flex h-[50px] w-full max-w-[50px] items-center justify-center rounded-xl bg-primary text-primary-color text-[28px] sm:mr-6 sm:h-[60px] sm:max-w-[60px] sm:text-[32px]"
              >
                <i class="lni lni-question-circle"></i>
              </div>
              <div class="w-full">
                <h3
                  class="mb-6 text-xl font-semibold text-body-light-12 dark:text-body-dark-12 sm:text-2xl lg:text-xl xl:text-2xl"
                >
                What happens after I purchase a candidate?
                </h3>
                <p class="text-body-light-11 dark:text-body-dark-11">
                You instantly gain access to the candidate’s full contact details, allowing you to reach out directly for interviews or offers.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div>
          <span class="absolute left-5 top-5 -z-[1]">
            <svg
              class="w-20 h-auto fill-teal-500"
              version="1.0"
              xmlns="http://www.w3.org/2000/svg"
              width="1280.000000pt"
              height="1280.000000pt"
              viewBox="0 0 1280.000000 1280.000000"
              preserveAspectRatio="xMidYMid meet"
            >
              <g
                transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)"
                stroke="none"
              >
                <path
                  d="M550 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 12465 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 254
-255 194 -41 395 142 375 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217
16z"
                />
                <path
                  d="M3110 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 12465 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142
-319 107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M12070 12465 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142
-319 107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M550 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 11185 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 254
-255 194 -41 395 142 375 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217
16z"
                />
                <path
                  d="M3110 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 11185 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142
-319 107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M12070 11185 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142
-319 107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M550 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 4785 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 4785 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 4785 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142 -319
107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M4390 4785 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142 -319
107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M5670 4785 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 4785 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 4785 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 4785 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 4785 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 4785 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 3505 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 3505 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 3505 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142 -319
107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M4390 3505 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142 -319
107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M5670 3505 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 3505 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 3505 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 3505 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 3505 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 3505 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 2225 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142 -319
107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M4390 2225 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142 -319
107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M5670 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
              </g>
            </svg>
          </span>
          <span class="absolute right-5 bottom-5 -z-[1]">
            <svg
              class="w-20 h-auto fill-indigo-500"
              version="1.0"
              xmlns="http://www.w3.org/2000/svg"
              width="1280.000000pt"
              height="1280.000000pt"
              viewBox="0 0 1280.000000 1280.000000"
              preserveAspectRatio="xMidYMid meet"
            >
              <g
                transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)"
                stroke="none"
              >
                <path
                  d="M550 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 12465 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 254
-255 194 -41 395 142 375 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217
16z"
                />
                <path
                  d="M3110 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 12465 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 12465 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142
-319 107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M12070 12465 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142
-319 107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M550 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 11185 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 254
-255 194 -41 395 142 375 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217
16z"
                />
                <path
                  d="M3110 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 11185 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 11185 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142
-319 107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M12070 11185 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142
-319 107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M550 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 9905 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 8625 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 7345 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 6065 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 4785 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 4785 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 4785 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142 -319
107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M4390 4785 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142 -319
107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M5670 4785 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 4785 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 4785 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 4785 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 4785 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 4785 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 3505 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 3505 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 3505 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142 -319
107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M4390 3505 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142 -319
107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M5670 3505 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 3505 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 3505 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 3505 c-151 -50 -253 -216 -222 -362 25 -119 136 -230 255 -255
193 -41 394 142 374 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 3505 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 3505 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 2225 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142 -319
107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M4390 2225 c-105 -35 -200 -141 -222 -248 -25 -117 32 -244 142 -319
107 -74 229 -75 337 -3 177 118 201 338 53 485 -85 86 -207 119 -310 85z"
                />
                <path
                  d="M5670 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 2225 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M550 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M1830 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M3110 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M4390 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M5670 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M6950 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M8230 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M9510 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369 -369
155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M10790 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
                <path
                  d="M12070 945 c-105 -35 -200 -141 -222 -248 -43 -206 163 -412 369
-369 155 32 275 190 260 339 -11 105 -90 213 -190 262 -61 29 -155 36 -217 16z"
                />
              </g>
            </svg>
          </span>
        </div>
      </section>

      <!-- privacy policy section -->
      <section id="privacypolicy" class="section-area">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">
            Privacy Policy
            </h6>
            <h2 class="mb-6"></h2>
            <p>At SmartRecruit.ng, your privacy is extremely important to us. This Privacy Policy outlines how we collect, use, and protect your information.</p>
          </div>

          <div class="row">
            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-1-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Information We Collect
                  </h4>
                  <ul>
                    <li>
                    For Candidates: Full name, CV details, recorded video interviews, employment history, and profile updates.
                    </li>
                    <li>
                    For Recruiters: Company name, contact information, purchase history.
                    </li>
                    <li>
                    For All Users: Email addresses for account verification and communication.
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-2-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  How We Use Information
                  </h4>
                  <ul>
                    <li>
                      Recruiters access candidate profiles (excluding contact information until purchased).
                    </li>
                    <li>
                      Candidates' profiles are displayed to recruiters when actively updated.
                    </li>
                    <li>
                      Admins manage visibility based on profile activity.
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-3-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Data Protection
                  </h4>
                  <ul>
                    <li>
                      We implement strict security measures to protect user data.
                    </li>
                    <li>
                      Contact details are hidden until proper purchase authorization is made.
                    </li>
                    <li>
                      All transactions are processed securely via Paystack.
                    </li>
                    
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-4-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  User Rights
                  </h4>
                  <ul>
                    <li>
                      Candidates may update or delete their profile at any time.
                    </li>
                    <li>
                      Recruiters may close their accounts by contacting support.
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-5-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Changes to Policy
                  </h4>
                  <ul>
                    <li>
                    We reserve the right to update this Privacy Policy periodically. Changes will be communicated via email or on the website.
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-6-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Contact Us
                  </h4>
                  <ul>
                    <li>
                    For any privacy-related questions or requests, please contact:{{ config('custom.support_email') }}
                    </li>
                  </ul>
                </div>
              </div>
            </div>

          </div>

        </div>
      </section>

      <!-- termsandcondition section -->
      <section id="termsandcondition" class="section-area">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">Terms and Conditions</h6>
            <h2 class="mb-6">Welcome to Smart Recruit</h2>
            <p>These Terms and Conditions govern your access to and use of our platform. By using our website, you agree to comply with these terms.</p>
          </div>

          <div class="row">
            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-1-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  User Accounts
                  </h4>
                  <ul>
                    <li>
                    Recruiters and Candidates must create an account and verify their email address to access platform features.
                    </li>
                    <li>
                    Users are responsible for maintaining the confidentiality of their account information.
                    </li>
                    <li>
                    SmartRecruit.ng reserves the right to suspend or terminate any account found to be violating these Terms.
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-2-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                    Use of the Platform
                  </h4>
                  <ul>
                    <li>
                      Recruiters may search for candidates, view available profiles (CVs and video interviews), and purchase access to candidate contact information.
                    </li>
                    <li>
                      Candidates must complete their profiles and upload video interviews to be visible to recruiters.
                    </li>
                    <li>
                      Candidates must update their profiles at least once every 7 days to remain visible in search results.
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-3-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Payments
                  </h4>
                  <ul>
                    <li>
                      All payments are processed securely through Paystack.
                    </li>
                    <li>
                      Recruiters must purchase access to view candidate contact details.
                    </li>
                    <li>
                      Candidates may opt to pay a fee of ₦2,000 to have their profile featured.
                    </li>
                    <li>
                      Payments made on SmartRecruit.ng are non-refundable except where explicitly stated.
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-4-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Content Ownership
                  </h4>
                  <ul>
                    <li>
                    Candidates retain ownership of their submitted CVs, profile information, and video interviews.
                    </li>
                    <li>
                    Recruiters are granted access to candidate information only after purchase and may not distribute or misuse candidate data.
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-5-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Prohibited Activities
                  </h4>
                  <ul>Users are prohibited from:
                    <li>
                      Using the platform for unlawful purposes.
                    </li>
                    <li>
                      Attempting to access accounts belonging to others.
                    </li>
                    <li>
                      Sharing or misusing candidate or recruiter data.
                    </li>
                    <li>
                      Uploading false or misleading information.
                    </li>
                    Violations may result in immediate account suspension or legal action.
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-6-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Limitation of Liability
                  </h4>
                  <ul>
                    <li>
                    SmartRecruit.ng is not responsible for the hiring decisions made by recruiters or the employment outcomes of candidates.
                    </li>
                    <li>
                    We provide a platform to facilitate connections but do not guarantee recruitment results.
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-7-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Changes to Terms
                  </h4>
                  <ul>
                    <li>
                    We reserve the right to modify these Terms and Conditions at any time. Changes will be effective immediately upon posting. It is your responsibility to review the Terms periodically.
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none bg-primary text-primary-color"
                >
                  <i class="bi bi-8-circle"></i>
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                  Governing Law
                  </h4>
                  <ul>
                    <li>
                    These Terms are governed by the laws of the Federal Republic of Nigeria.
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </section>

@endsection
@push("js")

<script>
  // Advertisement
  const AdvertisementSwiper = new Swiper(".advertisement-carousel", {
        slidesPerView: 1,
        spaceBetween: 30,

        /*navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },*/

        breakpoints: {
          640: {
            slidesPerView: 1,
            spaceBetween: 30,
          },
          1024: {
            slidesPerView: 1,
            spaceBetween: 30,
          },
          1280: {
            slidesPerView: 1,
            spaceBetween: 30,
          },
        },

        autoplay:true,
      });
</script>
@endpush
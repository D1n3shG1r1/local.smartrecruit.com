@extends("app")
@section("contentbox")
<!-- Hero section | About Us -->
<section id="aboutus" class="relative overflow-hidden bg-primary text-primary-color pt-[120px] md:pt-[130px] lg:pt-[160px]">
    <div class="container">
        <div class="-mx-5 flex flex-wrap items-center">
            <div class="w-full px-5">
                <div class="scroll-revealed mx-auto max-w-[780px] text-center">
                    <h1 class="mb-6 text-3xl font-bold leading-snug text-primary-color sm:text-4xl sm:leading-snug lg:text-5xl lg:leading-tight">
                    Smart Recruit  Nigeria’s premier recruitment platform. 
                    </h1>

                    <p class="mx-auto mb-9 max-w-[600px] text-base text-primary-color sm:text-lg sm:leading-normal">
                    connecting top talent with leading employers across industries.
                    </p>

                <ul
                  class="mb-10 flex flex-wrap items-center justify-center gap-4 md:gap-5"
                >
                  <li>
                    <a href="javascript:void(0)" class="inline-flex items-center justify-center rounded-md bg-primary-color text-primary px-5 py-3 text-center text-base font-medium shadow-md hover:bg-primary-light-5 md:px-7 md:py-[14px]" role="button" onclick="openAuthModal('candidate');">Submit Resume</a>
                  </li>
                  
                  <li>
                    <a href="javascript:void(0)" class="inline-flex items-center justify-center rounded-md bg-primary-color text-primary px-5 py-3 text-center text-base font-medium shadow-md hover:bg-primary-light-5 md:px-7 md:py-[14px]" role="button" onclick="openAuthModal('employer');">Find Candidate</a>
                  </li>

                  <li>
                    <a href="javascript:boid(0)" class="video-popup-dk flex items-center gap-4 rounded-md bg-primary-color/[0.15] px-5 py-3 text-base font-medium text-primary-color hover:bg-primary-color hover:text-primary md:px-7 md:py-[14px]" role="button"
                      ><i class="lni lni-play text-lg/none"></i> Watch How to Use Video</a>
                  </li>
                </ul>
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
                <img
                  src="./assets/img/image-10.jpg"
                  alt="About image"
                  class="rounded-xl"
                />
              </figure>

              @php 
              if($ad["adActive"] > 0){
              @endphp
              
              <!-- advertisement swiper -->
              <section id="advertisement" class="section-area advertisement scroll-revealed max-w-[480px] mx-auto">
                <div class="container">
                  <div class="swiper advertisement-carousel common-carousel scroll-revealed">
                    <div class="swiper-wrapper">
                    @php
                    foreach($ad["adImages"] as $imageName){
                    $imagePath = route('private.adimage', ['filename' => $imageName]);
                    @endphp
                      <div class="swiper-slide">
                        <div style="background: transparent;" class="bg-body-light-1 dark:bg-body-dark-12/10 shadow-card-2 sm:px-8-dk"
                        >
                          <figure class="flex-dk items-center gap-4">
                            <div class="dk-h-[500px] dk-w-[700px] overflow-hidden">
                              <img
                                src="{{$imagePath}}"
                                alt=""
                                class="h-full w-full rounded-xl rounded-full-dk object-cover-dk"
                              />
                            </div>
                          </figure>
                        </div>
                      </div>
                      @php
                    }
                    @endphp
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
            @php        
            }
            @endphp
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
@endsection
@push("js")
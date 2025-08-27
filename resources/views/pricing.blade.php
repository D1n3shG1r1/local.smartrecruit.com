@extends("app")
@section("contentbox")

<!-- Hero section | About Us -->
<section id="aboutus" class="relative overflow-hidden bg-primary text-primary-color pt-[120px] md:pt-[130px] lg:pt-[160px]">
    <div class="container">
        <div class="-mx-5 flex flex-wrap items-center">
        <div class="w-full px-5">
            <div class="scroll-revealed mx-auto max-w-[780px] text-center">
            <h1 class="mb-6 text-3xl font-bold leading-snug text-primary-color sm:text-4xl sm:leading-snug lg:text-5xl lg:leading-tight">
            Pricing & Plans for Recruiter
            </h1>

            <p class="mx-auto mb-9 max-w-[600px] text-base text-primary-color sm:text-lg sm:leading-normal">
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
                src="./assets/img/image-10.jpg"
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
@endsection
@push("js")
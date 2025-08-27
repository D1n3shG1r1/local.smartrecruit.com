@extends("app")
@section("contentbox")

<!-- Hero section | About Us -->
<section id="aboutus" class="relative overflow-hidden bg-primary text-primary-color pt-[120px] md:pt-[130px] lg:pt-[160px]">
    <div class="container">
        <div class="-mx-5 flex flex-wrap items-center">
        <div class="w-full px-5">
            <div class="scroll-revealed mx-auto max-w-[780px] text-center">
            <h1 class="mb-6 text-3xl font-bold leading-snug text-primary-color sm:text-4xl sm:leading-snug lg:text-5xl lg:leading-tight">
            Terms of Service
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
                src="./assets/img/image-19.jpg"
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
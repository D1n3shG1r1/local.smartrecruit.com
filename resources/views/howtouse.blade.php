@extends("app")
@section("contentbox")
<!-- Hero section | About Us -->
<section id="aboutus" class="relative overflow-hidden bg-primary text-primary-color pt-[120px] md:pt-[130px] lg:pt-[160px]">
    <div class="container">
        <div class="-mx-5 flex flex-wrap items-center">
        <div class="w-full px-5">
            <div class="scroll-revealed mx-auto max-w-[780px] text-center">
            <h1 class="mb-6 text-3xl font-bold leading-snug text-primary-color sm:text-4xl sm:leading-snug lg:text-5xl lg:leading-tight">
                How to Use SmartRecruit.ng
            </h1>

            <p class="mx-auto mb-9 max-w-[600px] text-base text-primary-color sm:text-lg sm:leading-normal">
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
                src="./assets/img/image-11.jpg"
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
@endsection
@push("js")
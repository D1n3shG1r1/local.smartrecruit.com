@extends("app")
@section("contentbox")

<style>
@media (min-width: 1024px) {
    .lg\:pt-\[72px\] {
        padding-top: 72px;
    }
}

@media (min-width: 768px) {
    .md\:pt-\[62px\] {
        padding-top: 62px;
    }
}

.pt-\[70px\] {
    padding-top: 70px;
}

.thkLogInBtn{
    --tw-bg-opacity: 1;
    background-color: rgb(61 99 221 / var(--tw-bg-opacity));
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
}

</style>
      <!-- Hero section | About Us -->
      <section id="aboutus" class="relative overflow-hidden bg-primary text-primary-color dkpt-[120px] dkmd:pt-[130px] dklg:pt-[160px] pt-[70px] md:pt-[62px] lg:pt-[72px]"></section>

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
            </div>

            <div class="w-full">
              <div class="scroll-revealed" style="visibility: visible;">
                <h2 class="mb-6">Thank You for Verifying!</h2>
              </div>
              

              <div class="tabs scroll-revealed" style="visibility: visible;">
                

                <div class="ttabs-content mt-4" >
                  
                  @if($role == 1)
                  <p>Your account has been successfully verified. You can now log in and start applying for jobs!</p>
                  @else
                  <p>Your recruiter account has been successfully verified.
                  You can now log in to connect with top talent.</p>                    
                  @endif
                </div>

                <nav class="tabs-nav flex flex-wrap gap-4 my-8">

                @if($role == 1)
                  <button
                    type="button"
                    class="tabs-linkk thkLogInBtn inline-block py-2 px-4 rounded-md text-body-light-12 dark:text-body-dark-12 bg-body-light-12/10 dark:bg-body-dark-12/10 text-inherit font-medium hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color"
                    onclick="openAuthModal('candidate');">Submit Resume
                  </button>
                @else
                  <button
                    type="button"
                    class="tabs-linkk thkLogInBtn inline-block py-2 px-4 rounded-md text-body-light-12 dark:text-body-dark-12 bg-body-light-12/10 dark:bg-body-dark-12/10 text-inherit font-medium hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color"
                    onclick="openAuthModal('employer');">Find Candidate
                  </button>
                @endif
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
@push("js")
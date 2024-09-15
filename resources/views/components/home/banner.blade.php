@if(isset($banner) && $banner != null)
    <!-- Banner start-->
    <section class="home-banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 home-banner-left-column">
                    <!-- <div class="section-title-2" style="text-shadow: 0 0 20px black">
                        <h2 class="text-white">{{ $banner->{'title_'.app()->getLocale()} }}</h2>
                        <p class="text-white">{{ $banner->{'description_'.app()->getLocale()} }}</p>
                        @if(isset($phone_numbers) && count($phone_numbers) > 0)
                            <a class="btn btn-base mt-5 mb-3" href="tel:{{ $phone_numbers[0]['value_'.app()->getLocale()] }}">{{ $phone_numbers[0]['value_'.app()->getLocale()] }}<i class="fa fa-phone ml-2" aria-hidden="true"></i></a>
                        @endif
                    </div>    -->
                    <h1 class="mb-4">Fast & Reliable Home Services in Toulouse – Just a Call Away!</h1>
                    <p>From urgent repairs to routine maintenance, our expert team is ready to assist you 24/7. Don’t wait—get the help you need now!</p>
                    <p class="text-primary mt-3">Do you need an urgent service ?</p>
                    <a href="/{{app()->getLocale()}}/contacts" class="contacts-btn my-4">
                    Call Now for Immediate Assistance
                        <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-2">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.20024 0C1.64107 0 1.09064 0.201675 0.673187 0.582022C0.253197 0.964914 0 1.50229 0 2.08123C0 2.66018 0.253102 3.19747 0.673092 3.58036L6.28019 8.69064C6.46671 8.86063 6.46671 9.15417 6.28019 9.32415L0.667601 14.4394L0.662199 14.4445C0.25322 14.8305 0.0108525 15.3649 0.0163097 15.9373C0.0217669 16.5096 0.274136 17.0393 0.689456 17.4178C1.10224 17.794 1.64528 17.9956 2.19829 17.9999C2.75128 18.0043 3.29734 17.8114 3.71635 17.4426L3.72191 17.4377L11.327 10.5064C11.747 10.1235 12 9.58634 12 9.0074C12 8.42845 11.7469 7.89116 11.3269 7.50827L3.72729 0.582022C3.30984 0.201675 2.7594 0 2.20024 0Z" fill="white"/>
                        </svg>
                    </a>
                    <p class="text-muted mt-5">Trusted by millions across the France:</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ $image_path }}/cta/home-banner-img.png" alt="banner-img" />
                </div>
                <img src="{{ $image_path }}/cta/home-banner-line.png" alt="line" class="home-banner-line" />
            </div>
        </div>
    </section>
    <!-- Banner End-->
@endif

<div class="container position-relative">
    <div class="footer-top-block mt-n5">
    <div>
        <p class="footer-top-block-title">Schedule Your Service with Ease</p>
        <p class="footer-top-block-desc">Whether you need a quick fix or a comprehensive solution, booking with Urgent SVC is simple. Just give us a call, and we’ll handle the rest.</p>
    </div>
        <a href="tel:0525680425">
        Call Now to Book Your Service
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.6676 15.6353L16.562 13.7401C16.8172 13.488 17.14 13.3154 17.4913 13.2433C17.8426 13.1712 18.2072 13.2027 18.541 13.334L20.8498 14.2562C21.1871 14.3931 21.4763 14.6269 21.681 14.928C21.8857 15.2292 21.9967 15.5842 22 15.9483V20.1786C21.998 20.4263 21.946 20.6711 21.847 20.8981C21.748 21.1252 21.6041 21.3298 21.4239 21.4998C21.2438 21.6697 21.0311 21.8015 20.7987 21.887C20.5663 21.9726 20.3191 22.0102 20.0718 21.9976C3.89312 20.9908 0.628639 7.28462 0.0112629 2.03904C-0.0173962 1.78145 0.00878882 1.5207 0.0880951 1.27396C0.167401 1.02721 0.298031 0.800064 0.471392 0.607453C0.644752 0.414841 0.856914 0.261133 1.09392 0.156441C1.33092 0.0517482 1.5874 -0.00155604 1.84648 3.45777e-05H5.93131C6.29582 0.00111397 6.65168 0.111264 6.9531 0.316317C7.25453 0.52137 7.48774 0.811949 7.62275 1.15068L8.54458 3.46043C8.68011 3.79299 8.71469 4.15812 8.644 4.51023C8.5733 4.86233 8.40047 5.1858 8.14709 5.44021L6.25268 7.33539C6.25268 7.33539 7.34366 14.7215 14.6676 15.6353Z" fill="white"/>
            </svg>
        </a>
    </div>
    <img src="{{ $image_path }}/contact/contact-info-block-bg.png" class="call-block-bg-img" alt="image">
</div>
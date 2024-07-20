<div class="contact-info-block">
    <div class="section-title text-center">
{{--        <h2 class="text-navy">{{ translating('contact-information') }}</h2>--}}
        @if(app()->getLocale() == 'fr')
            <h2 class="text-navy"><span class="text-gradient">Informations</span></h2>
        @else
            <h2 class="text-navy"><span class="text-gradient">Contact</span> information</h2>
        @endif
        <p class="contact-info-description">{{ translating('contact-us-description') }}</p>
    </div>
    <div class="row contact-info-row position-relative px-4 pb-5 mt-5">
        <div class="col-lg-6 col-md-6">
            <div class="contact-info-box">
                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.6676 15.936L16.562 14.0409C16.8172 13.7888 17.14 13.6162 17.4913 13.5441C17.8426 13.472 18.2072 13.5035 18.541 13.6347L20.8498 14.557C21.1871 14.6939 21.4763 14.9277 21.681 15.2288C21.8857 15.5299 21.9967 15.8849 22 16.2491V20.4794C21.998 20.7271 21.946 20.9718 21.847 21.1989C21.748 21.426 21.6041 21.6306 21.4239 21.8006C21.2438 21.9705 21.0311 22.1022 20.7987 22.1878C20.5663 22.2734 20.3191 22.311 20.0718 22.2984C3.89312 21.2916 0.628639 7.58541 0.0112629 2.33982C-0.0173962 2.08223 0.00878882 1.82148 0.0880951 1.57474C0.167401 1.32799 0.298031 1.10085 0.471392 0.908234C0.644752 0.715623 0.856914 0.561915 1.09392 0.457222C1.33092 0.352529 1.5874 0.299225 1.84648 0.300816H5.93131C6.29582 0.301895 6.65168 0.412045 6.9531 0.617098C7.25453 0.822152 7.48774 1.11273 7.62275 1.45146L8.54458 3.76121C8.68011 4.09377 8.71469 4.45891 8.644 4.81101C8.5733 5.16312 8.40047 5.48658 8.14709 5.74099L6.25268 7.63617C6.25268 7.63617 7.34366 15.0223 14.6676 15.936Z" fill="url(#paint0_linear_41_5561)"/>
                    <defs>
                        <linearGradient id="paint0_linear_41_5561" x1="-121.5" y1="14.3008" x2="13.9463" y2="31.876" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#007DAA"/>
                            <stop offset="0.626806" stop-color="#15B2FF"/>
                        </linearGradient>
                    </defs>
                </svg>
                @if(isset($phone_numbers) && count($phone_numbers) > 0)
                    @foreach($phone_numbers as $phone_number)
                        <a href="tel:{{ $phone_number->{'value_'.app()->getLocale()} }}">{{ $phone_number->{'value_'.app()->getLocale()} }}</a>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="contact-info-box">
                <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.3335 0.967453H2.66683C1.3835 0.967453 0.345163 2.01745 0.345163 3.30079L0.333496 17.3008C0.333496 18.5841 1.3835 19.6341 2.66683 19.6341H21.3335C22.6168 19.6341 23.6668 18.5841 23.6668 17.3008V3.30079C23.6668 2.01745 22.6168 0.967453 21.3335 0.967453ZM20.8668 5.92579L12.6185 11.0825C12.2452 11.3158 11.7552 11.3158 11.3818 11.0825L3.1335 5.92579C3.01651 5.86012 2.91407 5.77139 2.83237 5.66498C2.75066 5.55857 2.6914 5.43669 2.65817 5.30672C2.62493 5.17674 2.61842 5.04138 2.63901 4.90881C2.65961 4.77624 2.70689 4.64924 2.77799 4.53547C2.84909 4.42171 2.94254 4.32355 3.05268 4.24695C3.16281 4.17034 3.28735 4.11688 3.41874 4.0898C3.55014 4.06272 3.68566 4.06258 3.81711 4.08939C3.94856 4.1162 4.0732 4.16941 4.1835 4.24579L12.0002 9.13412L19.8168 4.24579C19.9271 4.16941 20.0518 4.1162 20.1832 4.08939C20.3147 4.06258 20.4502 4.06272 20.5816 4.0898C20.713 4.11688 20.8375 4.17034 20.9476 4.24695C21.0578 4.32355 21.1512 4.42171 21.2223 4.53547C21.2934 4.64924 21.3407 4.77624 21.3613 4.90881C21.3819 5.04138 21.3754 5.17674 21.3422 5.30672C21.3089 5.43669 21.2497 5.55857 21.168 5.66498C21.0863 5.77139 20.9838 5.86012 20.8668 5.92579Z" fill="#00A4F4"/>
                </svg>
                @if(isset($emails) && count($emails) > 0)
                    @foreach($emails as $email)
                        <a href="mailto:{{ $email->{'value_'.app()->getLocale()} }}">{{ $email->{'value_'.app()->getLocale()} }}</a>
                    @endforeach
                @endif
            </div>
        </div>
        <img src="{{ $image_path }}/contact/contact-info-block-bg.png" class="contact-info-block-bg" alt="image" />
    </div>
</div>

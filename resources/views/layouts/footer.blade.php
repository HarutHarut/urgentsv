 <!-- footer area start -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-5 col-sm-6">
                <div class="footer-widget widget">
                    <a class="logo" href="{{ route('home', ['locale' => app()->getLocale()]) }}"><img src="{{ $image_path }}/footer-logo.png" alt="{{ $site_data->{'title_'.app()->getLocale()} }}"></a>
                    <p class="pr-5">Your trusted partner in emergency situations.</p>
                    <a href="tel:0525680425" class="text-primary">
                        <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 8px; width: 18px;">
                            <path d="M14.6676 15.936L16.562 14.0409C16.8172 13.7888 17.14 13.6162 17.4913 13.5441C17.8426 13.472 18.2072 13.5035 18.541 13.6347L20.8498 14.557C21.1871 14.6939 21.4763 14.9277 21.681 15.2288C21.8857 15.5299 21.9967 15.8849 22 16.2491V20.4794C21.998 20.7271 21.946 20.9718 21.847 21.1989C21.748 21.426 21.6041 21.6306 21.4239 21.8006C21.2438 21.9705 21.0311 22.1022 20.7987 22.1878C20.5663 22.2734 20.3191 22.311 20.0718 22.2984C3.89312 21.2916 0.628639 7.58541 0.0112629 2.33982C-0.0173962 2.08223 0.00878882 1.82148 0.0880951 1.57474C0.167401 1.32799 0.298031 1.10085 0.471392 0.908234C0.644752 0.715623 0.856914 0.561915 1.09392 0.457222C1.33092 0.352529 1.5874 0.299225 1.84648 0.300816H5.93131C6.29582 0.301895 6.65168 0.412045 6.9531 0.617098C7.25453 0.822152 7.48774 1.11273 7.62275 1.45146L8.54458 3.76121C8.68011 4.09377 8.71469 4.45891 8.644 4.81101C8.5733 5.16312 8.40047 5.48658 8.14709 5.74099L6.25268 7.63617C6.25268 7.63617 7.34366 15.0223 14.6676 15.936Z" fill="url(#paint0_linear_41_5561)"></path>
                            <defs>
                                <linearGradient id="paint0_linear_41_5561" x1="-121.5" y1="14.3008" x2="13.9463" y2="31.876" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#007DAA"></stop>
                                    <stop offset="0.626806" stop-color="#15B2FF"></stop>
                                </linearGradient>
                            </defs>
                        </svg>
                        0525680425
                    </a>
                    <!-- @if(isset($addresses) && count($addresses) > 0)
                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            @foreach($addresses as $address)
                                <span>{{ $address->{'value_'.app()->getLocale()} }}</span>
                            @endforeach
                        </p>
                    @endif -->

                    <!-- @if(isset($user_phone))
                        <p>
                            <i class="fas fa-phone-alt"></i>
                                <a class="hov-yellow" href="tel:{{ $user_phone }}">{{ $user_phone }}</a>
                        </p>
                    @endif

                    @if(isset($emails) && count($emails) > 0)
                        <p>
                            <i class="far fa-envelope"></i>
                            @foreach($emails as $email)
                                <a class="hov-yellow" href="mailto: {{ $email->{'value_'.app()->getLocale()} }}">{{ $email->{'value_'.app()->getLocale()} }}</a>
                            @endforeach
                        </p>
                    @endif -->
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                <div class="footer-widget widget widget_link">
                    <h4 class="widget-title">{{ translating('links') }}</h4>
                    @if(isset($footer_links) && count($footer_links) > 0)
                    <ul>
                        @foreach($footer_links as $footer_link)
                            <li><a href="{{ $footer_link->url }}">{{ $footer_link->{'title_'.app()->getLocale()} }}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-3 col-sm-6">
                <div class="footer-widget widget widget_link">
                    <h4 class="widget-title">{{ translating('services') }}</h4>
                    @if(isset($services) && count($services) > 0)
                        <ul>
                            @foreach($services as $service)
                                 @php
                                    $title_arr = explode(' | ', $service->{'title_'.app()->getLocale()});

                                    if(isset($title_arr[0]) && $title_arr[0] != NULL){
                                        $title = $title_arr[0];
                                    }
                                    else{
                                        $title = $service->{'title_'.app()->getLocale()};
                                    }
                                @endphp
                                <li><a href="{{ route('services', ['locale' => app()->getLocale()]) }}">{{ $title }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <!-- <div class="col-xl-4 col-lg-5 col-sm-6">
                <div class="footer-widget widget widget_contact">
                    <h4 class="widget-title">{{ translating('contact-us') }}</h4>
                    {{-- <p>{{ translating('site-slogan') }}</p> --}}
                    @if(isset($user_number))
                        <p>
                            <i class="fas fa-phone-alt"></i>
                                <a class="hov-yellow" href="tel:{{ $user_number }}">{{ $user_number }}</a>
                        </p>
                    @endif
                    <div class="social-area-footer">
                        <span>{{ translating('follow-us') }}</span>
                        @if(isset($social_accounts) && count($social_accounts) > 0)
                            <ul>
                                @foreach($social_accounts as $social_account)
                                    <li><a rel="nofollow" target="_blank" href="{{ $social_account->url }}"><i class="fab fa-{{ $social_account->icon }}"></i></a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <div class="footer-bottom px-2">
        <div class="container">
            <div class="row justify-content-between py-3">
                @if(isset($social_accounts) && count($social_accounts) > 0)
                    <ul>
                        @foreach($social_accounts as $social_account)
                            <li><a rel="nofollow" target="_blank" href="{{ $social_account->url }}"><i class="fab fa-{{ $social_account->icon }}"></i></a></li>
                        @endforeach
                    </ul>
                @endif
                <p class="mb-0">{{ translating('all-rights-reserved') }}</p>
                <!-- <div class="col-12 align-self-center">
                    <div class="copyright-area w-100 text-center">
                        <p class="w-100">{{ translating('all-rights-reserved') }}</p>       
                        <ul style="list-style-type: none;" class="d-flex justify-content-center">
                            <li class="float-left ml-2 text-light"><a href="{{ route('terms-and-conditions', ['locale' => app()->getLocale()]) }}">{{ translating('terms-and-conditions') }}</a></li>
                            <li class="float-left ml-2 text-light"><a href="{{ route('politique-confidenalite', ['locale' => app()->getLocale()]) }}">{{ translating('privacy-policy') }}</a></li>
                            <li class="float-left ml-2 text-light"><a href="{{ route('cookie-policy', ['locale' => app()->getLocale()]) }}">{{ translating('cookie-policy') }}</a></li>
                            <li class="float-left ml-2 text-light"><a href="{{ route('code-de-conduite', ['locale' => app()->getLocale()]) }}">{{ translating('code-de-conduite') }}</a></li>
                        </ul>
                    </div>
                </div> -->
                <!-- <div class="col-md-6 col-sm-2 text-sm-right align-self-center">
                    <div class="back-to-top">
                        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
                    </div>
                </div> -->                
            </div>                
        </div>
    </div>

    <a href="tel:0525680425" class="sticky-call-btn">
        Call now
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14.6676 15.6353L16.562 13.7401C16.8172 13.488 17.14 13.3154 17.4913 13.2433C17.8426 13.1712 18.2072 13.2027 18.541 13.334L20.8498 14.2562C21.1871 14.3931 21.4763 14.6269 21.681 14.928C21.8857 15.2292 21.9967 15.5842 22 15.9483V20.1786C21.998 20.4263 21.946 20.6711 21.847 20.8981C21.748 21.1252 21.6041 21.3298 21.4239 21.4998C21.2438 21.6697 21.0311 21.8015 20.7987 21.887C20.5663 21.9726 20.3191 22.0102 20.0718 21.9976C3.89312 20.9908 0.628639 7.28462 0.0112629 2.03904C-0.0173962 1.78145 0.00878882 1.5207 0.0880951 1.27396C0.167401 1.02721 0.298031 0.800064 0.471392 0.607453C0.644752 0.414841 0.856914 0.261133 1.09392 0.156441C1.33092 0.0517482 1.5874 -0.00155604 1.84648 3.45777e-05H5.93131C6.29582 0.00111397 6.65168 0.111264 6.9531 0.316317C7.25453 0.52137 7.48774 0.811949 7.62275 1.15068L8.54458 3.46043C8.68011 3.79299 8.71469 4.15812 8.644 4.51023C8.5733 4.86233 8.40047 5.1858 8.14709 5.44021L6.25268 7.33539C6.25268 7.33539 7.34366 14.7215 14.6676 15.6353Z" fill="white"></path>
        </svg>
    </a>

    <!-- <div class="special-offer-banner">
        <div class="overlay"></div>
        <div class="special-offer-banner-wrapper">
            <div  class="special-offer-banner-top-block">
                <img src="{{ $image_path }}/special-offer-top-block.png" />
                <div class="special-offer-banner-content">
                    <svg width="32" height="21" viewBox="0 0 32 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M30.0279 9.65347L31.3974 11.0062L31.3806 8.28396L30.0279 9.65347ZM20.9094 16.1456L19.5567 17.515L22.2955 20.2204L23.6482 18.851L20.9094 16.1456ZM20.9262 3.36952L28.6753 11.023L31.3806 8.28396L23.6314 0.630484L20.9262 3.36952ZM28.6585 8.30076L20.9094 16.1456L23.6482 18.851L31.3974 11.0062L28.6585 8.30076Z" fill="#2D2D2D"/>
                        <path d="M30.0279 9.74902L0 9.74902" stroke="#2D2D2D" stroke-width="3.84974"/>
                    </svg>
                    <p class="text-gradient mt-n3">Get <span>10%</span></p>
                    <p class="text-gradient"><span>Off</span> Your</p>
                    <p class="text-gradient">First Service</p>
                    <a href="tel:0525680425">
                        Call Now
                        <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.20024 -3.1555e-09C1.64107 -2.35368e-09 1.09064 0.201675 0.673187 0.582022C0.253197 0.964914 2.15239e-09 1.50229 2.98258e-09 2.08123C3.81276e-09 2.66018 0.253102 3.19747 0.673092 3.58036L6.28019 8.69064C6.46671 8.86063 6.46671 9.15417 6.28019 9.32415L0.667601 14.4394L0.662199 14.4445C0.25322 14.8305 0.0108525 15.3649 0.0163097 15.9373C0.0217669 16.5096 0.274136 17.0393 0.689456 17.4178C1.10224 17.794 1.64528 17.9956 2.19829 17.9999C2.75128 18.0043 3.29734 17.8114 3.71635 17.4426L3.72191 17.4377L11.327 10.5064C11.747 10.1235 12 9.58634 12 9.0074C12 8.42845 11.7469 7.89116 11.3269 7.50827L3.72729 0.582022C3.30984 0.201675 2.7594 -3.95731e-09 2.20024 -3.1555e-09Z" fill="white"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="special-offer-banner-bottom-block">
                <img src="{{ $image_path }}/special-offer-bottom-block.png" />
            </div>
        </div>
    </div> -->
</footer>
<!-- footer area end -->
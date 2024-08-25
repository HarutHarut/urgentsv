 <!-- footer area start -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-5 col-sm-6">
                <div class="footer-widget widget">
                    <a class="logo" href="{{ route('home', ['locale' => app()->getLocale()]) }}"><img src="{{ $image_path }}/footer-logo.png" alt="{{ $site_data->{'title_'.app()->getLocale()} }}"></a>
                    <p class="pr-5">Your trusted partner in emergency situations.</p>
                    <a href="#0525680425" class="text-primary">
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
</footer>
<!-- footer area end -->
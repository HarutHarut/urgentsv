 <!-- footer area start -->
<div class="container">
    <div class="footer-top-block">
        <p>Easily book an appointment in 1 simple step.</p>
        <a href="tel:0525680425">
            Contact Now
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.6676 15.6353L16.562 13.7401C16.8172 13.488 17.14 13.3154 17.4913 13.2433C17.8426 13.1712 18.2072 13.2027 18.541 13.334L20.8498 14.2562C21.1871 14.3931 21.4763 14.6269 21.681 14.928C21.8857 15.2292 21.9967 15.5842 22 15.9483V20.1786C21.998 20.4263 21.946 20.6711 21.847 20.8981C21.748 21.1252 21.6041 21.3298 21.4239 21.4998C21.2438 21.6697 21.0311 21.8015 20.7987 21.887C20.5663 21.9726 20.3191 22.0102 20.0718 21.9976C3.89312 20.9908 0.628639 7.28462 0.0112629 2.03904C-0.0173962 1.78145 0.00878882 1.5207 0.0880951 1.27396C0.167401 1.02721 0.298031 0.800064 0.471392 0.607453C0.644752 0.414841 0.856914 0.261133 1.09392 0.156441C1.33092 0.0517482 1.5874 -0.00155604 1.84648 3.45777e-05H5.93131C6.29582 0.00111397 6.65168 0.111264 6.9531 0.316317C7.25453 0.52137 7.48774 0.811949 7.62275 1.15068L8.54458 3.46043C8.68011 3.79299 8.71469 4.15812 8.644 4.51023C8.5733 4.86233 8.40047 5.1858 8.14709 5.44021L6.25268 7.33539C6.25268 7.33539 7.34366 14.7215 14.6676 15.6353Z" fill="white"/>
            </svg>
        </a>
    </div>
</div>
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-5 col-sm-6">
                <div class="footer-widget widget">
                    <a class="logo" href="{{ route('home', ['locale' => app()->getLocale()]) }}"><img src="{{ $image_path }}/footer-logo.png" alt="{{ $site_data->{'title_'.app()->getLocale()} }}"></a>
                    <p class="pr-5">Your trusted partner in emergency situations.</p>
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
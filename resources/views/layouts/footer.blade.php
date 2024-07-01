 <!-- footer area start -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="footer-widget widget">
                    <a class="logo" href="{{ route('home', ['locale' => app()->getLocale()]) }}"><img src="{{ $image_path }}/{{ $site_data->logo }}" alt="{{ $site_data->{'title_'.app()->getLocale()} }}"></a>
                    @if(isset($addresses) && count($addresses) > 0)
                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            @foreach($addresses as $address)
                                <span>{{ $address->{'value_'.app()->getLocale()} }}</span>
                            @endforeach
                        </p>
                    @endif

                    @if(isset($user_phone))
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
                    @endif
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-sm-6">
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
                                <li><a href="{{ route('services', ['locale' => app()->getLocale()]) }}"><i class="fas fa-angle-double-right"></i>{{ $title }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <div class="footer-widget widget widget_link">
                    <h4 class="widget-title">{{ translating('links') }}</h4>
                    @if(isset($footer_links) && count($footer_links) > 0)
                    <ul>
                        @foreach($footer_links as $footer_link)
                            <li><a href="{{ $footer_link->url }}"><i class="fas fa-angle-double-right"></i>{{ $footer_link->{'title_'.app()->getLocale()} }}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-sm-6">
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
            </div>
        </div>
    </div>

    <div class="footer-bottom style-blue">
        <div class="container">
            <div class="row">
                <div class="col-12 align-self-center">
                    <div class="copyright-area w-100 text-center">
                        <p class="w-100">{{ translating('all-rights-reserved') }}</p>       
                        <ul style="list-style-type: none;" class="d-flex justify-content-center">
                            <li class="float-left ml-2 text-light"><a href="{{ route('terms-and-conditions', ['locale' => app()->getLocale()]) }}">{{ translating('terms-and-conditions') }}</a></li>
                            <li class="float-left ml-2 text-light"><a href="{{ route('politique-confidenalite', ['locale' => app()->getLocale()]) }}">{{ translating('privacy-policy') }}</a></li>
                            <li class="float-left ml-2 text-light"><a href="{{ route('cookie-policy', ['locale' => app()->getLocale()]) }}">{{ translating('cookie-policy') }}</a></li>
                            <li class="float-left ml-2 text-light"><a href="{{ route('code-de-conduite', ['locale' => app()->getLocale()]) }}">{{ translating('code-de-conduite') }}</a></li>
                        </ul>
                    </div>
                </div>
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
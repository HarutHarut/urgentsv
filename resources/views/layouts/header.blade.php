<!-- search popup area start -->
<div class="search-popup" id="search-popup">
    <form action="{{ route('search', ['locale' => app()->getLocale()]) }}" class="search-form">
        @csrf
        <div class="form-group">
            <input type="search" name="search" class="form-control" placeholder="{{ translating('search') }}.....">
        </div>
        <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
    </form>
</div>
<!-- //. search Popup -->

<!-- <div class="topbar-area topbar-area-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 align-self-center">
                <div class="topbar-left text-md-left text-center">
                    <span><img src="{{ $image_path }}/icon/clock-2.png" alt="img"><span>{{ translating('mot-sun') }}: {{ translating('9am-6am') }}</span></span>
                </div>
            </div>
            <div class="col-md-4 align-self-center text-md-right text-center d-none d-lg-block">
                <div class="topbar-right">
                    @if(isset($social_accounts) && count($social_accounts) > 0)
                        <ul class="social-area">
                            @foreach($social_accounts as $social_account)
                                <li><a href="{{ $social_account->url }}" target="_blank" rel="nofollow"><i class="fab fa-{{ $social_account->icon }}"></i></a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- navbar start -->
<div class="navbar-area navbar-area-2">
    <nav class="navbar navbar-expand-lg">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#themefie_main_menu"
                aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo">
                <a class="main-logo" href="{{ route('home', ['locale' => app()->getLocale()]) }}"><img src="{{ $image_path }}/header-logo.png" alt="{{ $site_data->{'name_'.app()->getLocale()} }}"></a>
            </div>
            <div class="collapse navbar-collapse" id="themefie_main_menu">
                <ul class="navbar-nav menu-open">
                    @if(isset($menu_items) && count($menu_items) > 0)
                        @foreach($menu_items as $menu_item)
                            <li class="current-menu-item">
                                <a href="{{ route($menu_item->url, ['locale' => app()->getLocale()]) }}">{{ $menu_item->{'title_'.app()->getLocale()} }}</a>
                            </li>
                        @endforeach
                    @endif
                    {{--
                    @if(isset($phone_numbers) && count($phone_numbers) > 0)
                        <li class="mr-0 no-border"><img class="d-inline-block" src="{{ $image_path }}/icon/phone.png" alt="{{ translating('phone') }}">
                            @foreach($phone_numbers as $phone_number)
                            <a class="d-inline-block ml-2" href="tel: {{ $phone_number->{'value_'.app()->getLocale()} }}"> {{ $phone_number->{'value_'.app()->getLocale()} }}</a>
                            @endforeach
                        <li>
                    @endif
                    --}}
                    <li class="mr-0 no-border">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.6676 15.6353L16.562 13.7401C16.8172 13.488 17.14 13.3154 17.4913 13.2433C17.8426 13.1712 18.2072 13.2027 18.541 13.334L20.8498 14.2562C21.1871 14.3931 21.4763 14.6269 21.681 14.928C21.8857 15.2292 21.9967 15.5842 22 15.9483V20.1786C21.998 20.4263 21.946 20.6711 21.847 20.8981C21.748 21.1252 21.6041 21.3298 21.4239 21.4998C21.2438 21.6697 21.0311 21.8015 20.7987 21.887C20.5663 21.9726 20.3191 22.0102 20.0718 21.9976C3.89312 20.9908 0.628639 7.28463 0.0112629 2.03904C-0.0173962 1.78145 0.00878882 1.5207 0.0880951 1.27396C0.167401 1.02721 0.298031 0.800064 0.471392 0.607453C0.644752 0.414841 0.856914 0.261133 1.09392 0.156441C1.33092 0.0517482 1.5874 -0.00155604 1.84648 3.45777e-05H5.93131C6.29582 0.00111397 6.65168 0.111264 6.9531 0.316317C7.25453 0.52137 7.48774 0.811949 7.62275 1.15068L8.54458 3.46043C8.68011 3.79299 8.71469 4.15813 8.644 4.51023C8.5733 4.86233 8.40047 5.1858 8.14709 5.44021L6.25268 7.33539C6.25268 7.33539 7.34366 14.7215 14.6676 15.6353Z" fill="#0084D4"/>
                        </svg>
                        <a class="d-inline-block ml-2 text-primary" href="tel: {{ $user_number }}"> {{ $user_number }}</a>
                    <li>

                    <li>
                        <a href="{{ route(\Request::route()->getName(), ['locale' => 'en']) }}" class="@if(app()->getLocale() == 'en') text-primary @endif">{{ translating('eng') }}</a>
                        <span>|</span>
                        <a href="{{ route(\Request::route()->getName(), ['locale' => 'fr']) }}" class="@if(app()->getLocale() == 'fr') text-primary @endif">{{ translating('fr') }}</a>
                    </li>

                    @auth
	                    <li class="current-menu-item">
                            <a href="{{ route('account', ['locale' => app()->getLocale()]) }}">{{ Auth::user()->name }}</a>
	                    </li>
                    @endauth

                    @guest
                        <li>
                            <a href="{{ route('register', ['locale' => app()->getLocale()]) }}" class="sign-up-btn">{{ translating('register') }}</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- navbar end -->

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

<div class="topbar-area topbar-area-2">
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
</div>

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
                <a class="main-logo" href="{{ route('home', ['locale' => app()->getLocale()]) }}"><img src="{{ $image_path }}/{{ $site_data->logo }}" alt="{{ $site_data->{'name_'.app()->getLocale()} }}"></a>
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

                    @auth
	                    <li class="current-menu-item">
                            <a href="{{ route('account', ['locale' => app()->getLocale()]) }}">{{ Auth::user()->name }}</a>
	                    </li>
                    @endauth

                    @guest
                    	<li class="current-menu-item">
                            <a href="{{ route('login', ['locale' => app()->getLocale()]) }}">{{ translating('login') }}</a> /
                    	</li>

                    	<li class="current-menu-item" style="margin-left: 0px;">
                    		<a href="{{ route('register', ['locale' => app()->getLocale()]) }}">{{ translating('register') }}</a>
                    	</li>
                    @endguest

                    <li>
                        <a href="{{ route(\Request::route()->getName(), ['locale' => 'en']) }}" class="@if(app()->getLocale() == 'en') text-primary @endif">{{ translating('eng') }}</a>
                        <span>|</span>
                        <a href="{{ route(\Request::route()->getName(), ['locale' => 'fr']) }}" class="@if(app()->getLocale() == 'fr') text-primary @endif">{{ translating('fr') }}</a>
                    </li>
                    {{--
                    @if(isset($phone_numbers) && count($phone_numbers) > 0)
                        <li class="mr-0 no-border"><img class="d-inline-block" src="{{ $image_path }}/icon/phone.png" alt="{{ translating('phone') }}">
                            @foreach($phone_numbers as $phone_number)
                            <a class="d-inline-block ml-2" href="tel: {{ $phone_number->{'value_'.app()->getLocale()} }}"> {{ $phone_number->{'value_'.app()->getLocale()} }}</a>
                            @endforeach
                        <li>
                    @endif
                    --}}
                    <li class="mr-0 no-border"><img class="d-inline-block" src="{{ $image_path }}/icon/phone.png" alt="{{ translating('phone') }}">
                        <a class="d-inline-block ml-2" href="tel: {{ $user_number }}"> {{ $user_number }}</a>
                    <li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- navbar end -->

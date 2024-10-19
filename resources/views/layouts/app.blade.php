<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LR5H5KP6HJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-LR5H5KP6HJ');
</script>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K7RBPGZZ');</script>
<!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <!-- || SEO START || -->

    <!-- Theme Color -->
    <meta name="theme-color" content="#FFFFFF">

    <!-- Alternate Links -->
    <link rel="alternate" hreflang="fr" href="{{ URL::to('/') }}/fr">
    <link rel="alternate" hreflang="en" href="{{ URL::to('/') }}/en">
    <link rel="alternate" hreflang="ru" href="{{ URL::to('/') }}/ru">

    <!-- Browser Bots -->
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">

    <!-- Robots -->
    <meta name="robots" content="index, follow">

    @if(\Request::route()->getName() == 'login' || \Request::route()->getName() == 'terms-and-conditions' || \Request::route()->getName() == 'register')
        <link rel="canonical" href="{{ route('home', ['locale' => app()->getLocale()]) }}">
    @else
        <link rel="canonical" href="{{ \Request::url() }}">
    @endif

    <!-- Open Graph Page Url -->
    <meta property="og:url" content="{{ \Request::url() }}">

    <!-- Open Graph Sitename -->
    <meta property="og:site_name" content="{{ $site_data['name_'.app()->getLocale()] }} - {{ URL::to('/') }}">

    <!-- Open Graph Image Sizes -->
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="800">

    <!-- Open Graph Localization -->
    <meta property="og:locale" content="{{app()->getLocale()}}_{{strtoupper(app()->getLocale())}}">

    @if(\Request::segment(2) == 'services' && \Request::segment(3) != NULL)
        <!-- Page Titile -->
        <title>{{ $service->{'meta_title_'.app()->getLocale()} }}</title>

        <!-- Open Graph Page Title -->
        <meta property="og:title" content="{{ $service->{'meta_title_'.app()->getLocale()} }}">

        <!-- Meta Description -->
        <meta name="description" content="{{ $service->{'meta_description_'.app()->getLocale()} }}">

        <!-- Open Graph Page Description -->
        <meta property="og:description" content="{{ $service->{'meta_description_'.app()->getLocale()} }}">

        <!-- Open Graph Image -->
        <meta property="og:image" content="{{ $image_path }}/services/{{ $service->img }}">
    @else
        @if(isset($seo) && $seo != null)
            <!-- Page Titile -->
            <title>{{ $seo->{'title_'.app()->getLocale()} }}</title>

            <!-- Open Graph Page Title -->
            <meta property="og:title" content="{{ $seo->{'title_'.app()->getLocale()} }}">

            <!-- Meta Description -->
            <meta name="description" content="{{ $seo->{'description_'.app()->getLocale()} }}">

            <!-- Open Graph Page Description -->
            <meta property="og:description" content="{{ $seo->{'description_'.app()->getLocale()} }}">

            <!-- Open Graph Image -->
            <meta property="og:image" content="{{ $image_path }}/seo/{{ $seo->img }}">
        @endif
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>


    <link rel="icon" type="image/icon" href="{{ $image_path }}/favicon.ico">


    <!-- Swet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10" defer></script>

    <!-- Google Site Verafication -->
    <meta name="google-site-verification" content="7WeDyAvs7QHytZ5zSd6VxWcn1NjVUv4Cpi4TgruCYM">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-195790894-1">
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-195790894-1');
    </script>

    <script>!function(e,o,t){e[t]=function(n,r){var c={sandbox:"https://sandbox-merchant.revolut.com/embed.js",prod:"https://merchant.revolut.com/embed.js",dev:"https://merchant.revolut.codes/embed.js"},d=o.createElement("script");d.id="revolut-checkout",d.src=c[r]||c.prod,d.async=!0,o.head.appendChild(d);var s={then:function(r,c){d.onload=function(){r(e[t](n))},d.onerror=function(){o.head.removeChild(d),c&&c(new Error(t+" is failed to load"))}}};return"function"==typeof Promise?Promise.resolve(s):s}}(window,document,"RevolutCheckout");</script>

</head>
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K7RBPGZZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    @include('layouts.preloader')

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

    @include('layouts.call-now')
    <!-- all plugins here -->
    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous"></script>

    <!-- main js  -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>

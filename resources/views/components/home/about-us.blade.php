@if(isset($about_us) && $about_us != null)
<!-- about-Area Start-->
<section class="about-area about-area-2 pd-top-100 pd-bottom-110" style="background: url({{ $image_path }}/about/bg-2.png)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="thumb">
                    <img src="{{ $image_path }}/about/{{ $about_us->img }}" alt="{{ $about_us->{'title_'.app()->getLocale()} }}">
                </div>                   
            </div>
            <div class="col-lg-7">
                <div class="about-inner mt-5 mt-lg-0">
                    <div class="section-title mb-0">
                        <h5>{{ $about_us->{'sub_title_'.app()->getLocale()} }}</h5>
                        <h2 class="mb-3">{{ $about_us->{'title_'.app()->getLocale()} }}</h2>
                        <p class="w-100 d-block">{{ html_entity_decode(strip_tags(nl2br(e($about_us->{'description_'.app()->getLocale()})))) }}</p>
                    </div>
                    <p class="clear-both"></p>
                    <div class="btn-area d-block w-100">
                        <a class="btn btn-base mt-3" href="{{ route('about-us', ['locale' => app()->getLocale()]) }}">{{ translating('more-about-us') }}<i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>      
</section>
<!-- about-Area End-->
@endif
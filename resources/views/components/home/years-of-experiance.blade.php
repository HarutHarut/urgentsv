@if(isset($years_of_experiance) && $years_of_experiance != null)
<!-- Years Of Experiance Start-->
<!-- <section class="experience-area pd-bottom-50" style="background: url({{ $image_path }}/other/experience.png)">
    <div class="container">
        <div class="experience-inner">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="details">
                        <p class="sub-title">{{ translating('urgance-name') }}</p>
                        <h3 class="title">{{ $years_of_experiance->{'title_'.app()->getLocale()} }}</h3>
                        <p>{!! $years_of_experiance->{'description_'.app()->getLocale()} !!}</p>
                        <a class="btn btn-base" href="{{  route('about-us', ['locale' => app()->getLocale()]) }}">{{ translating('more-about-us') }}<i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i></a>
                        <span class="year">{{ $years_of_experiance->year }} {{ translating('years') }}</span>
                    </div>
                </div>
                <div class="col-lg-6 text-center d-none d-lg-block">
                    <div class="thumb h-100">
                        <img class="h-100" src="{{ $image_path }}/other/{{ $years_of_experiance->img }}" alt="{{ $years_of_experiance->{'title_'.app()->getLocale()} }}">
                    </div>
                </div>
            </div>
        </div>
    </div>      
</section> -->
<div class="container">
    <div class="get-know">
        <h2 class="text-center"><span class="text-gradient">Urgentcsvc’s Story:</span> Get to know us</h2>
        <div class="row mt-5">
            <div class="col-lg-6">
                <img src="{{ $image_path }}/other/get-know-img.png" class="responsive mx-auto d-block" />
            </div>
            <div class="col-lg-6">
                <div class="get-know-content">{!! $years_of_experiance->{'description_'.app()->getLocale()} !!}</div>
                <p class="large-text">More than <span class="text-gradient">10+ years</span> in emergency situations.</p>
                <a href="{{  route('about-us', ['locale' => app()->getLocale()]) }}">Learn more about us</a>
            </div>
        </div>
    </div>
</div>
<!-- Years Of Experiance End-->
@endif
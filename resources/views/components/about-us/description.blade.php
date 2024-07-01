<!-- About Us Description Start-->
<section class="about-area pd-top-100 pd-bottom-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 d-md-block d-none">
                <div class="thumb">
                    <img src="{{ $image_path }}/about/{{ $description->img }}" alt="img">
                </div>                   
            </div>
            <div class="col-lg-7">
                <div class="about-inner">
                    <div class="section-title mb-0">
                        <h2>{{ $description->{'title_'.app()->getLocale()} }}</h2>
                        <p>{!! $description->{'description_'.app()->getLocale()} !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>      
</section>
<!-- About Us Description End-->
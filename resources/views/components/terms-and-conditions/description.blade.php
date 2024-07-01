<!-- About Us Description Start-->
<section class="about-area pd-top-100 pd-bottom-100">
    <div class="container">
        <div class="about-inner">
            <div class="section-title mb-0">
                <h2>{{ $description->{'title_'.app()->getLocale()} }}</h2>
                <p>{!! $description->{'description_'.app()->getLocale()} !!}</p>
            </div>
        </div>
    </div>      
</section>
<!-- About Us Description End-->
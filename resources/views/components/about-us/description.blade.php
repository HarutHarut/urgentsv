<!-- About Us Description Start-->
<div class="content-wrapper">
    <section class="about-area pd-top-100 pd-bottom-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 d-md-block d-none">
                    <div class="thumb">
                        <img src="{{ $image_path }}/about/{{ $description->img }}" alt="img">
                    </div>                   
                </div>
                <div class="col-lg-6 pl-4">
                    <div class="about-inner">
                        <div class="section-title mb-0">
                            <h1>{{ $description->{'title_'.app()->getLocale()} }}</h1>
                            <p>{!! $description->{'description_'.app()->getLocale()} !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @include('components.contacts.info')
        </div>      
    </section>
</div>
<!-- About Us Description End-->
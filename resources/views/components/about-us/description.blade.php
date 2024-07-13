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
{{--                            <h1>{{ $description->{'title_'.app()->getLocale()} }}</h1>--}}
                            @if(app()->getLocale() == 'fr')
                                <h1>Nous sommes <span class="text-gradient">De services d'urgence</span></h1>
                            @else
                                <h1>We are <span class="text-gradient">Urgent-service provider</span></h1>
                            @endif
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

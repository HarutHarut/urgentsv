@if(isset($galleries) && count($galleries) > 0)
<!-- Gallery Start-->
<section class="recent-project-area pd-bottom-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h2 class="title">{{ translating('gallery-section-title') }}</h2>
                    <p>{{ translating('gallery-section-description') }}</p>
                </div>                    
            </div>
        </div>
        <div class="row justify-content-center">
                @foreach($galleries as $gallery)
                <div class="col-lg-4 col-md-6">
                    <div class="single-project-inner">
                        <div class="thumb">
                            <img src="{{ $image_path }}/gallery/{{ $gallery->img }}" alt="{{ $site_data->{'name_'.app()->getLocale()} }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>      
</section>
<!-- Gallery End-->
@endif
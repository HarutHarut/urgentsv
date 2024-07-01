@if(isset($services) && count($services) > 0)
    <!-- Services Start-->
    <div class="service-area-2 text-center pd-bottom-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="service-slider-2 owl-carousel">
                        @foreach($services as $service)
                            <div class="item">
                                <div class="single-service-inner style-2">
                                    <div class="thumb">
                                        <img src="{{ $image_path }}/service/{{ $service->icon }}" alt="{{ $service->{'title_'.app()->getLocale()} }}">
                                    </div>
                                    <h4><a href="{{ route('services', ['locale' => app()->getLocale(), 'url' => $service->url]) }}">{{ $service->{'title_'.app()->getLocale()} }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End-->
@endif
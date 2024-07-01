@if(isset($slider_items) && count($slider_items) > 0)
<!-- Slider Start-->
<section class="banner-area banner-area-2 after-none text-center">
    <div class="banner-slider owl-carousel owl-theme">
        @foreach($slider_items as $slider_item)
            <div class="item" style="background: url({{ $image_path }}/slider/{{ $slider_item->img }});">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 align-self-center">
                            <div class="banner-inner">
                                <h1>{{ $slider_item->{'title_'.app()->getLocale()} }}</h1>
                                <p>{{ $slider_item->{'description_'.app()->getLocale()} }}</p>
                                @if(isset($phone_numbers) && count($phone_numbers) > 0)
                                    <a class="btn btn-base" href="tel:{{ $phone_numbers[0]['value_'.app()->getLocale()] }}">{{ $phone_numbers[0]['value_'.app()->getLocale()] }} <i class="fa fa-phone"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- Slider End -->
@endif

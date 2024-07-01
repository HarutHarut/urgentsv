@if(isset($banner) && $banner != null)
    <!-- Banner start-->
    <section class="cta-area my-banner cta-area-2 text-center" style="background: url({{ $image_path }}/cta/{{ $banner->img }})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title-2" style="text-shadow: 0 0 20px black">
                        <h2 class="text-white">{{ $banner->{'title_'.app()->getLocale()} }}</h2>
                        <p class="text-white">{{ $banner->{'description_'.app()->getLocale()} }}</p>
                        @if(isset($phone_numbers) && count($phone_numbers) > 0)
                            <a class="btn btn-base mt-5 mb-3" href="tel:{{ $phone_numbers[0]['value_'.app()->getLocale()] }}">{{ $phone_numbers[0]['value_'.app()->getLocale()] }}<i class="fa fa-phone ml-2" aria-hidden="true"></i></a>
                        @endif
                    </div>   
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End-->
@endif
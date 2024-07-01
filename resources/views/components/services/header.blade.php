@if(isset($seo) && $seo != NULL)
    <div class="breadcrumb-area" style="background-image:url({{ $image_path }}/seo/{{ $seo->img }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title text-center">
                            @if(\Request::segment(3) == NULL)
                                <h1 class="page-title pb-2">{{ translating('services') }}</h1>
                            @else
                                <h1 class="page-title pb-2">{{ $service->{'title_'.app()->getLocale()} }}</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="breadcrumb-area" style="background-image:url({{ $image_path }}/service/img/{{ $service->img }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title text-center">
                            @if(\Request::segment(3) == NULL)
                                <h1 class="page-title pb-2">{{ translating('services') }}</h1>
                            @else
                                <h1 class="page-title pb-2">{{ $service->{'title_'.app()->getLocale()} }}</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

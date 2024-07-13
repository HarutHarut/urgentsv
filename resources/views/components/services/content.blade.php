@if(isset($services) && count($services) > 0)
<div class="content-wrapper">
    <div class="why-choose-area-menu-area py-5 pd-bottom-50 mt-3">
        <div class="container">
            {{-- <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-4">
                        <h1 class="title">{{ $service->{'title_'.app()->getLocale()} }}</h1>
                    </div>                    
                </div>
            </div> --}}
            <!-- <ul class="row nav nav-pills klm-work-tab no-gutters">
                <li class="col-lg col-6">
                    <div class="single-klm-work-tab-wrap d-block active active" data-toggle="tab" data-target="#tab-{{ $service->id }}" data-hover="tab">
                        <div class="single-klm-work-tab" style="height: 160px;">
                            <img src="{{ $image_path }}/service/{{ $service->icon }}" alt="{{ $service->{'title_'.app()->getLocale()} }}">
                            <h6>{{ $service->{'title_'.app()->getLocale()} }}</h6>
                        </div>
                    </div>
                </li>
            </ul> -->

            <div class="tab-content single-klm-work-tab-content well">
                <div class="tab-pane active" id="tab-{{ $service->id }}">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="single-details">
                                <h1 class="mb-4">{{ $service->{'title_'.app()->getLocale()} }}</h1>
                                <p><span class="text-primary">Urgent svc is an 24/7 emergency company,</span> offering highly qualified services</p>
                                <div class="my-4">
                                    <p>{{ $service->{'description_'.app()->getLocale()} }}</p>
                                    @if(isset($service->items) && count($service->items) > 0)
                                        @foreach($service->items as $item)
                                            <div class="list">
                                                <div class="price">{{ $item->price }}</div>
                                                <div class="details align-self-center">
                                                    <h4>{{ $item->{'title_'.app()->getLocale()} }}</h4>
                                                    <p>{{ $item->{'description_'.app()->getLocale()} }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <p class="text-primary">Do you need an urgent service ?</p>
                            </div>
                        </div>
                        <div class="col-lg-6 pl-5">
                            <div class="work-vider-thumb" style="background: url({{ $image_path }}/service/img/{{ $service->img }})">
                                @if( isset($service->video) && $service->video != null)
                                    <a data-toggle="modal" data-target="#exampleModalCenter{{ $service->id }}" class="video-btn-play play-btn mfp-iframe" tabindex="0"><i class="fa fa-play" aria-hidden="true"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle{{ $service->id }}" aria-hidden="true">
                    <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content p-0">
                            <div class="modal-body p-0">
                                <div class="embed-responsive embed-responsive-16by9">
                                    {!! $service->video !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            @include('components.contacts.info')
        </div>
    </div>
</div>
@endif

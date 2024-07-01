@if(isset($services) && count($services) > 0)
    <div class="why-choose-area-menu-area bg-gray-2 pd-bottom-50 mt-3">
        <div class="container">
            {{--
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h2 class="title">{{ translating('services-title') }}</h2>
                        <p>{{ translating('services-description') }}</p>
                    </div>                    
                </div>
            </div>
            --}}
            <ul class="row nav nav-pills klm-work-tab no-gutters">
                @foreach($services as $key => $service)
                @php
                    $title_arr = explode(' | ', $service->{'title_'.app()->getLocale()});

                    if(isset($title_arr[0]) && $title_arr[0] != NULL){
                        $title = $title_arr[0];
                    }
                    else{
                        $title = $service->{'title_'.app()->getLocale()};
                    }
                @endphp
                    <li class="col-lg col-6">
                        <div class="single-klm-work-tab-wrap d-block @if($key == 'active') active @endif" data-toggle="tab" data-target="#tab-{{ $service->id }}" data-hover="tab">
                            <div class="single-klm-work-tab" style="height: 160px;">
                                <img src="{{ $image_path }}/service/{{ $service->icon }}" alt="{{ $service->{'title_'.app()->getLocale()} }}">
                                <h6>{{ $title }}</h6>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content single-klm-work-tab-content well">
                @foreach($services as $key => $service)
                @php
                    $title_arr = explode(' | ', $service->{'title_'.app()->getLocale()});

                    if(isset($title_arr[0]) && $title_arr[0] != NULL){
                        $title = $title_arr[0];
                    }
                    else{
                        $title = $service->{'title_'.app()->getLocale()};
                    }
                @endphp
                <div class="tab-pane @if($key == 0) active @endif" id="tab-{{ $service->id }}">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="work-vider-thumb" style="background: url({{ $image_path }}/service/img/{{ $service->img }})">
                                @if( isset($service->video) && $service->video != null)
                                    <a data-toggle="modal" data-target="#exampleModalCenter{{ $service->id }}" class="video-btn-play play-btn mfp-iframe" tabindex="0"><i class="fa fa-play" aria-hidden="true"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-details-work">
                                <h3>{{ $title}}</h3>
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
                                {{-- <a href="{{ route('services', ['locale' => app()->getLocale(), 'url' => $service->url]) }}" class="btn btn-base">{{ translating('see-more') }}</a> --}}
                                <a href="tel:0525680425" class="btn btn-base" title="0525680425">{{ translating('call-us') }}</a>
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
                @endforeach
            </div> 
        </div>
    </div>
@endif

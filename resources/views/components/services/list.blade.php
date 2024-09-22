<div class="content-wrapper">
    @if(isset($services) && count($services) > 0)
        <div class="why-choose-area-menu-area pd-bottom-50 mt-3">
            <div class="container">
                <!-- <h1 class="service-main-title text-center">Your <span class="text-gradient">trusted partner</span> in emergency situations.</h1> -->
                <div class="row justify-content-center my-lg-5">
                    <div class="col-lg-8">
                        <div class="section-title text-center mb-4">
{{--                            <h2 class="title">{{ translating('services-title') }}</h2>--}}

                            @if(app()->getLocale() == 'fr')
                                <h2 class="title">Prestations <span class="text-gradient">de service </span></h2>
                            @else
                                <h2 class="title">Our <span class="text-gradient">Services </span></h2>
                            @endif
                            <p>{{ translating('services-description') }}</p>
                        </div>
                    </div>
                </div>
                <div class="services-grid">
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
                        <div class="service-block">
                            <img src="{{ $image_path }}/service/img/{{ $service->img }}" class="service-main-image" alt="{{ $service->{'title_'.app()->getLocale()} }}" />
                            <div class="white-overlay"></div>
                            <div class="position-relative zmdi-500px">
                                <div class="service-icon">
                                    <img src="{{ $image_path }}/service/{{ $service->icon }}" alt="{{ $service->{'title_'.app()->getLocale()} }}">
                                </div>
                                <h6>{{ $title }}</h6>
                                <p>{{ $service->{'description_'.app()->getLocale()} }}</p>
                                <a href="/{{app()->getLocale()}}/services/{{$service->url}}" class="learn-more-btn">Book a service</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="service-contact-block">
                        <div>
                            <div class="service-contact-block-icon">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.6676 15.6353L16.562 13.7401C16.8172 13.488 17.14 13.3154 17.4913 13.2433C17.8426 13.1712 18.2072 13.2027 18.541 13.334L20.8498 14.2562C21.1871 14.3931 21.4763 14.6269 21.681 14.928C21.8857 15.2292 21.9967 15.5842 22 15.9483V20.1786C21.998 20.4263 21.946 20.6711 21.847 20.8981C21.748 21.1252 21.6041 21.3298 21.4239 21.4998C21.2438 21.6697 21.0311 21.8015 20.7987 21.887C20.5663 21.9726 20.3191 22.0102 20.0718 21.9976C3.89312 20.9908 0.628639 7.28462 0.0112629 2.03904C-0.0173962 1.78145 0.00878882 1.5207 0.0880951 1.27396C0.167401 1.02721 0.298031 0.800064 0.471392 0.607453C0.644752 0.414841 0.856914 0.261133 1.09392 0.156441C1.33092 0.0517482 1.5874 -0.00155604 1.84648 3.45777e-05H5.93131C6.29582 0.00111397 6.65168 0.111264 6.9531 0.316317C7.25453 0.52137 7.48774 0.811949 7.62275 1.15068L8.54458 3.46043C8.68011 3.79299 8.71469 4.15812 8.644 4.51023C8.5733 4.86233 8.40047 5.1858 8.14709 5.44021L6.25268 7.33539C6.25268 7.33539 7.34366 14.7215 14.6676 15.6353Z" fill="#0069AB"/>
                                </svg>
                            </div>
                            <p>Need an urgent service ?</p>
                            <h5>Contact now</h5>
                            <a href="tel:0525680452">0525680452</a>
                        </div>
                    </div>
                </div>
                <!-- <ul class="row nav nav-pills klm-work-tab no-gutters">
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
                </ul> -->

                <!-- <div class="tab-content single-klm-work-tab-content well">
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
                                    <h3>{{ $title }}</h3>
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
                </div>  -->
            </div>

            <div class="container">
                <div class="row why-choose-us-block">
                    <div class="col-md-5 text-center why-choose-us-img-column">
                        <img src="{{ $image_path }}/why-choose-us-img.png" alt="why-choose-us" />
                        <p><span class="text-gradient">Why</span> choose us?</p>
                    </div>
                    <div class="col-md-7 why-choose-us-list">
                        <div class="d-flex align-items-center why-choose-us-item">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.201538" y="4.09229" width="28" height="28" rx="4" fill="#EFF9FF"/>
                                <path d="M16.5591 21.5498L21.2013 23.4291C22.0515 23.7736 22.9369 22.9892 22.621 22.1815L20.8852 17.7492L24.3174 14.172C24.9441 13.5194 24.4314 12.5004 23.5047 12.5504L18.4149 12.7998L15.8873 8.72569C15.4317 7.98533 14.2216 8.14078 13.9679 8.97227L12.5508 13.5433L7.56328 14.5883C6.65398 14.7742 6.41553 15.8897 7.18677 16.3627L11.4117 18.9563L10.8525 23.6834C10.751 24.5447 11.806 25.0798 12.5415 24.5317L16.5591 21.5498Z" fill="#0069AB"/>
                            </svg>
                            <p><span>24/7 Availability</span><span>We’re here whenever you need us, day or night.<span></p>
                        </div>
                        <div class="d-flex align-items-center why-choose-us-item">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.201538" y="4.09229" width="28" height="28" rx="4" fill="#EFF9FF"/>
                                <path d="M16.5591 21.5498L21.2013 23.4291C22.0515 23.7736 22.9369 22.9892 22.621 22.1815L20.8852 17.7492L24.3174 14.172C24.9441 13.5194 24.4314 12.5004 23.5047 12.5504L18.4149 12.7998L15.8873 8.72569C15.4317 7.98533 14.2216 8.14078 13.9679 8.97227L12.5508 13.5433L7.56328 14.5883C6.65398 14.7742 6.41553 15.8897 7.18677 16.3627L11.4117 18.9563L10.8525 23.6834C10.751 24.5447 11.806 25.0798 12.5415 24.5317L16.5591 21.5498Z" fill="#0069AB"/>
                            </svg>
                            <p><span>Certified Experts</span><span>Skilled team with years of experience</span></p>
                        </div>
                        <div class="d-flex align-items-center why-choose-us-item">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.201538" y="4.09229" width="28" height="28" rx="4" fill="#EFF9FF"/>
                                <path d="M16.5591 21.5498L21.2013 23.4291C22.0515 23.7736 22.9369 22.9892 22.621 22.1815L20.8852 17.7492L24.3174 14.172C24.9441 13.5194 24.4314 12.5004 23.5047 12.5504L18.4149 12.7998L15.8873 8.72569C15.4317 7.98533 14.2216 8.14078 13.9679 8.97227L12.5508 13.5433L7.56328 14.5883C6.65398 14.7742 6.41553 15.8897 7.18677 16.3627L11.4117 18.9563L10.8525 23.6834C10.751 24.5447 11.806 25.0798 12.5415 24.5317L16.5591 21.5498Z" fill="#0069AB"/>
                            </svg>
                            <p><span>Transparent Pricing</span><span>No hidden fees—just honest, upfront pricing.</span></p>
                        </div>
                        <div class="d-flex align-items-center why-choose-us-item">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.201538" y="4.09229" width="28" height="28" rx="4" fill="#EFF9FF"/>
                                <path d="M16.5591 21.5498L21.2013 23.4291C22.0515 23.7736 22.9369 22.9892 22.621 22.1815L20.8852 17.7492L24.3174 14.172C24.9441 13.5194 24.4314 12.5004 23.5047 12.5504L18.4149 12.7998L15.8873 8.72569C15.4317 7.98533 14.2216 8.14078 13.9679 8.97227L12.5508 13.5433L7.56328 14.5883C6.65398 14.7742 6.41553 15.8897 7.18677 16.3627L11.4117 18.9563L10.8525 23.6834C10.751 24.5447 11.806 25.0798 12.5415 24.5317L16.5591 21.5498Z" fill="#0069AB"/>
                            </svg>
                            <p><span>Customer Satisfaction</span><span>Your comfort and safety are our top priorities.</span></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container mt-5">
                <div class="footer-top-block">
                    <div>
                        <p class="footer-top-block-title">Get in Touch Today!</p>
                        <p class="footer-top-block-desc">Whether you need immediate assistance or want to schedule a service, we’re just a call away. Contact Urgent SVC now to experience the best in home services</p>
                    </div>
                    <a href="tel:0525680425">
                    Call us 0525680452
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.6676 15.6353L16.562 13.7401C16.8172 13.488 17.14 13.3154 17.4913 13.2433C17.8426 13.1712 18.2072 13.2027 18.541 13.334L20.8498 14.2562C21.1871 14.3931 21.4763 14.6269 21.681 14.928C21.8857 15.2292 21.9967 15.5842 22 15.9483V20.1786C21.998 20.4263 21.946 20.6711 21.847 20.8981C21.748 21.1252 21.6041 21.3298 21.4239 21.4998C21.2438 21.6697 21.0311 21.8015 20.7987 21.887C20.5663 21.9726 20.3191 22.0102 20.0718 21.9976C3.89312 20.9908 0.628639 7.28462 0.0112629 2.03904C-0.0173962 1.78145 0.00878882 1.5207 0.0880951 1.27396C0.167401 1.02721 0.298031 0.800064 0.471392 0.607453C0.644752 0.414841 0.856914 0.261133 1.09392 0.156441C1.33092 0.0517482 1.5874 -0.00155604 1.84648 3.45777e-05H5.93131C6.29582 0.00111397 6.65168 0.111264 6.9531 0.316317C7.25453 0.52137 7.48774 0.811949 7.62275 1.15068L8.54458 3.46043C8.68011 3.79299 8.71469 4.15812 8.644 4.51023C8.5733 4.86233 8.40047 5.1858 8.14709 5.44021L6.25268 7.33539C6.25268 7.33539 7.34366 14.7215 14.6676 15.6353Z" fill="white"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    @endif

    @include('components.contacts.info')
</div>

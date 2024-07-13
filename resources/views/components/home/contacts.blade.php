 <!-- Contacts Start-->
<div class="free-estimate-area-2 pd-top-100 pd-bottom-100">
    <div class="container">
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-6">
                <div class="free-estimate-inner">
                    <div class="section-title-2 text-center">
                        <h2>{{ translating('contacts-section-title') }}</h2>
                        <p>{{ nl2br(e(translating('contacts-section-description'))) }}</p>
                        <a class="btn btn-white" href="{{ route('contacts', ['locale' => app()->getLocale()]) }}">{{ translating('contacts') }}<i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="free-contact-wrap">
{{--                    <h3 class="title">{{ translating('contact-information') }}</h3>--}}
                    @if(app()->getLocale() == 'fr')
                        <h3 class="title"><span class="text-gradient">Informations</span></h3>
                    @else
                        <h3 class="title"><span class="text-gradient">Contact</span> information</h3>
                    @endif

                    @if(isset($phone_numbers) && count($phone_numbers) > 0)
                        <div class="free-contact-inner media align-items-center">
                            <div class="thumb">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="media-body">
                                <h4>{{ translating('phone-number') }}</h4>
                                @foreach($phone_numbers as $phone_number)
                                    <h6 class="mb-3"><a href="tel:{{ $phone_number->{'value_'.app()->getLocale()} }}">{{ $phone_number->{'value_'.app()->getLocale()} }}</a></h6>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if(isset($emails) && count($emails) > 0)
                        <div class="free-contact-area-2">
                            <div class="free-contact-inner media align-items-center">
                                <div class="thumb">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="media-body">
                                    <h4>{{ translating('our-email-address') }}</h4>
                                    @foreach($emails as $email)
                                        <h6 class="mb-3"><a href="mailto:{{ $email->{'value_'.app()->getLocale()} }}">{{ $email->{'value_'.app()->getLocale()} }}</a></h6>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(isset($addresses) && count($addresses) > 0)
                        <div class="free-contact-area-2">
                            <div class="free-contact-inner media align-items-center">
                                <div class="thumb">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                <div class="media-body">
                                    <h4>{{ translating('our-office-address') }}:</h4>
                                    @foreach($addresses as $address)
                                        <h6 class="mb-3">{{ $address->{'value_'.app()->getLocale()} }}</h6>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contacts End-->

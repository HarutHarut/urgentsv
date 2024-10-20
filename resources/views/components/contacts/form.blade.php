<div class="position-relative pt-5" style="padding-bottom: 4rem;">
    <div class="container content-wrapper">
        <div class="row justify-content-start">
            <div class="col-lg-6 py-5">
                <div class="section-title text-left">
    {{--                <h1>{{ translating('contact-us-message-title') }}</h1>--}}
                    @if(app()->getLocale() == 'fr')
                        <h1>Un <span class="text-gradient">message</span></h1>
                    @else
                        <h1>Need Assistance?</h1>
                    @endif
                    <!-- <p class="contact-form-description">{{ translating('contact-us-message-description') }}</p> -->
                    <p class="contact-form-description">We’re here to help 24/7. Call us for immediate support, or email for quick responses</p>
                </div>
                <div class="form contact-form">
                    <form success="{{ translating('success-message') }}" error="{{ translating('error-message') }}" action="{{ route('send-message', ['locale' => app()->getLocale()]) }}" id="messageForm" method="post" class="contactForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" name="name" class="form-control" form="messageForm" required placeholder="{{ translating('name') }}" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="email" class="form-control" form="messageForm" name="email" required placeholder="{{ translating('email') }}" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" form="messageForm" name="phone" required placeholder="{{ translating('phone') }}" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" form="messageForm" name="service" required placeholder="{{ translating('service') }}" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-12 mt-3">
                                <textarea class="form-control" name="message" form="messageForm" rows="3" required placeholder="{{ translating('message') }}"></textarea>
                            </div>
                        </div>
                        <div class="text-left mt-4"><button type="submit" form="messageForm" class="btn btn-base sendMessageForm">{{ translating('send-message') }}</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-us-bg-icons">
        <img src="{{ $image_path }}/contact-us-bg-circle.png" class="img-fluid contact-us-bg-circle" alt="Image" style="margin-right: 8rem;">
        <img src="{{ $image_path }}/contact-us-bg-line.png" class="img-fluid contact-us-bg-line w-100" alt="Image">
    </div>
</div>

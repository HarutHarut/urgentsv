<div class="container-fluid content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-8 py-5">
            <div class="section-title text-left">
                <h1>{{ translating('contact-us-message-title') }}</h1>
                <p class="contact-form-description">{{ translating('contact-us-message-description') }}</p>
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
                            <input type="text" class="form-control" form="messageForm" name="subject" required placeholder="{{ translating('subject') }}" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group col-12">
                            <textarea class="form-control" name="message" form="messageForm" rows="3" required placeholder="{{ translating('message') }}"></textarea>
                        </div>
                    </div>
                    <div class="text-left mt-4"><button type="submit" form="messageForm" class="btn btn-base sendMessageForm">{{ translating('send-message') }}</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

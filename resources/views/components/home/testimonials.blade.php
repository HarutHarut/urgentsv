<div class="container" style="margin-top: 48px;">
    <div class="text-center">
        <h2><span class="text-gradient">{{ translating('what_our_customers_say') }}</h2>
        <p class="section-desc mt-4">{{ translating('we_pride_ourselves_on_delivering') }}</p>
    </div>
    <div style="position: relative;">
        <button class="prev-arrow">
            <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                <mask id="mask0_236_5955" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="52" height="52">
                    <path d="M26.0001 49.3332C38.8871 49.3332 49.3334 38.8868 49.3334 25.9998C49.3334 13.1128 38.8871 2.6665 26.0001 2.6665C13.1131 2.6665 2.66675 13.1128 2.66675 25.9998C2.66675 38.8868 13.1131 49.3332 26.0001 49.3332Z" fill="#555555" stroke="white" stroke-width="4" stroke-linejoin="round"/>
                    <path d="M29.5 36.5L19 26L29.5 15.5" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                </mask>
                <g mask="url(#mask0_236_5955)">
                    <path d="M-2 -2H54V54H-2V-2Z" fill="#00A4F4"/>
                </g>
            </svg>
        </button>
        <div class="testimonials-grid">
            <div class="testimonial-block">
                <img src="{{ $image_path }}/testimonials/testimonials-bg-img.png" class="testimonials-bg-left" alt="testimonials" />
                <div class="testimonials-item">
                    <p class="testimonials-item-desc">{{ translating('user_comment_1') }}</p>
                    <p class="testimonials-author">- Sophie M.</p>
                </div>
                <img src="{{ $image_path }}/testimonials/testimonials-bg-img.png" class="testimonials-bg-right" alt="testimonials" />
            </div>
            <div class="testimonial-block">
                <img src="{{ $image_path }}/testimonials/testimonials-bg-img.png" class="testimonials-bg-left" alt="testimonials" />
                <div class="testimonials-item">
                    <p class="testimonials-item-desc">{{ translating('user_comment_2') }}</p>
                    <p class="testimonials-author">- Marc L.</p>
                </div>
                <img src="{{ $image_path }}/testimonials/testimonials-bg-img.png" class="testimonials-bg-right" alt="testimonials" />
            </div>
            <div class="testimonial-block">
                <img src="{{ $image_path }}/testimonials/testimonials-bg-img.png" class="testimonials-bg-left" alt="testimonials" />
                <div class="testimonials-item">
                    <p class="testimonials-item-desc">{{ translating('user_comment_3') }}</p>
                    <p class="testimonials-author">- Claire D.</p>
                </div>
                <img src="{{ $image_path }}/testimonials/testimonials-bg-img.png" class="testimonials-bg-right" alt="testimonials" />
            </div>
            <div class="testimonial-block">
                <img src="{{ $image_path }}/testimonials/testimonials-bg-img.png" class="testimonials-bg-left" alt="testimonials" />
                <div class="testimonials-item">
                    <p class="testimonials-item-desc">{{ translating('user_comment_4') }}</p>
                    <p class="testimonials-author">- Jean-Paul R.</p>
                </div>
                <img src="{{ $image_path }}/testimonials/testimonials-bg-img.png" class="testimonials-bg-right" alt="testimonials" />
            </div>
        </div>
        <button class="next-arrow">
        <svg width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
            <mask id="mask0_236_5971" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="-1" y="0" width="52" height="51">
                <path d="M25.3332 2.00032C12.4462 2.00032 1.99983 12.4467 1.99983 25.3337C1.99983 38.2207 12.4462 48.667 25.3332 48.667C38.2202 48.667 48.6665 38.2207 48.6665 25.3337C48.6665 12.4467 38.2202 2.00032 25.3332 2.00032Z" fill="#555555" stroke="white" stroke-width="4" stroke-linejoin="round"/>
                <path d="M21.8333 14.8335L32.3333 25.3335L21.8333 35.8335" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            </mask>
            <g mask="url(#mask0_236_5971)">
                <path d="M53.3333 53.3335H-2.66675V-2.6665H53.3333V53.3335Z" fill="#00A4F4"/>
            </g>
        </svg>
        </button>
    </div>
    <div class="text-center">
        <h2><span class="text-gradient">{{ translating('our_achievements') }}</h2>
        <p class="section-desc mt-4">{{ translating('successfully_completed_thousands') }}</p>
    </div>
    <div class="d-flex justify-content-center text-center count-block-grid flex-wrap">
        <div class="count-block">
            <p class="text-gradient count-block-title">3100+</p>
            <p class="count-block-text">{{ translating('happy_customers') }}</p>
        </div>
        <div class="count-block">
            <p class="text-gradient count-block-title">220+</p>
            <p class="count-block-text">{{ translating('emergency_repairs_completed') }}</p>
        </div>
        <div class="count-block">
            <p class="text-gradient count-block-title">40+</p>
            <p class="count-block-text">{{ translating('business_cooperations') }}</p>
        </div>
    </div>
    <!-- <a href="/{{app()->getLocale()}}/contacts" class="contacts-btn" style="margin: 0px auto;">Be Our Next Satisfied Customer – Call Now!</a> -->
    <div class="urgency-block">
        <h3><span>{{ translating('need_help_fast') }}</span> {{ translating('we_are_here_24_7') }}</h3>
        <p>{{ translating('when_an_emergency_strikes') }}</p>
        <a href="tel:0525680425">{{ translating('call_now_for_immediate_services') }}</a>
    </div>
</div>

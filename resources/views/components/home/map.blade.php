@if(isset($map) && $map != null)
  <div class="container mt-5">
    <div class="map-section">
{{--        <h3 class="w-100 text-center mb-3">{{ $map->{'title_'.app()->getLocale()} }}</h3>--}}
        @if(app()->getLocale() == 'fr')
            <h3 class="w-100 text-center mb-3">Nos zones <span class="text-gradient">d’intervention</span></h3>
        @else
            <h3 class="w-100 text-center mb-3">Our <span class="text-gradient">Intervention</span> Zones</h3>
        @endif

        <p class="section-desc">Our services are available all over the France. You can just call and make an order.</p>
        <div class="row mt-5 justify-content-center">
          <div class="col-lg-5">
              <img src="{{ $image_path }}/map/{{ $map->map }}" class="w-100 rounded responsive">
          </div>
          <div class="col-lg-6 pl-5 ml-4 map-list-block">
            <div class="row">
              <div class="col-lg-6">
                <h4>
                  <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="28" height="28" rx="4" fill="#EFF9FF"/>
                    <path d="M14 19.3995L18.3649 21.8549C19.1642 22.3049 20.1424 21.6397 19.932 20.7984L18.7751 16.1811L22.6351 13.0703C23.3398 12.5029 22.9611 11.4268 22.0356 11.3583L16.9555 10.9573L14.9676 6.59428C14.61 5.80191 13.39 5.80191 13.0324 6.59428L11.0445 10.9475L5.96443 11.3486C5.03887 11.417 4.66023 12.4931 5.36492 13.0605L9.22494 16.1713L8.06799 20.7886C7.85763 21.6299 8.83578 22.2951 9.63513 21.8451L14 19.3995Z" fill="#0069AB"/>
                  </svg>
                  {{ translating('city-title-1') }}
                </h4>
                <ul>
                  <li>{{ translating('city-1') }}</li>
                  <li>{{ translating('city-2') }}</li>
                </ul>
                <h4>
                  <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="28" height="28" rx="4" fill="#EFF9FF"/>
                    <path d="M14 19.3995L18.3649 21.8549C19.1642 22.3049 20.1424 21.6397 19.932 20.7984L18.7751 16.1811L22.6351 13.0703C23.3398 12.5029 22.9611 11.4268 22.0356 11.3583L16.9555 10.9573L14.9676 6.59428C14.61 5.80191 13.39 5.80191 13.0324 6.59428L11.0445 10.9475L5.96443 11.3486C5.03887 11.417 4.66023 12.4931 5.36492 13.0605L9.22494 16.1713L8.06799 20.7886C7.85763 21.6299 8.83578 22.2951 9.63513 21.8451L14 19.3995Z" fill="#0069AB"/>
                  </svg>
                  {{ translating('city-title-2') }}
                </h4>
                <ul>
                  <li>{{ translating('city-4') }}</li>
                  <li>{{ translating('city-5') }}</li>
                </ul>
                <h4>
                  <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="28" height="28" rx="4" fill="#EFF9FF"/>
                    <path d="M14 19.3995L18.3649 21.8549C19.1642 22.3049 20.1424 21.6397 19.932 20.7984L18.7751 16.1811L22.6351 13.0703C23.3398 12.5029 22.9611 11.4268 22.0356 11.3583L16.9555 10.9573L14.9676 6.59428C14.61 5.80191 13.39 5.80191 13.0324 6.59428L11.0445 10.9475L5.96443 11.3486C5.03887 11.417 4.66023 12.4931 5.36492 13.0605L9.22494 16.1713L8.06799 20.7886C7.85763 21.6299 8.83578 22.2951 9.63513 21.8451L14 19.3995Z" fill="#0069AB"/>
                  </svg>
                  {{ translating('city-title-3') }}
                </h4>
                <ul>
                  <li>{{ translating('city-6') }}</li>
                  <li>{{ translating('city-7') }}</li>
                  <li>{{ translating('city-8') }}</li>
                  <li>{{ translating('city-9') }}</li>
                  <li>{{ translating('city-10') }}</li>
                </ul>
                <h4>
                  <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="28" height="28" rx="4" fill="#EFF9FF"/>
                    <path d="M14 19.3995L18.3649 21.8549C19.1642 22.3049 20.1424 21.6397 19.932 20.7984L18.7751 16.1811L22.6351 13.0703C23.3398 12.5029 22.9611 11.4268 22.0356 11.3583L16.9555 10.9573L14.9676 6.59428C14.61 5.80191 13.39 5.80191 13.0324 6.59428L11.0445 10.9475L5.96443 11.3486C5.03887 11.417 4.66023 12.4931 5.36492 13.0605L9.22494 16.1713L8.06799 20.7886C7.85763 21.6299 8.83578 22.2951 9.63513 21.8451L14 19.3995Z" fill="#0069AB"/>
                  </svg>
                  {{ translating('city-title-5') }}
                </h4>
                <ul>
                  <li>{{ translating('city-17') }}</li>
                  <li>{{ translating('city-18') }}</li>
                  <li>{{ translating('city-19') }}</li>
                  <li>{{ translating('city-20') }}</li>
                </ul>
              </div>

              <div class="col-lg-6">
                <h4>
                  <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="28" height="28" rx="4" fill="#EFF9FF"/>
                    <path d="M14 19.3995L18.3649 21.8549C19.1642 22.3049 20.1424 21.6397 19.932 20.7984L18.7751 16.1811L22.6351 13.0703C23.3398 12.5029 22.9611 11.4268 22.0356 11.3583L16.9555 10.9573L14.9676 6.59428C14.61 5.80191 13.39 5.80191 13.0324 6.59428L11.0445 10.9475L5.96443 11.3486C5.03887 11.417 4.66023 12.4931 5.36492 13.0605L9.22494 16.1713L8.06799 20.7886C7.85763 21.6299 8.83578 22.2951 9.63513 21.8451L14 19.3995Z" fill="#0069AB"/>
                  </svg>
                  {{ translating('city-title-6') }}
                </h4>
                <ul>
                  <li>{{ translating('city-21') }}</li>
                  <li>{{ translating('city-22') }}</li>
                  <li>{{ translating('city-23') }}</li>
                  <li>{{ translating('city-24') }}</li>
                </ul>
                <h4>
                  <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="28" height="28" rx="4" fill="#EFF9FF"/>
                    <path d="M14 19.3995L18.3649 21.8549C19.1642 22.3049 20.1424 21.6397 19.932 20.7984L18.7751 16.1811L22.6351 13.0703C23.3398 12.5029 22.9611 11.4268 22.0356 11.3583L16.9555 10.9573L14.9676 6.59428C14.61 5.80191 13.39 5.80191 13.0324 6.59428L11.0445 10.9475L5.96443 11.3486C5.03887 11.417 4.66023 12.4931 5.36492 13.0605L9.22494 16.1713L8.06799 20.7886C7.85763 21.6299 8.83578 22.2951 9.63513 21.8451L14 19.3995Z" fill="#0069AB"/>
                  </svg>
                  {{ translating('city-title-7') }}
                </h4>
                <ul>
                  <li>{{ translating('city-25') }}</li>
                </ul>
                <h4>
                  <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="28" height="28" rx="4" fill="#EFF9FF"/>
                    <path d="M14 19.3995L18.3649 21.8549C19.1642 22.3049 20.1424 21.6397 19.932 20.7984L18.7751 16.1811L22.6351 13.0703C23.3398 12.5029 22.9611 11.4268 22.0356 11.3583L16.9555 10.9573L14.9676 6.59428C14.61 5.80191 13.39 5.80191 13.0324 6.59428L11.0445 10.9475L5.96443 11.3486C5.03887 11.417 4.66023 12.4931 5.36492 13.0605L9.22494 16.1713L8.06799 20.7886C7.85763 21.6299 8.83578 22.2951 9.63513 21.8451L14 19.3995Z" fill="#0069AB"/>
                  </svg>
                  {{ translating('city-title-8') }}
                </h4>
                <ul>
                  <li>{{ translating('city-26') }}</li>
                </ul>
                <h4>
                  <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="28" height="28" rx="4" fill="#EFF9FF"/>
                    <path d="M14 19.3995L18.3649 21.8549C19.1642 22.3049 20.1424 21.6397 19.932 20.7984L18.7751 16.1811L22.6351 13.0703C23.3398 12.5029 22.9611 11.4268 22.0356 11.3583L16.9555 10.9573L14.9676 6.59428C14.61 5.80191 13.39 5.80191 13.0324 6.59428L11.0445 10.9475L5.96443 11.3486C5.03887 11.417 4.66023 12.4931 5.36492 13.0605L9.22494 16.1713L8.06799 20.7886C7.85763 21.6299 8.83578 22.2951 9.63513 21.8451L14 19.3995Z" fill="#0069AB"/>
                  </svg>
                  {{ translating('city-title-9') }}
                </h4>
                <ul>
                  <li>{{ translating('city-27') }}</li>
                </ul>
                <h4>
                  <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="28" height="28" rx="4" fill="#EFF9FF"/>
                    <path d="M14 19.3995L18.3649 21.8549C19.1642 22.3049 20.1424 21.6397 19.932 20.7984L18.7751 16.1811L22.6351 13.0703C23.3398 12.5029 22.9611 11.4268 22.0356 11.3583L16.9555 10.9573L14.9676 6.59428C14.61 5.80191 13.39 5.80191 13.0324 6.59428L11.0445 10.9475L5.96443 11.3486C5.03887 11.417 4.66023 12.4931 5.36492 13.0605L9.22494 16.1713L8.06799 20.7886C7.85763 21.6299 8.83578 22.2951 9.63513 21.8451L14 19.3995Z" fill="#0069AB"/>
                  </svg>
                  {{ translating('city-title-10') }}
                </h4>
                <ul>
                  <li>{{ translating('city-28') }}</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
@endif

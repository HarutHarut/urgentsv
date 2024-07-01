<div class="tab-pane fade" id="active-orders" role="tabpanel">
    <div class="myaccount-content">
        <h3><i class="text-warning fa fa-exclamation"></i> {{ translating('active-orders') }}</h3>
        @if(isset($active_orders) && count($active_orders) > 0)
            @foreach($active_orders as $active_order)
                <div class="card mb-5">
                    <h5 class="card-header bg-warning">{{ translating('active-work') }}:  {{ translating('euro') }} {{ $active_order->price }}</h5>
                    <div class="card-body">
                        <ul class="text-dark">
                            <li class="h6 font-weight-bold mb-3"> {{ translating('call-time') }}: <span class="text-muted">{{ $active_order->created_at }}</span></li>
                            <li class="h6 font-weight-bold mb-3">{{ translating('service-name') }}: <span class="text-muted">{{ $active_order->{'service_'.app()->getLocale()} }}</span></li>
                            <li class="h6 font-weight-bold mb-3">{{ translating('client-name') }}: <span class="text-muted">{{ $active_order->{'client_name_'.app()->getLocale()} }}</span></li>
                            {{-- <li class="h6 font-weight-bold mb-3">{{ translating('phone-number') }}: <a style="color: #14287B;" href="tel:{{ $active_order->{'phone'} }}">{{ $active_order->{'phone'} }}</a></li> --}}
                            <li class="h6 font-weight-bold mb-3">{{ translating('phone-number') }}: <span class="text-muted:">{{ translating('*********') }}</a></li>
                            <li class="h6 font-weight-bold mb-3">{{ translating('address') }}: <span class="text-muted">{{ $active_order->{'address_'.app()->getLocale()} }}</span></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
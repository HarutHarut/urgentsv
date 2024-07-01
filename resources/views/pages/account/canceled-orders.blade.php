<div class="tab-pane fade" id="canceled-orders" role="tabpanel">
    <div class="myaccount-content">
        <h3><i class="text-danger fa fa-times"></i> {{ translating('canceled-orders') }}</h3>
        @if(isset($canceled_orders) && count($canceled_orders) > 0)
            @foreach($canceled_orders as $canceled_order)
                <div class="card mb-5">
                    <h5 class="card-header bg-danger">{{ translating('canceled-work') }}</h5>
                    <div class="card-body">
                        <ul class="text-dark">
                            <li class="h6 font-weight-bold mb-3"> {{ translating('call-time') }}: <span class="text-muted">{{ $canceled_order->created_at }}</span></li>
                            <li class="h6 font-weight-bold mb-3">{{ translating('service-name') }}: <span class="text-muted">{{ $canceled_order->{'service_'.app()->getLocale()} }}</span></li>
                            <li class="h6 font-weight-bold mb-3">{{ translating('client-name') }}: <span class="text-muted">{{ $canceled_order->{'client_name_'.app()->getLocale()} }}</span></li>
                            {{-- <li class="h6 font-weight-bold mb-3">{{ translating('phone-number') }}: <a style="color: #14287B;" href="tel:{{ $canceled_order->{'phone'} }}">{{ $canceled_order->{'phone'} }}</a></li> --}}
                            <li class="h6 font-weight-bold mb-3">{{ translating('phone-number') }}: <span class="text-muted:">{{ translating('*********') }}</a></li>
                            <li class="h6 font-weight-bold mb-3">{{ translating('address') }}: <span class="text-muted">{{ $canceled_order->{'address_'.app()->getLocale()} }}</span></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
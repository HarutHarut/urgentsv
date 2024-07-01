<div class="tab-pane fade" id="success-finished-payed-orders" role="tabpanel">
    <div class="myaccount-content">
        <h3><i class="text-success fa fa-check"></i> {{ translating('success-finished-payed-orders') }}</h3>
        @if(isset($success_finished_payed_orders) && count($success_finished_payed_orders) > 0)
            @foreach($success_finished_payed_orders as $success_finished_payed_order)
                <div class="card mb-5">
                    <h5 class="card-header bg-success">{{ translating('success-finished-payed-work') }}:  {{ translating('euro') }} {{ $success_finished_payed_order->price }}</h5>
                    <div class="card-body">
                        <ul class="text-dark">
                            <li class="h6 font-weight-bold mb-3"> {{ translating('call-time') }}: <span class="text-muted">{{ $success_finished_payed_order->created_at }}</span></li>
                            <li class="h6 font-weight-bold mb-3">{{ translating('service-name') }}: <span class="text-muted">{{ $success_finished_payed_order->{'service_'.app()->getLocale()} }}</span></li>
                            <li class="h6 font-weight-bold mb-3">{{ translating('client-name') }}: <span class="text-muted">{{ $success_finished_payed_order->{'client_name_'.app()->getLocale()} }}</span></li>
                            <li class="h6 font-weight-bold mb-3">{{ translating('phone-number') }}: <a style="color: #14287B;" href="tel:{{ $success_finished_payed_order->{'phone'} }}">{{ $success_finished_payed_order->{'phone'} }}</a></li>
                            <li class="h6 font-weight-bold mb-3">{{ translating('address') }}: <span class="text-muted">{{ $success_finished_payed_order->{'address_'.app()->getLocale()} }}</span></li>
                        </ul>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-blue btn-sm" data-toggle="modal" data-target="#exampleModalCenterPrice{{ $success_finished_payed_order->id }}">{{ translating('view-prices') }}</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenterPrice{{ $success_finished_payed_order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterPrice{{ $success_finished_payed_order->id }}Title" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ $success_finished_payed_order->{'service_'.app()->getLocale()} }} | {{ translating('prices') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul>
                                            <li class="mb-3"><span class="font-weight-bold">{{ translating('order-price') }}: </span>{{ translating('euro') }} {{ $success_finished_payed_order->price }}</li>
                                            <li class="mb-3"><span class="font-weight-bold">{{ translating('tax-price') }}: </span>{{ translating('euro') }} {{ getTaxPrice($success_finished_payed_order->price, $success_finished_payed_order->has_tax) }}</li>
                                            <li class="mb-3"><span class="font-weight-bold">{{ translating('material-price') }}: </span>{{ translating('euro') }} {{ $success_finished_payed_order->material_price }}</li>
                                            <li class="mb-3"><span class="font-weight-bold">{{ translating('worker-price') }}: </span>{{ translating('euro') }} {{ getWorkerAndIncomePrice($success_finished_payed_order->price,$success_finished_payed_order->material_price, $success_finished_payed_order->has_tax) }} </li>
                                            <li class="mb-3"><span class="font-weight-bold">{{ translating('income-price') }}:  </span>{{ translating('euro') }} {{ getWorkerAndIncomePrice($success_finished_payed_order->price,$success_finished_payed_order->material_price, $success_finished_payed_order->has_tax) }}</li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-blue btn-sm" data-dismiss="modal">{{ translating('close') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
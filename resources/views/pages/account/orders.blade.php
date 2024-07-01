<div class="tab-pane fade" id="orders" role="tabpanel">
    <div class="myaccount-content">
        <h3>{{ translating('orders') }}</h3>

        <div class="myaccount-table table-responsive text-center">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>{{ translating('orders-no') }}</th>
                        <th>{{ translating('name') }}</th>
                        <th>{{ translating('date') }}</th>
                        <th>{{ translating('status') }}</th>
                        <th>{{ translating('total') }}</th>
                        <th>{{ translating('action') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @if(isset($orders) && count($orders) > 0)
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{formatDate($order->created_at) }}</td>
                                @if($order->status == 6)
                                    <td style="color: {{ $order->statuses['color'] }}"><i class="fa fa-check"></i> {{ $order->statuses['title_'.app()->getLocale()] }}</td>
                                @elseif($order->status == 7)
                                    <td style="color: {{ $order->statuses['color'] }}"><i class="fa fa-times"></i> {{ $order->statuses['title_'.app()->getLocale()] }}</td>
                                @elseif($order->status == 2)
                                    <td style="color: {{ $order->statuses['color'] }}"><i class="fa fa-check"></i> {{ $order->statuses['title_'.app()->getLocale()] }}</td>
                                @elseif($order->status == 3)
                                    <td style="color: {{ $order->statuses['color'] }}"><i class="fa fa-times"></i> {{ $order->statuses['title_'.app()->getLocale()] }}</td>
                                @else
                                    <td style="color: {{ $order->statuses['color'] }}"><i class="fa fa-circle"></i> {{ $order->statuses['title_'.app()->getLocale()] }}</td>
                                @endif
                                <td>{{ round(intval($order->price) / intval($currencies->value)) }}&nbsp;{{ $currency }}</td>
                                @if($order->cart == null || count($order->cart) < 1)
                                    <td><span>{{ translating('in-process') }}</span></td>
                                @else
                                    <td><a data-order-id="{{ $order->id }}" href="#view-moal-popup{{ $order->id }}" data-toggle="modal" class="ht-btn view-cart black-btn">{{ translating('view') }}</a></td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">{{ translating('no-data-yet') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
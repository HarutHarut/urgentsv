<div class="tab-pane fade" id="card-datas" role="tabpanel">
    <div class="myaccount-content">
        <h3><i class="text-info fa fa-credit-card"></i> {{ translating('card-datas') }}</h3>
      

      <!--   <form class="w-100" id="cardForm" method="post">
            @csrf
            <input type="text" name="card">
        </form> -->

        @if(Auth::user()->card_data == NULL)
            <a class="btn btn-blue btn-lg" href="{{ route('card-verify', ['locale' => app()->getLocale()]) }}">{{ translating('verify') }}</a>
        @else
            <button class="btn btn-lg btn-blue" type="button">{{ translating('you-are-verifyed') }}</button>
        @endif
    </div>
</div>



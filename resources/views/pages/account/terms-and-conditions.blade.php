<div class="tab-pane fade" id="terms-and-conditions" role="tabpanel">
    <div class="myaccount-content">
        <h3 style="color: #14287B;"><i class="fa fa-file-word"></i> {{ translating('terms-and-conditions') }}</h3>
        <div>{!! $terms_and_conditions->{'description_'.app()->getLocale()} !!}</div>
        @if(isset($terms_and_conditions_items) && count($terms_and_conditions_items) > 0)
            @foreach($terms_and_conditions_items as $terms_and_conditions_item)
                <div class="form-check mt-3">
                    @if(in_array($terms_and_conditions_item->id, $arr))
                        <input type="checkbox" name="confirm{{ $terms_and_conditions_item->id }}" form="TermsConfirmForm" checked class="form-check-input" id="termsAndConditionsConfoirm{{ $terms_and_conditions_item->id }}">
                    @else
                        <input type="checkbox" name="confirm{{ $terms_and_conditions_item->id }}" form="TermsConfirmForm" class="form-check-input" id="termsAndConditionsConfoirm{{ $terms_and_conditions_item->id }}">
                    @endif
                    <label class="form-check-label" for="termsAndConditionsConfoirm{{ $terms_and_conditions_item->id }}">
                        <h5>{{ $terms_and_conditions_item->{'title_'.app()->getLocale()} }}</h5>
                        <p>{{ $terms_and_conditions_item->{'description_'.app()->getLocale()} }}</p>
                    </label>
                </div>
            @endforeach
            <form error="{{ translating('error-terms-confrim') }}" success="{{ translating('success-terms-confrim') }}" id="TermsConfirmForm" action="{{ route('confirm-terms', ['locale' => app()->getLocale()]) }}" method="post">
                @csrf
                <button form="TermsConfirmForm" class="btn btn-base mt-3" type="submit">{{ translating('save-data') }} <i class="fa fa-check"></i></button>
            </form>
        @endif
    </div>
</div>
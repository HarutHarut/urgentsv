<div class="tab-pane fade" id="address-edit" role="tabpanel">
    <div class="myaccount-content">
        <h3>{{ translating('billing-addresses') }}</h3>

        <address>
            <div class="account-details-form">
                <div class="col-12 pl-0">
                    <input form="editAddressDataForm" name="address" required placeholder="{{ translating('address') }}" value="{{ Auth::user()->address }}" type="text">
                    <p><label>{{ translating('your-address') }}</label></p>
                </div>

                <div class="col-12 pl-0">
                    <select form="editAddressDataForm" class="w-100" required name="location_id">
                     
                    </select>
                    <p><label>{{ translating('your-location') }}</label></p>
                </div>

                <div class="col-12 pl-0">
                    <input form="editAddressDataForm" required placeholder="{{ translating('phone') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="phone" value="{{ Auth::user()->phone }}" type="text">
                    <p><label>{{ translating('your-phone') }}</label></p>
                </div>
            </div>
        </address>

        <form data-success="{{ translating('address-change-success') }}"  data-error="{{ translating('address-change-error') }}" id="editAddressDataForm" method="post" action="{{ route('change-address', ['locale' => app()->getLocale()]) }}">
            @csrf
            <button type="submit" form="editAddressDataForm" class="ht-btn black-btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i>{{ translating('edit-addresses') }}</a>
        </form>
    </div>
</div>
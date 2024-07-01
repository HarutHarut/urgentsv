<div class="col-lg-3 col-12">
    <div class="myaccount-tab-menu nav" role="tablist">
        <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-tachometer-alt"></i>
        {{ translating('dashboard') }}</a>
        <a href="#card-datas" data-toggle="tab"><i class="fa fa-credit-card text-info"></i> {{ translating('card-datas') }}</a>
        <a href="#active-orders" data-toggle="tab"><i class="fa fa-tasks text-warning"></i> {{ translating('active-orders') }} <span class="p-2 rounded text-dark bg-warning">{{ count($active_orders) }}</span></a>
        <a href="#success-finished-orders" data-toggle="tab"><i class="far fa-clock text-info"></i> {{ translating('success-finished-orders') }} <span class="p-2 rounded text-dark bg-info">{{ count($success_finished_orders) }}</span></a>
        <a href="#success-finished-payed-orders" data-toggle="tab"><i class="fa fa-check-double text-success"></i> {{ translating('success-finished-payed-orders') }} <span class="p-2 rounded text-dark bg-success">{{ count($success_finished_payed_orders) }}</span></a>
        <a href="#canceled-orders" data-toggle="tab"><i class="fa fa-window-close text-danger"></i> {{ translating('canceled-orders') }} <span class="p-2 rounded text-dark bg-danger">{{ count($canceled_orders) }}</span></a>
        <a href="#account-settings" data-toggle="tab"><i class="fa fa-user-cog"></i> {{ translating('account-settings') }}</a>
        <a href="#factures" data-toggle="tab"><i class="fa fa-file-pdf"></i> {{ translating('factures') }}</a>
        <form id="logoutform" method="post" action="{{route('logout', ['locale' => app()->getLocale()]) }}">
            @csrf
            <a href="javascript: void(0);" onclick="logoutform.submit();"><i class="fa fa-sign-out-alt"></i> {{ translating('log-out') }}</a>
        </form>
    </div>
</div>
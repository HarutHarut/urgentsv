<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
    <div class="myaccount-content">
        <h3 style="color: #14287B;"><i class="fa fa-tachometer-alt"></i> {{ translating('dashboard') }}</h3>

        <div class="welcome mb-20">
            <p>{{ translating('your-id-is') }} <strong>#{{ Auth::user()->id }}</strong></p>
        </div>
       
        <div class="welcome mb-20">
            <p>{{ translating('hello') }}, <strong>{{ Auth::user()->name }} 🖐</strong></p>
        </div>

        <p class="mb-0">{{ html_entity_decode(strip_tags(nl2br(e(translating('my-account-description'))))) }}</p>

        @if(Auth::user()->role == 'admin')
            <a href="{{ route('home-admin-index', ['locale' => app()->getLocale()]) }}" class="mt-2 btn btn-blue">{{ translating('admin-panel') }}</a>
        @endif

        @if(Auth::user()->role == 'editor')
            <a href="{{ route('orders-admin-index', ['locale' => app()->getLocale()]) }}" class="mt-2 btn btn-blue">{{ translating('admin-panel') }}</a>
        @endif
    </div>
</div>
@extends('layouts.app')

@section('content')
<div class="breadcrumb-area" style="background-image:url({{ $image_path }}/breadcrumb/{{ $seo->bg }})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="section-title text-center">
                        <h1 class="page-title pb-2">{{ translating('login') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ translating('login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login', ['locale' => app()->getLocale()]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ translating('email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ translating('email-or-password-error') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ translating('password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ translating('password-error') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ translating('remember-me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ translating('login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" data-toggle="modal" data-target="#exampleModalCenterForgetPassword">
                                        {{ translating('forgot-your-passsword') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenterForgetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterForgetPasswordTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ translating('forget-your-password') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <input type="email" form="forgetPasswordForm" class="form-control" required name="email" min="1" max="255" placeholder="{{ translating('your-email') }}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-base" data-dismiss="modal">{{ translating('close') }}</button>
        <form id="forgetPasswordForm" action="{{ route('forget-password', ['locale' => app()->getLocale()]) }}" method="post">
            @csrf
            <button type="submit" form="forgetPasswordForm" class="btn btn-blue">{{ translating('send') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

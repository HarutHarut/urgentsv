@extends('layouts.app')

@section('content')
<!-- <div class="breadcrumb-area" style="background-image:url({{ $image_path }}/breadcrumb/{{ $seo->bg }})">
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
</div> -->

<div class="content-wrapper">
    <div class="auth-pages-content">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                    <h1 class="text-center text-white mb-4 auth-form-title">Log In</h1>
                    <div class="auth-form-block">
                        <form method="POST" action="{{ route('login', ['locale' => app()->getLocale()]) }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="col-form-label">{{ translating('email') }}</label>

                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ translating('email-or-password-error') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="password" class="col-form-label">{{ translating('password') }}</label>

                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ translating('password-error') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="forgot-password" data-toggle="modal" data-target="#exampleModalCenterForgetPassword">
                                    {{ translating('forgot-your-passsword') }}
                                </a>
                            @endif

                            <div class="form-group mt-3 mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label ml-1" for="remember">
                                        {{ translating('remember-me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ translating('login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="row align-items-center auth-page-bottom-block">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <a href='/'>
                                <svg width="50" height="16" viewBox="0 0 50 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.292454 7.20207C-0.0980682 7.59259 -0.0980683 8.22576 0.292454 8.61628L6.65641 14.9802C7.04694 15.3708 7.6801 15.3708 8.07063 14.9802C8.46115 14.5897 8.46115 13.9566 8.07063 13.566L2.41378 7.90918L8.07063 2.25232C8.46116 1.8618 8.46116 1.22863 8.07063 0.838109C7.6801 0.447584 7.04694 0.447584 6.65641 0.838108L0.292454 7.20207ZM50.0098 6.90918L0.999561 6.90918L0.999561 8.90918L50.0098 8.90918L50.0098 6.90918Z" fill="white"/>
                                </svg>
                                <span class="ml-2 text-white">back to main page<span>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <a href="/{{app()->getLocale()}}/register" class="auth-page-bottom-btn">Sign Up</a>
                        </div>
                    </div>
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

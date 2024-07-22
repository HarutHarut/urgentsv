@extends('layouts.app')

@section('content')
<!-- <div class="breadcrumb-area" style="background-image:url({{ $image_path }}/breadcrumb/{{ $seo->bg }})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="section-title text-center">
                        <h1 class="page-title pb-2">{{ translating('register') }}</h1>
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
                    <h1 class="text-center text-white mb-4 auth-form-title">Sign Up</h1>
                    <div class="auth-form-block">
                        <form method="POST" action="{{ route('register', ['locale' => app()->getLocale()]) }}">
                            @csrf

                            <div class="form-group">
                                <label for="name" class="col-form-label">{{ translating('name') }}</label>

                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ translating('name-register-error') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="job_title" class="col-form-label">{{ translating('job_title') }}</label>

                                <div>
                                    <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required autocomplete="job_title" autofocus>

                                    @error('job_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ translating('job-title-register-error') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-form-label">{{ translating('email') }}</label>

                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ translating('email-register-error') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-form-label">{{ translating('phone') }}</label>

                                <div>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ translating('phone-register-error') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-form-label">{{ translating('password') }}</label>

                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ translating('password-register-error') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-form-label">{{ translating('confirm-password') }}</label>

                                <div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" required type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="terms">
                                        <a target="_blank" class="ml-1" href="{{ route('terms-and-conditions', ['locale' => app()->getLocale()]) }}">{{ translating('accept-terms-and-conditions') }}</a>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ translating('register') }}
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
                            <a href="/{{app()->getLocale()}}/login" class="auth-page-bottom-btn">Log In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

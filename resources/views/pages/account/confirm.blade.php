@extends('layouts.app')

@section('content')
    <div class="breadcrumb-area" style="background-image:url({{ $image_path }}/breadcrumb/{{ $seo->bg }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title text-center">
                            <h1 class="page-title pb-2">{{ translating('confirm-your-email') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card py-2">
                    <h2 class="w-100 text-center text-primary">{{ translating('confirm-your-email') }}</h2>
                    <p class="w-100 text-center">{{ translating('resend-email-description') }}</p>
                    <div class="card-body">
                        <form id="resend-email" data-success="{{ translating('resend-email-success') }}" data-error="{{ translating('resend-email-error') }}" autocomplete="off" method="post" action="{{ route('resend', ['locale' => app()->getLocale()]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="resend-email" class="col-md-4 col-form-label text-md-right">{{ translating('email') }}</label>

                                <div class="col-md-6">
                                    <input id="resend-email" type="resend-email" class="form-control @error('resend-email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ translating('confirm-your-email') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
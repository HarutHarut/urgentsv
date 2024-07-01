@extends('layouts.app')

@section('content')
    <div class="breadcrumb-area" style="background-image:url({{ $image_path }}/breadcrumb/{{ $seo->bg }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title text-center">
                            <h1 class="page-title pb-2">{{ translating('reset-password') }}</h1>
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
                <div class="card-header">{{ translating('reset-password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reset-password-update', ['locale' => app()->getLocale()]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="new-password" class="col-md-4 col-form-label text-md-right">{{ translating('new-password') }}</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control @error('new-password') is-invalid @enderror" name="new_password" value="{{ old('new_password') }}" required autocomplete="new_password" autofocus>

                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="confirm-new-password" class="col-md-4 col-form-label text-md-right">{{ translating('confirm-new-password') }}</label>

                            <div class="col-md-6">
                                <input id="confirm-new-password" type="password" class="form-control @error('new_password_confirm') is-invalid @enderror" name="new_password_confirm" value="{{ old('new_password_confirm') }}" required autocomplete="new_password_confirm" autofocus>

                                @error('new_password_confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ translating('reset') }}
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
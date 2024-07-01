@extends('layouts.app')

@section('content')
    <div class="breadcrumb-area" style="background-image:url({{ $image_path }}/breadcrumb/{{ $seo->bg }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title text-center">
                            <h1 class="page-title pb-2">{{ translating('my-account') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--My Account section start-->
    <div class="my-account-section section sb-border py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @if(\Request::session()->get('error_password') && \Request::session()->get('error_password') != null)
                            <div class="alert alert-danger w-100 d-block col-12 mr-10 ml-10 text-center mb-30">
                                <i class="fa fa-times"></i> {{ translating('user-passowrd-change-error') }}
                            </div>
                            @php \Request::session()->forget('error_password'); @endphp
                        @endif

                        <!-- My Account Tab Menu Start -->
                        @include('pages.account.sidebar')
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-12">
                            <div class="tab-content" id="myaccountContent">
                                @if(isset($success_finished_orders) && count($success_finished_orders) > 0)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      <i class="fa fa-times"></i> {{ translating('no-payed-order-alert-text') }}
                                      {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button> --}}
                                    </div>
                                @endif

                                @include('pages.account.dashboard')
                                
                                @include('pages.account.card-datas')
                                
                                @include('pages.account.active-orders')
                                
                                @include('pages.account.success-finished-orders')
                                
                                @include('pages.account.success-finished-payed-orders')
                                
                                @include('pages.account.canceled-orders')

                                @include('pages.account.terms-and-conditions')

                                @include('pages.account.addresses')
                                
                                @include('pages.account.factures')
                                
                                @include('pages.account.settings')
                            </div>
                        </div>
                        <!-- My Account Tab Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--My Account section end-->

@endsection 
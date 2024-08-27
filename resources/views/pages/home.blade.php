@extends('layouts.app')

@section('content')

    @include('components.home.banner')

    {{-- @include('components.home.slider') --}}

    {{-- @include('components.home.services') --}}

    @include('components.home.services-tab')

    {{-- @include('components.home.years-of-experiance') --}}

    @include('components.home.testimonials')

    {{-- @include('components.home.map') --}}

    {{-- @include('components.home.about-us') --}}

    {{-- @include('components.home.gallery') --}}


    @include('components.contacts.info')
@endsection

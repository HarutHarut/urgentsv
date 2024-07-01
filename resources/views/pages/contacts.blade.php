@extends('layouts.app')

@section('content')
    @include('components.contacts.header')
    
    @include('components.contacts.info')
    
    @include('components.contacts.form')

    @include('components.contacts.map')
@endsection
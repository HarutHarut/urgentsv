@extends('admin.layouts.app')

@section('content')
    <h2 class="w-100 d-block text-center">Hello {{ Auth::user()->name }} 🖐</h2>
@endsection
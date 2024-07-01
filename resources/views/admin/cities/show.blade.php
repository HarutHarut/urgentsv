@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title text-capitalize">{{ $item->name_fr }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control mb-2" id="name_en" name="name_en" required max="255" min="2" value="{{ $item->name_en }}" placeholder="English">
                        <input type="text" class="form-control mb-2" id="name_ru" name="name_ru" required max="255" min="2" value="{{ $item->name_ru }}" placeholder="Русский">
                        <input type="text" class="form-control mb-2" id="name_fr" name="name_fr" required max="255" min="2" value="{{ $item->name_fr }}" placeholder="France">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
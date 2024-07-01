@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">{{ $item->name_en }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Site Name -->
                    <div class="form-group">
                        <label>Site Name</label>
                        <input type="text" class="form-control mb-2" name="name_en" max="255" min="1" placeholder="English" value="{{ $item->name_en }}" required>
                        <input type="text" class="form-control mb-2" name="name_ru" max="255" min="1" placeholder="Русский" value="{{ $item->name_ru }}" required>
                        <input type="text" class="form-control mb-2" name="name_fr" max="255" min="1" placeholder="France" value="{{ $item->name_fr }}" required>
                    </div> 

                    <!-- Map Code -->
                    <div class="form-group">
                        <label>Map Code</label>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $item->map }}" allowfullscreen></iframe>
                        </div>
                        <textarea rows="3" class="form-control mb-2" name="map" min="1" placeholder="Map Code" required>{{ $item->map }}</textarea>
                    </div> 

                    <!-- Logo -->
                    <div class="form-group">
                        <label class="w-100 d-block">Logo</label>
                        <img src="{{ $image_path }}/{{ $item->logo }}" style="max-width: 100%;" class="rounded responsive" alt="Image">
                        <input type="file" class="form-control mb-2" name="logo_light">
                    </div>

                    <!-- Favicon -->
                    <div class="form-group">
                        <label class="w-100 d-block">Favicon</label>
                        <img src="{{ $image_path }}/{{ $item->favicon }}" style="max-width: 100%;" class="rounded responsive" alt="Favicon">
                        <input type="file" class="form-control mb-2" name="favicon">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
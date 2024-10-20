@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title text-capitalize">{{ $item->page }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control mb-2" id="title_en" name="title_en" required max="255" min="2" value="{{ $item->title_en }}" placeholder="English">
                        <input type="text" class="form-control mb-2" id="title_ru" name="title_ru" required max="255" min="2" value="{{ $item->title_ru }}" placeholder="Русский">
                        <input type="text" class="form-control mb-2" id="title_fr" name="title_fr" required max="255" min="2" value="{{ $item->title_fr }}" placeholder="France">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="6" class="form-control mb-2" id="description_en" name="description_en" required max="99999" min="2" placeholder="English">{{ $item->description_en }}</textarea>
                        <textarea rows="6" class="form-control mb-2" id="description_ru" name="description_ru" required max="99999" min="2" placeholder="Русский">{{ $item->description_ru }}</textarea>
                        <textarea rows="6" class="form-control mb-2" id="description_fr" name="description_fr" required max="99999" min="2" placeholder="France">{{ $item->description_fr }}</textarea>
                    </div>
                    <div class="form-group w-75">
                        <label class="d-block w-100">Image</label>
                        <img src="{{ $image_path }}/seo/{{ $item->img }}" class="w-100 resonsive rounded" alt="Image">
                        <input type="file" class="form-control mb-2" id="img" name="img">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
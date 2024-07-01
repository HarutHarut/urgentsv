@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">{{ 'Description' }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control mb-2" name="title_en" max="255" min="2" placeholder="English" required value="{{ $item->title_en }}">
                        <input type="text" class="form-control mb-2" name="title_ru" max="255" min="2" placeholder="Русский" required value="{{ $item->title_ru }}">
                        <input type="text" class="form-control mb-2" name="title_fr" max="255" min="2" placeholder="France" required value="{{ $item->title_fr }}">
                    </div>
                    
                    <div class="form-group">
                        <label>Description</label>
                        <textarea data-description="true" rows="10" class="form-control mb-2" id="description_en" name="description_en" required  min="2" placeholder="English">{{ $item->description_en }}</textarea>
                        <textarea data-description="true" rows="10" class="form-control mb-2" id="description_ru" name="description_ru" required  min="2" placeholder="Русский">{{ $item->description_ru }}</textarea>
                        <textarea data-description="true" rows="10" class="form-control mb-2" id="description_fr" name="description_fr" required  min="2" placeholder="France">{{ $item->description_fr }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
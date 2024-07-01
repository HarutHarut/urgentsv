@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-body">
                <form action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Title -->
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control mb-2" name="title_en" max="255" min="1" placeholder="English" value="{{ $item->title_en }}" required>
                        <input type="text" class="form-control mb-2" name="title_ru" max="255" min="1" placeholder="Русский" value="{{ $item->title_ru }}" required>
                        <input type="text" class="form-control mb-2" name="title_fr" max="255" min="1" placeholder="France" value="{{ $item->title_fr }}" required>
                    </div>

                    <!-- Sub Title -->
                    <div class="form-group">
                        <label>Sub Title</label>
                        <input type="text" class="form-control mb-2" name="sub_title_en" max="255" min="1" placeholder="English" value="{{ $item->sub_title_en }}" required>
                        <input type="text" class="form-control mb-2" name="sub_title_ru" max="255" min="1" placeholder="Русский" value="{{ $item->sub_title_ru }}" required>
                        <input type="text" class="form-control mb-2" name="sub_title_fr" max="255" min="1" placeholder="France" value="{{ $item->sub_title_fr }}" required>
                    </div>   
                    
                    <!-- Description -->
                    <div class="form-group">
                        <label>Description</label>
                        <textarea data-description="true" rows="3" class="form-control mb-2" name="description_en" min="1" placeholder="English" required>{{ $item->description_en }}</textarea>
                        <textarea data-description="true" rows="3" class="form-control mb-2" name="description_ru" min="1" placeholder="Русский" required>{{ $item->description_ru }}</textarea>
                        <textarea data-description="true" rows="3" class="form-control mb-2" name="description_fr" min="1" placeholder="France" required>{{ $item->description_fr }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
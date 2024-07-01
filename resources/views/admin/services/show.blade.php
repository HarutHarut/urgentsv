@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">{{ $item->title_fr}}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Title -->
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control mb-2" name="title_en" max="255" min="1" placeholder="English" value="{{ $item->title_en }}" required>
                        <input type="text" class="form-control mb-2" name="title_ru" max="255" min="1" placeholder="Русский" value="{{ $item->title_ru }}" required>
                        <input type="text" class="form-control mb-2" name="title_fr" max="255" min="1" placeholder="France" value="{{ $item->title_fr }}" required>
                    </div> 
                    
                    <!-- Position ID -->
                    <div class="form-group">
                        <label>Position ID</label>
                        <input type="number" class="form-control mb-2" name="position_id" max="255" min="1" placeholder="Position ID" value="{{ $item->position_id }}" required>
                    </div> 
                    
                    <!-- Description -->
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="3" class="form-control mb-2" name="description_en" min="1" placeholder="English" required>{!! nl2br(e($item->description_en)) !!}</textarea>
                        <textarea rows="3" class="form-control mb-2" name="description_ru" min="1" placeholder="Русский" required>{!! nl2br(e($item->description_ru)) !!}</textarea>
                        <textarea rows="3" class="form-control mb-2" name="description_fr" min="1" placeholder="France" required>{!! nl2br(e($item->description_fr)) !!}</textarea>
                    </div>

                    <!-- Icon -->
                    <div class="form-group">
                        <label class="w-100 d-block">Icon</label>
                        <img src="{{ $image_path }}/service/{{ $item->icon }}" class="responsive rounded" style="max-width: 100%;" alt="Image">
                        <input type="file" class="form-control mb-2" name="icon">
                    </div> 

                     <!-- Image -->
                    <div class="form-group">
                        <label class="w-100 d-block">Image</label>
                        <img src="{{ $image_path }}/service/img/{{ $item->img }}" class="responsive rounded" style="max-width: 100%;" alt="Image">
                        <input type="file" class="form-control mb-2" name="img">
                    </div>  

                    <!-- Meta Title -->
                    <div class="form-group">
                        <label>Meta Title</label>
                        <input type="text" class="form-control mb-2" name="meta_title_en" max="255" min="1" placeholder="Meta Title En" value="{{ $item->meta_title_en }}" required>
                        <input type="text" class="form-control mb-2" name="meta_title_fr" max="255" min="1" placeholder="Meta Title Fr" value="{{ $item->meta_title_fr }}" required>
                    </div> 

                    <!-- Meta Description -->
                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea rows="3" class="form-control mb-2" name="meta_description_en" max="9999" min="1" placeholder="Meta Description En" required>{{ $item->meta_description_en }}</textarea>
                        <textarea rows="3" class="form-control mb-2" name="meta_description_fr" max="9999" min="1" placeholder="Meta Description Fr" required>{{ $item->meta_description_fr }}</textarea>
                    </div> 


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
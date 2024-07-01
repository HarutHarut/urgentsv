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
                    
                    <!-- Service -->
                    <div class="form-group">
                        <label>Service</label>
                        <select class="form-control mb-2" name="service_id">
                            @if(isset($services) && count($services) > 0)
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" @if($service->id == $item->service_id) selected @endif>{{ $service->{'title_fr'} }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>  

                    <!-- Price -->
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control mb-2" name="price" max="255" min="1" placeholder="Price" value="{{ $item->price }}" required>
                    </div> 
                    
                    <!-- Description -->
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="3" class="form-control mb-2" name="description_en" min="1" placeholder="English" required>{!! nl2br(e($item->description_en)) !!}</textarea>
                        <textarea rows="3" class="form-control mb-2" name="description_ru" min="1" placeholder="Русский" required>{!! nl2br(e($item->description_ru)) !!}</textarea>
                        <textarea rows="3" class="form-control mb-2" name="description_fr" min="1" placeholder="France" required>{!! nl2br(e($item->description_fr)) !!}</textarea>
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
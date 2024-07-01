@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">{{ $item->title_hy }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Status -->
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control mb-2" name="status" required>
                            <option value="1" @if($item->status == 1) selected @endif>Active</option>
                            <option value="0" @if($item->status == 0) selected @endif>Passive</option>
                        </select>
                    </div> 

                    <!-- Title -->
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control mb-2" name="title_en" max="255" min="1" placeholder="English" value="{{ $item->title_en }}" required>
                        <input type="text" class="form-control mb-2" name="title_ru" max="255" min="1" placeholder="Русский" value="{{ $item->title_ru }}" required>
                        <input type="text" class="form-control mb-2" name="title_hy" max="255" min="1" placeholder="Հայերեն" value="{{ $item->title_hy }}" required>
                    </div> 

                    <!-- Big Title -->
                    <div class="form-group">
                        <label>Big Title</label>
                        <input type="text" class="form-control mb-2" name="big_title_en" max="255" min="1" placeholder="English" value="{{ $item->big_title_en }}" required>
                        <input type="text" class="form-control mb-2" name="big_title_ru" max="255" min="1" placeholder="Русский" value="{{ $item->big_title_ru }}" required>
                        <input type="text" class="form-control mb-2" name="big_title_hy" max="255" min="1" placeholder="Հայերեն" value="{{ $item->big_title_hy }}" required>
                    </div> 

                    <!-- Description -->
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="3" class="form-control mb-2" name="description_en" min="1" placeholder="English" value="{{ $item->title_en }}" required>{{ $item->description_en }}</textarea>
                        <textarea rows="3" class="form-control mb-2" name="description_ru" min="1" placeholder="Русский" value="{{ $item->title_ru }}" required>{{ $item->description_ru }}</textarea>
                        <textarea rows="3" class="form-control mb-2" name="description_hy" min="1" placeholder="Հայերեն" value="{{ $item->title_hy }}" required>{{ $item->description_hy }}</textarea>
                    </div> 

                    <!-- Product -->
                    <div class="form-group">
                        <label>Product</label>
                        <select class="form-control mb-2" name="product_id" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" @if($product->id == $item->product_id) selected @endif>{{ $product->title_en }}</option>
                            @endforeach
                        </select>
                    </div> 

                    <!-- Date -->
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" class="form-control mb-2" name="date" max="255" min="1" placeholder="year/month/day | 2021/01/30" value="{{ $item->date }}" required>
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                        <label class="w-100 d-block">Image</label>
                        <img src="{{ $image_path }}/banner/{{ $item->img }}" style="max-width: 100%;" class="rounded responsive" alt="Image">
                        <input type="file" class="form-control mb-2" name="img">
                    </div>

                    <!-- Background Image -->
                    <div class="form-group">
                        <label class="w-100 d-block">Background Image</label>
                        <img src="{{ $image_path }}/backgrounds/{{ $item->bg_img }}" style="max-width: 100%;" class="rounded responsive" alt="Background Image">
                        <input type="file" class="form-control mb-2" name="bg_img">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
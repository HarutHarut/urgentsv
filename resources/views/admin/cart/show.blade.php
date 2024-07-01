@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title text-capitalize">{{ $item->product['title_en'] }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group w-75">
                        <a target="_blank" href="{{ route('products-admin-show', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->product_id]) }}">
                            <img src="{{ $image_path }}/product/{{ $item->product['img'] }}" style="max-width: 100%;" class="resonsive rounded" alt="Image">
                        </a>
                    </div>
                    <div class="form-group">
                        <label>Product</label>
                        <select name="product_id" class="form-control" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" @if($product->id == $item->product_id) selected @endif>{{ $product->title_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Count</label>
                        <input type="number" class="form-control mb-2" name="count" required max="{{ $item->product['in_stock']['count'] }}" min="0" value="{{ $item->count }}" placeholder="Count">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control mb-2" name="price" required min="1" value="{{ $item->price }}" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="1" @if($item->status == 1) selected @endif>In Cart</option>
                            <option value="0" @if($item->status == 0) selected @endif>Out of Cart</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
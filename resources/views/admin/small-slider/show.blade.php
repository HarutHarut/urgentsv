@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">{{ $item->product['title_en'] }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Product ID -->
                    <div class="form-group">
                        <label>Product ID</label>
                        <select name="product_id" class="form-control" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" @if($item->product_id == $product->id) selected @endif>{{ $product->title_en }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Position ID -->
                    <div class="form-group">
                        <label>Position ID</label>
                        <input type="number" class="form-control mb-2" name="position_id" max="255" min="1" value="{{ $item->position_id }}" placeholder="Position ID" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
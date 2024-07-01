@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title"><a target="_blank" href="https://en.wikipedia.org/wiki/ISO_3166-2:FR">Link</a></h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                   <div class="form-group">
                        <label><a href="http://www.geonames.org/postalcode-search.html?q=paris&country=FR">Codes here</a></label>
                        <input type="text" class="form-control mb-2" value="{{ $item->location }}" name="location" max="255" min="1" required placeholder="City Code">
                        <input type="text" class="form-control mb-2" value="{{ $item->phone }}" name="phone" max="255" min="1" required placeholder="Phone">
                    </div>  

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
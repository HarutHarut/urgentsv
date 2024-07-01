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
                    <!-- Title -->
                    <div class="form-group">
                        <label>Title</label>
                        <input form="updateForm" type="text" class="form-control mb-2" name="title_en" max="255" min="1" placeholder="English" value="{{ $item->title_en }}" required>
                        <input form="updateForm" type="text" class="form-control mb-2" name="title_ru" max="255" min="1" placeholder="Русский" value="{{ $item->title_ru }}" required>
                        <input form="updateForm" type="text" class="form-control mb-2" name="title_hy" max="255" min="1" placeholder="Հայերեն" value="{{ $item->title_hy }}" required>
                    </div> 

                    <!-- Description -->
                    <div class="form-group">
                        <label>Description</label>
                        <textarea form="updateForm" rows="7" class="form-control mb-2" name="description_en" max="255" min="1" placeholder="English" required>{{ $item->description_en }}</textarea>
                        <textarea form="updateForm" rows="7" class="form-control mb-2" name="description_ru" max="255" min="1" placeholder="Русский" required>{{ $item->description_ru }}</textarea>
                        <textarea form="updateForm" rows="7" class="form-control mb-2" name="description_hy" max="255" min="1" placeholder="Հայերեն" required>{{ $item->description_hy }}</textarea>
                    </div> 

                    <!-- URL -->
                    <div class="form-group">
                        <label>URL</label>
                        <input form="updateForm" type="text" class="form-control mb-2" name="url" max="255" min="1" placeholder="URL" value="{{ $item->url }}" required>
                    </div>
                    
                    <!-- Position ID -->
                    <div class="form-group">
                        <label>Position ID</label>
                        <input form="updateForm" type="text" class="form-control mb-2" name="position_id" max="255" min="1" placeholder="Position ID" value="{{ $item->position_id }}" required>
                    </div>

                    <!-- Cover Image -->
                    <div class="form-group">
                        <label class="w-100 d-block">Cover Image</label>
                        <img src="{{ $image_path }}/blog/{{ $item->img }}" style="max-width: 100%;" class="rounded responsive" alt="Image">
                        <input type="file" class="form-control mb-2" form="updateForm" name="img">
                    </div>

                    <!-- Gallery -->
                    <div class="form-group pt-20">
                        <label class="w-100 d-block">Update Iimages</label>
                        @if(isset($item->images) && count($item->images) > 0) 
                            <div class="row">
                                @foreach($item->images as $image)
                                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                                        <img src="{{ asset($image_path.'/blog/slider/'.$image->img) }}" class="w-100 responsive rounded" alt="Image">
                                        <div class="row no-gutters">
                                            <form class="col-12" id="image-change-{{ $image->id }}" enctype="multipart/form-data" action="{{ route('blog-admin-update-image', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $image->id]) }}" method="post">
                                                @csrf
                                                <input type="file" form="image-change-{{ $image->id }}" required name="img" class="form-control">
                                                <button type="submit" class="btn-primary btn mr-2 float-left d-inline p-1 mt-1"><span><i class="fa fa-edit"></i> {{ translating('update') }}</span></button>
                                                <a href="{{ route('blog-admin-destroy-image', ['locale' => app()->getLocale(), 'currency' => 'amd' ,'id' => $image->id]) }}" class="btn mt-1 p-1 btn-danger mr-2 float-left"><span><i class="fa fa-trash"></i> {{ translating('delete') }}</span></a>
                                                <p style="clear: both;"></p>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <label class="w-100 d-block">Upload More Images</label>
                        <input form="updateForm" id="gallery" type="file" class="form-control" multiple name="gallery[]">
                    </div>

                    <!-- Embed -->
                    <div class="form-group pt-20">
                        @if(isset($item->embeds) && count($item->embeds) > 0) 
                            <label class="w-100 d-block">Update Embed Code</label>
                            <div class="row">
                                @foreach($item->embeds as $embed)
                                    <div class="col-12 mb-4">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            {!! $embed->url !!}
                                        </div>
                                        <div class="row no-gutters">
                                            <form class="col-12" id="embed-change-{{ $embed->id }}" action="{{ route('blog-admin-update-embed', ['locale' => app()->getLocale(),  'currency' => 'amd', 'id' => $embed->id]) }}" method="post">
                                                @csrf
                                                <textarea class="mb-2 form-control" placeholder="{{ translating('change-embed') }}" form="embed-change-{{ $embed->id }}" name="change_embed">{{ $embed->url }}</textarea>
                                                <button type="submit" class="mt-1 btn btn-primary mr-2 float-left d-inline"><span><i class="fa fa-edit"></i> {{ translating('update') }}</span></button>
                                                <a href="{{ route('blog-admin-destroy-embed', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $embed->id]) }}" class="mt-1 btn btn-danger mr-2 float-left"><span><i class="fa fa-trash"></i> {{ translating('delete') }}</span></a>
                                                <p style="clear: both;"></p>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>      
                        @endif
                        <label class="w-100 d-block">Insert Embed Code</label>
                        <textarea form="updateForm" rows="4" placeholder="Embed" class="w-100 p-2 form-control" name="embed" autocomplete="embed"></textarea>
                    </div>
                <form id="updateForm" action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" form="updateForm" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
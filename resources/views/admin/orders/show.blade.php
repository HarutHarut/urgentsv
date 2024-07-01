@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">{{  $item->service_fr }} | Created at: {{ $item->created_at }}</h4>

                </div>
            </div>
            <div class="card-body">
                <form action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Type -->
                    <div class="form-group">
                        <label>Type</label>
                        <select name="type" class="form-control" required>
                            <option value="1" @if($item->type == 1) selected @endif>Waiting</option>
                            <option value="2" @if($item->type == 2) selected @endif>Finished Success</option>
                            <option value="4" @if($item->type == 4) selected @endif>Finished Payed Success</option>
                            <option value="3" @if($item->type == 3) selected @endif>Canceled</option>
                        </select>
                    </div>
                    
                    <!-- Status -->
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control mb-2" name="status_en" max="255" min="1" placeholder="English" value="{{ $item->status_en }}" required>
                        <input type="text" class="form-control mb-2" name="status_ru" max="255" min="1" placeholder="Русский" value="{{ $item->status_ru }}" required>
                        <input type="text" class="form-control mb-2" name="status_fr" max="255" min="1" placeholder="France" value="{{ $item->status_fr }}" required>
                    </div> 

                    <!-- Client Name -->
                    <div class="form-group">
                        <label>Client Name</label>
                        <input type="text" class="form-control mb-2" name="client_name_en" max="255" min="1" placeholder="English" value="{{ $item->client_name_en }}" required>
                        <input type="text" class="form-control mb-2" name="client_name_ru" max="255" min="1" placeholder="Русский" value="{{ $item->client_name_ru }}" required>
                        <input type="text" class="form-control mb-2" name="client_name_fr" max="255" min="1" placeholder="France" value="{{ $item->client_name_fr }}" required>
                    </div> 

                    <!-- Service -->
                    <div class="form-group">
                        <label>Service</label>
                        <input type="text" class="form-control mb-2" name="service_en" max="255" min="1" placeholder="English" value="{{ $item->service_en }}" required>
                        <input type="text" class="form-control mb-2" name="service_ru" max="255" min="1" placeholder="Русский" value="{{ $item->service_ru }}" required>
                        <input type="text" class="form-control mb-2" name="service_fr" max="255" min="1" placeholder="France" value="{{ $item->service_fr }}" required>
                    </div> 

                    <!-- Worker -->
                    <div class="form-group">
                        <label>Worker</label>
                        <select name="user_id" class="form-control" required>
                            @if(isset($users) && count($users) > 0)
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if($user->id == $item->user_id) selected @endif>{{ $user->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control mb-2" name="phone" max="255" min="1" placeholder="Phone" value="{{ $item->phone }}" required>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control mb-2" name="address_en" placeholder="English" value="{{ $item->address_en }}" required>
                        <input type="text" class="form-control mb-2" name="address_ru" placeholder="Русский" value="{{ $item->address_ru }}" required>
                        <input type="text" class="form-control mb-2" name="address_fr" placeholder="France" value="{{ $item->address_fr }}" required>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="3" class="form-control mb-2" name="description_en" placeholder="English" required>{{ $item->description_en }}</textarea>
                        <textarea rows="3" class="form-control mb-2" name="description_ru" placeholder="Русский" required>{{ $item->description_ru }}</textarea>
                        <textarea rows="3" class="form-control mb-2" name="description_fr" placeholder="France" required>{{ $item->description_fr }}</textarea>
                    </div>

                    <!-- Order Price -->
                    <div class="form-group">
                        <label>Order Price</label>
                        <input type="number" class="form-control mb-2" name="price" placeholder="Order Price" value="{{ $item->price }}" required>
                    </div>

                    <!-- Has Tax Price -->
                    <div class="form-group">
                        <label>Has Tax Price ?</label>
                        <select name="has_tax" class="form-control" required>
                            <option value="1" @if($item->has_tax == 1) selected @endif>Yes</option>
                            <option value="0" @if($item->has_tax == 0) selected @endif>No</option>
                        </select>
                    </div>

                    <!-- Tax Price -->
                    <div class="form-group">
                        <label>Tax Price</label>
                        <input type="text" class="form-control mb-2" disabled placeholder="Tax Price" value="{{ translating('euro') }} {{ getTaxPrice($item->price, $item->has_tax) }}" required>
                    </div>

                    <!-- Material Price -->
                    <div class="form-group">
                        <label>Material Price</label>
                        <input type="number" class="form-control mb-2" name="material_price" placeholder="Material Price" value="{{ $item->material_price }}" required>
                    </div>

                    <!-- Worker Price -->
                    <div class="form-group">
                        <label>Worker Price</label>
                        <input type="text" class="form-control mb-2" disabled placeholder="Worker Price" value="{{ getWorkerAndIncomePrice($item->price, $item->material_price, $item->has_tax) }}" required>
                    </div>

                    <!-- Income Price -->
                    <div class="form-group">
                        <label>Income Price</label>
                        <input type="text" class="form-control mb-2" disabled placeholder="Income Price" value="{{ translating('euro') }} {{ getWorkerAndIncomePrice($item->price, $item->material_price, $item->has_tax) }}" required>
                    </div>

                    <!-- Created Date -->
                    <div class="form-group">
                        <label>Created Date</label>
                        <input type="text" class="form-control mb-2" name="created_at" disabled placeholder="Created At" value="{{ $item->created_at }}" required>
                    </div>

                    <!-- Updated Date -->
                    <div class="form-group">
                        <label>Updated Date</label>
                        <input type="text" class="form-control mb-2" name="updated_at" disabled placeholder="Updated At" value="{{ $item->updated_at }}" required>
                    </div>

                    <!-- Facture -->
                    <div class="form-group">
                        <label class="w-100 d-block">Facture</label>
                        @if(isset($item->facture) && $item->facture != null)
                            <a href="{{ route('download-pdf', ['locale' => app()->getLocale(), 'id' => $item->facture['id']]) }}" class="btn btn-primary">Download</a>
                        @endif
                        <input type="file" class="form-control mb-2" name="facture">
                    </div>                    

                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'editor')
                        <button type="submit" class="btn btn-primary">Update</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <div class="export-buttons m-b-20">
                        <a href="#" id="exportCSV" class="btn btn-sm btn-primary float-right ml-2"><i class="ti ti-download"></i> Export To CSV</a>
                        <a href="#" id="exportExcel" class="btn btn-sm btn-primary float-right"><i class="ti ti-download"></i> Export To Excel</a>
                        <p class="clear"></p>
                    </div>
                    <table id="datatable" class="display compact table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Client Name</th>
                                <th>Worker Name</th>
                                <th>City</th>
                                <th>Service</th>
                                <th>Phone</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Created date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($items as $key => $item)
                           
                            <tr>
                                <td>{{ ++$key }}</td>
                                @if($item->type == '1')
                                    <td class="text-warning">In Process</td>
                                @elseif($item->type == '2')
                                    <td class="text-info">Finished Success</td>
                                @elseif($item->type == '3')
                                    <td class="text-danger">Canceled</td>
                                @else
                                    <td class="text-success">Payed Success</td>
                                @endif
                                <td>{{ $item->client_name_fr }}</td>
                                <td class="text-primary">
                                    @if(isset($item->user['city']) && $item->user['city'] != NULL)
                                    <a href="{{ route('users-admin-order', ['locale' => app()->getLocale(), 'id' => $item->user_id]) }}">{{ $item->user['name'] }}</a>
                                    @endif
                                </td>
                                <td class="text-primary">
                                    @if(isset($item->user['city']) && $item->user['city'] != NULL)
                                        <a href="{{ route('users-admin-city', ['locale' => app()->getLocale(), 'id' => $item->user['city']['id']]) }}">
                                        {{ $item->user['city']['name_fr'] }}</a>
                                    @endif
                                </td>
                                <td>{{ $item->service_fr }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ translating('euro') }} {{ $item->price }}</td>
                                <td>{{ $item->status_fr }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @if(Auth::user()->role == 'admin')
                                    <!-- Delete -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#openDeleteModal{{ $item->id }}"><i class="ti ti-close"></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="openDeleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="openDeleteModal{{ $item->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="openDeleteModal{{ $item->id }}Label">Are You Sure ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                                                <a class="btn btn-sm btn-primary" href="{{ route($route.'-admin-destroy', ['locale' => app()->getlocale(), 'id' => $item->id]) }}">Yes</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Delete -->
                                    @endif
                                    <a class="btn btn-sm btn-primary" href="{{ route($route.'-admin-show', ['locale' => app()->getlocale(), 'id' => $item->id]) }}"><i class="ti ti-pencil-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<!-- Add new Modal -->
<div class="modal fade" id="addNewItem" tabindex="-1" role="dialog" aria-labelledby="addNewItemLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addNewItemLabel">Add new item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Contnet -->
                <!-- Type -->
                <div class="form-group">
                    <label>Type</label>
                    <select form="add-new-item" name="type" class="form-control" required>
                        <option value="1">Waiting</option>
                        <option value="2">Finished Success</option>
                        <option value="4">Finished Payed Success</option>
                        <option value="3">Canceled</option>
                    </select>
                </div>
                
                <!-- Status -->
                <div class="form-group">
                    <label>Status</label>
                    <input type="text" class="form-control mb-2" form="add-new-item" name="status_en" max="255" min="1" placeholder="English">
                    <input type="text" class="form-control mb-2" form="add-new-item" name="status_ru" max="255" min="1" placeholder="Русский">
                    <input type="text" class="form-control mb-2" form="add-new-item" name="status_fr" max="255" min="1" placeholder="France" required>
                </div> 

                <!-- Client Name -->
                <div class="form-group">
                    <label>Client Name</label>
                    <input type="text" class="form-control mb-2" form="add-new-item" name="client_name_en" max="255" min="1" placeholder="English">
                    <input type="text" class="form-control mb-2" form="add-new-item" name="client_name_ru" max="255" min="1" placeholder="Русский">
                    <input type="text" class="form-control mb-2" form="add-new-item" name="client_name_fr" max="255" min="1" placeholder="France" required>
                </div> 

                <!-- Service -->
                <div class="form-group">
                    <label>Service</label>
                    <input type="text" class="form-control mb-2" form="add-new-item" name="service_en" max="255" min="1" placeholder="English">
                    <input type="text" class="form-control mb-2" form="add-new-item" name="service_ru" max="255" min="1" placeholder="Русский">
                    <input type="text" class="form-control mb-2" form="add-new-item" name="service_fr" max="255" min="1" placeholder="France" required>
                </div> 

                <!-- Worker -->
                <div class="form-group">
                    <label>Worker</label>
                    <select form="add-new-item" name="user_id" class="form-control" required>
                        @if(isset($users) && count($users) > 0)
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control mb-2" form="add-new-item" name="phone" max="255" min="1" placeholder="Phone" required>
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control mb-2" form="add-new-item" name="address_en" placeholder="English">
                    <input type="text" class="form-control mb-2" form="add-new-item" name="address_ru" placeholder="Русский">
                    <input type="text" class="form-control mb-2" form="add-new-item" name="address_fr" placeholder="France" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label>Description</label>
                    <textarea rows="3" class="form-control mb-2" form="add-new-item" name="description_en" placeholder="English"></textarea>
                    <textarea rows="3" class="form-control mb-2" form="add-new-item" name="description_ru" placeholder="Русский"></textarea>
                    <textarea rows="3" class="form-control mb-2" form="add-new-item" name="description_fr" placeholder="France" required></textarea>
                </div>

                <!-- Has Tax Price -->
                <div class="form-group">
                    <label>Has Tax Price ?</label>
                    <select form="add-new-item" name="has_tax" class="form-control" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <!-- Order Price -->
                <div class="form-group">
                    <label>Order Price</label>
                    <input type="number" class="form-control mb-2" form="add-new-item" name="price" placeholder="Order Price" required>
                </div>

            <!-- End Contnet -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form id="add-new-item" action="{{route($route.'-admin-store',['locale' => app()->getLocale(), 'currency' => 'amd'])}}" method="post" enctype="multipart/form-data">
                @csrf
                <button type="submit" form="add-new-item" class="btn btn-primary">Save</button>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@endsection
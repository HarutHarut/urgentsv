@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-lg-3 pb-2 pr-2">
        <div class="p-4 rounded bg-primary text-light bg-primary">
            <i class="float-left fa fa-calendar h1"></i>
            <h4 class="float-right text-light">Day</h4>
            <div class="clearfix"></div>
            <hr>
            <p class="h4 text-light">{{ getUserTodayIncome(\Request::segment(5)) }}</p>
        </div>
    </div>

    <div class="col-lg-3 pb-2 pr-2">
        <div class="p-4 rounded bg-primary text-light bg-primary">
            <i class="float-left fa fa-calendar h1"></i>
            <h4 class="float-right text-light">Week</h4>
            <div class="clearfix"></div>
            <hr>
            <p class="h4 text-light">{{ getUserWeekOrder(\Request::segment(5)) }}</p>
        </div>
    </div>

    <div class="col-lg-3 pb-2 pr-2">
        <div class="p-4 rounded bg-primary text-light bg-primary">
            <i class="float-left fa fa-calendar h1"></i>
            <h4 class="float-right text-light">Month</h4>
            <div class="clearfix"></div>
            <hr>
            <p class="h4 text-light">{{ getUserMonthOrder(\Request::segment(5)) }}</p>
        </div>
    </div>

    <div class="col-lg-3 pb-2 pr-2">
        <div class="p-4 rounded bg-primary text-light bg-primary">
            <i class="float-left fa fa-calendar h1"></i>
            <h4 class="float-right text-light">Year</h4>
            <div class="clearfix"></div>
            <hr>
            <p class="h4 text-light">{{ getUserYearOrder(\Request::segment(5)) }}</p>
        </div>
    </div>

    <div class="col-lg-12 pb-2 pr-2">
        <div class="p-4 rounded bg-primary text-light bg-primary">
            <i class="float-left fa fa-calendar h1"></i>
            <h4 class="float-right text-light">All Time</h4>
            <div class="clearfix"></div>
            <hr>
            <p class="h4 text-light">{{ getUserAllTimeIncome(\Request::segment(5)) }}</p>
        </div>
    </div>
</div>
<!-- end row -->

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
                                <td>{{ $item->user['name'] }}</td>
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
                                                <a class="btn btn-sm btn-primary" href="{{ route('orders-admin-destroy', ['locale' => app()->getlocale(), 'id' => $item->id]) }}">Yes</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Delete -->
                                    @endif
                                    <a class="btn btn-sm btn-primary" href="{{ route('orders-admin-show', ['locale' => app()->getlocale(), 'id' => $item->id]) }}"><i class="ti ti-pencil-alt"></i></a>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addNewItemLabel">Add new item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Contnet -->
            
            <!-- Name -->
            <div class="form-group">
                <label>Name</label>
                <input type="text" form="add-new-item" class="form-control mb-2" name="name_en" max="255" min="1" placeholder="English">
                <input type="text" form="add-new-item" class="form-control mb-2" name="name_ru" max="255" min="1" placeholder="Русский">
                <input type="text" form="add-new-item" class="form-control mb-2" name="name_fr" max="255" min="1" placeholder="France" required>
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
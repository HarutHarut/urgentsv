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
            <p class="h4 text-light">{{ getCityTodayIncome(\Request::segment(5)) }}</p>
        </div>
    </div>

    <div class="col-lg-3 pb-2 pr-2">
        <div class="p-4 rounded bg-primary text-light bg-primary">
            <i class="float-left fa fa-calendar h1"></i>
            <h4 class="float-right text-light">Week</h4>
            <div class="clearfix"></div>
            <hr>
            <p class="h4 text-light">{{ getCityWeekIncome(\Request::segment(5)) }}</p>
        </div>
    </div>

    <div class="col-lg-3 pb-2 pr-2">
        <div class="p-4 rounded bg-primary text-light bg-primary">
            <i class="float-left fa fa-calendar h1"></i>
            <h4 class="float-right text-light">Month</h4>
            <div class="clearfix"></div>
            <hr>
            <p class="h4 text-light">{{ getCityMonthIncome(\Request::segment(5)) }}</p>
        </div>
    </div>

    <div class="col-lg-3 pb-2 pr-2">
        <div class="p-4 rounded bg-primary text-light bg-primary">
            <i class="float-left fa fa-calendar h1"></i>
            <h4 class="float-right text-light">Year</h4>
            <div class="clearfix"></div>
            <hr>
            <p class="h4 text-light">{{ getCityYearIncome(\Request::segment(5)) }}</p>
        </div>
    </div>

    <div class="col-lg-12 pb-2 pr-2">
        <div class="p-4 rounded bg-primary text-light bg-primary">
            <i class="float-left fa fa-calendar h1"></i>
            <h4 class="float-right text-light">All Time</h4>
            <div class="clearfix"></div>
            <hr>
            <p class="h4 text-light">{{ getCityAllTimeIncome(\Request::segment(5)) }}</p>
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
                                <th>Name</th>
                                <th>Created date</th>
                                <th>Updated date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($items as $key => $item)
                                @if(isset($item->city) && $item->city != NULl)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td class="text-primary">
                                            <a href="{{ route('users-admin-order', ['locale' => app()->getLocale(), 'id' => $item->id]) }}">
                                                {{ $item->name }}
                                            </a>
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
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
                                                        <a class="btn btn-sm btn-primary" href="{{ route($route.'-admin-destroy', ['locale' => app()->getlocale(), 'currency' => 'amd', 'id' => $item->id]) }}">Yes</a>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Delete -->
                                            <a class="btn btn-sm btn-primary" href="{{ route($route.'-admin-show', ['locale' => app()->getlocale(), 'id' => $item->id]) }}"><i class="ti ti-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                @endif    
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
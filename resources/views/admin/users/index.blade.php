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
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Job Title</th>
                                <th>Role</th>
                                <th>Orders Count</th>
                                <th>Income</th>
                                <th>City</th>
                                <th>Created date</th>
                                <th>Updated date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($items as $key => $item)
                            
                            <tr>
                                <td>#{{ $item->id }}</td>
                                <td class="text-primary">
                                	<a href="{{ route('users-admin-order', ['locale' => app()->getlocale(), 'id' => $item->id]) }}">{{ $item->name }}</a>
                                </td>
                                <td>{{ $item->job_title }}</td>
                                <td>{{ $item->role }}</td>
                                @if(isset($item->orders) && count($item->orders) > 0)
                                    <td>{{ count($item->orders) }}</td>
                                @else
                                    <td>0</td>
                                @endif
                                <td>{{ translating('euro') }} {{ getUserIncome($item->id) }}</td>
                                <td>
                                    @if(isset($item->city['name_fr']) && $item->city['name_fr'] != NULL)
                                        {{ $item->city['name_fr'] }}
                                    @endif
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    @if($item->role != 'admin')
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
@endsection
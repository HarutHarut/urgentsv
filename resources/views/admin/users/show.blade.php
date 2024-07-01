@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    @if(Auth::user()->role == 'admin')
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title text-capitalize">{{ $item->name }} #{{ $item->id }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <img src="{{ $image_path }}/users/{{ $item->img }}" style="max-width: 100%;" class="responsive rounded" alt="{{ $item->name }}">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control mb-2" name="name" max="255" min="2" placeholder="Name" value="{{ $item->name }}" required>
                    </div>

                    <div class="form-group">
                        <label>Job Title</label>
                        <input type="text" class="form-control mb-2" name="job_title" max="255" min="2" placeholder="Job Title" value="{{ $item->job_title }}" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control mb-2" name="email" max="255" min="2" placeholder="Email" value="{{ $item->email }}" required>
                    </div>

                    <div class="form-group">
                        <label>Confirm</label>
                        <input type="number" class="form-control mb-2" name="confirm" min="0" max="1" placeholder="Confirm" value="{{ $item->confirm }}" required>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control mb-2" name="phone" min="1" max="255" placeholder="Phone" value="{{ $item->phone }}" required>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control mb-2" name="role" required>
                            <option value="user" @if($item->role == 'user') selected @endif>User</option>
                            <option value="editor"@if($item->role == 'editor') selected @endif>Editor</option>
                            <option value="admin" @if($item->role == 'admin') selected @endif>Admin</option>
                        </select>
                    </div>

                     <div class="form-group">
                        <label>City</label>
                        <select class="form-control mb-2" name="city_id" required>
                            @if(isset($cities) && count($cities) > 0)
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" @if($item->city_id == $city->id) selected @endif>{{ $city->name_fr }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title text-capitalize">Password Settings</h4>
                </div>
            </div>
            <div class="card-body">
                @if($item->type != 'user_by_facebook')
                    <form action="{{ route($route.'-admin-update-password', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control mb-2" name="password" max="255" min="1" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control mb-2" name="password_confirm" max="255" min="1" placeholder="Confirm Password" required>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                @else
                    <p class="text-danger">You can update only "Site Users" Password. User "{{ $item->name }}" is Facebook User :)</p>
                @endif
            </div>
        </div>
    </div>
    @endif

    <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title text-capitalize">User Options</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('change-account-secondary-data-admin', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="nationality" value="{{ $item->options['nationality'] }}" min="1" max="255" placeholder="{{ translating('nationality') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="from" value="{{ $item->options['from'] }}" min="1" max="255" placeholder="{{ translating('from') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="gender" value="{{ $item->options['gender'] }}" min="1" max="255" placeholder="{{ translating('gender') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="province" value="{{ $item->options['province'] }}" min="1" max="255" placeholder="{{ translating('province') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="address" value="{{ $item->options['address'] }}" min="1" max="255" placeholder="{{ translating('address') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="emplesment" value="{{ $item->options['emplesment'] }}" min="1" max="255" placeholder="{{ translating('emplesment') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="group_name" value="{{ $item->options['group_name'] }}" min="1" max="255" placeholder="{{ translating('group_name') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="jordique" value="{{ $item->options['jordique'] }}" min="1" max="255" placeholder="{{ translating('jordique') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="address_pec" value="{{ $item->options['address_pec'] }}" min="1" max="255" placeholder="{{ translating('address_pec') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="social_card_number" value="{{ $item->options['social_card_number'] }}" min="1" max="255" placeholder="{{ translating('social_card_number') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="tva_number" value="{{ $item->options['tva_number'] }}" min="1" max="255" placeholder="{{ translating('tva_number') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="document_type" value="{{ $item->options['document_type'] }}" min="1" max="255" placeholder="{{ translating('document_type') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="document_number" value="{{ $item->options['document_number'] }}" min="1" max="255" placeholder="{{ translating('document_number') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="date_expiration" value="{{ $item->options['date_expiration'] }}" min="1" max="255" placeholder="{{ translating('date_expiration') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="birth_day" value="{{ $item->options['birth_day'] }}" min="1" max="255" placeholder="{{ translating('birth_day') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input class="form-control" name="civique" value="{{ $item->options['civique'] }}" min="1" max="255" placeholder="{{ translating('civique') }}" type="text">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title text-capitalize">User Options</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('change-account-secondary-data-docs-admin', ['locale' => app()->getLocale(), 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('document_indentie') }}</label>
                            @if(isset($item->docs['document_indentie']) && $item->docs['document_indentie'] != null)
                                <a href="{{ route('download-data', ['locale' => app()->getLocale(), 'id' => $item->docs['id'], 'file' => 'document_indentie']) }}" class="text-primary">{{ translating('download') }}</a>
                            @endif
                            <input class="form-control" name="document_indentie"  type="file">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('doc_retro') }}</label>
                            @if(isset($item->docs['doc_retro']) && $item->docs['doc_retro'] != null)
                                <a href="{{ route('download-data', ['locale' => app()->getLocale(), 'id' => $item->docs['id'], 'file' => 'doc_retro']) }}" class="text-primary">{{ translating('download') }}</a>
                            @endif
                            <input class="form-control" name="doc_retro"  type="file">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('extrait_kbis_doc') }}</label>
                            <input class="form-control" name="extrait_kbis_doc"  type="file" value="{{ $item->docs['extrait_kbis_doc'] }}">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('n_extrais_doc') }}</label>
                            @if(isset($item->docs['n_extrais_doc']) && $item->docs['n_extrais_doc'] != null)
                                <a href="{{ route('download-data', ['locale' => app()->getLocale(), 'id' => $item->docs['id'], 'file' => 'n_extrais_doc']) }}" class="text-primary">{{ translating('download') }}</a>
                            @endif
                            <input class="form-control" name="n_extrais_doc"  type="file">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('n_assurance') }}</label>
                            <input class="form-control" name="n_assurance"  type="text" value="{{ $item->docs['n_assurance'] }}">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('d_license_doc') }}</label>
                            @if(isset($item->docs['d_license_doc']) && $item->docs['d_license_doc'] != null)
                                <a href="{{ route('download-data', ['locale' => app()->getLocale(), 'id' => $item->docs['id'], 'file' => 'd_license_doc']) }}" class="text-primary">{{ translating('download') }}</a>
                            @endif
                            <input class="form-control" name="d_license_doc"  type="file">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('date_experation') }}</label>
                            <input class="form-control" name="date_experation"  value="{{ $item->docs['date_experation'] }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('d_n_license') }}</label>
                            @if(isset($item->docs['d_n_license']) && $item->docs['d_n_license'] != null)
                                <a href="{{ route('download-data', ['locale' => app()->getLocale(), 'id' => $item->docs['id'], 'file' => 'd_n_license']) }}" class="text-primary">{{ translating('download') }}</a>
                            @endif
                            <input class="form-control" name="d_n_license"  type="file">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('n_license') }}</label>
                            <input class="form-control" name="n_license"  value="{{ $item->docs['n_license'] }}" type="text">
                        </div>

                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
<!-- end row -->
@endsection
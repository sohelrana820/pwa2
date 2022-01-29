@extends('layouts.main')

@section('title')
    @if(isset($model->id))
        Update User
    @else
        Add User
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sākums</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.grid') }}">Lietotāji</a></li>
                        <li class="breadcrumb-item active">
                            @if(isset($model->id))
                                Update User
                            @else
                                Create User
                            @endif
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">
                    @if(isset($model->id))
                        Update User
                    @else
                        Create New User
                    @endif
                </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ isset($model->id) ? route('users.update', ['id' => $model->id]) : route('users.store') }}">
                        @csrf

                        @if(isset($model->id))
                            @method('PUT')
                        @endif

                        <div class="row form-group">
                            <div class="col-lg-6 mb-3">
                                <label for="first_name" class="form-label">Vārds</label>
                                <input type="text"
                                       name="first_name"
                                       id="first_name"
                                       class="form-control"
                                       placeholder="Vārds"
                                       value="{{ $model->first_name ?? old('first_name') }}"
                                       required="required"
                                >
                                @error('first_name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="last_name" class="form-label">Uzvārds</label>
                                <input type="text"
                                       name="last_name"
                                       id="last_name"
                                       class="form-control"
                                       placeholder="Uzvārds"
                                       value="{{ $model->last_name ?? old('last_name') }}"
                                       required="required"
                                >

                                @error('last_name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6 mb-3">
                                <label for="email_address" class="form-label">Epasts</label>
                                <input type="email"
                                       name="email"
                                       id="email_address"
                                       class="form-control"
                                       placeholder="Epasts"
                                       value="{{ $model->email ?? old('email') }}"
                                       required="required"
                                >

                                @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="mobile_number" class="form-label">Mobilais numurs</label>
                                <input type="text"
                                       name="mobile_number"
                                       id="mobile_number"
                                       class="form-control"
                                       placeholder="Mobilais numurs"
                                       value="{{ $model->mobile_number ?? old('mobile_number') }}"
                                       required="required"
                                >


                                @error('mobile_number')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="useremail" class="form-label">Sertefikāta nr.</label>
                                    <input type="text"
                                           name="certificate_no"
                                           class="form-control" id="certificate_no"
                                           placeholder="Sertefikāta nr."
                                           value="{{ $model->certificate_no ?? old('certificate_no') }}"
                                           required="required"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-6 mb-3">
                                <label for="password" class="form-label">Parole</label>
                                <input type="password"
                                       name="password"
                                       id="password"
                                       class="form-control"
                                       placeholder="Parole"
                                >

                                @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="confirm_password" class="form-label">Apstiprināt paroli</label>
                                <input type="password"
                                       name="confirm_password"
                                       id="confirm_password"
                                       class="form-control"
                                       placeholder="Enter confirm password"
                                >

                                @error('confirm_password')
                                <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        @if(isset($model->id))
                            <div class="row form-group">
                                <div class="col-lg-6 mb-3">
                                    <label for="project-overview" class="form-label">Aktīvs statuss</label>
                                    <select name="active_status" class="form-control select2" data-toggle="select2">
                                        <option value="1" {{ $model->active_status == 1 ? 'selected' : '' }}>Aktīvs</option>
                                        <option value="2" {{ $model->active_status == 2 ? 'selected' : '' }}>Neaktīvs</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-success float-right">{{ isset($model->id) ? __('Atjaunināt') : __('Saglabāt') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{--    @if(isset($model->id))--}}
{{--        <div class="row">--}}
{{--            <div class="col-6">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title">Password Setting</h5>--}}
{{--                        <form method="post" action="{{ route('users.update.password', ['id' => $model->id]) }}">--}}
{{--                            @csrf--}}

{{--                            @method('PUT')--}}

{{--                            <div class="row form-group">--}}
{{--                                <div class="col-lg-12 mb-3">--}}
{{--                                    <label for="password" class="form-label">New Password</label>--}}
{{--                                    <input type="text"--}}
{{--                                           name="password"--}}
{{--                                           id="password"--}}
{{--                                           class="form-control"--}}
{{--                                           placeholder="Enter password"--}}
{{--                                           required="required"--}}
{{--                                    >--}}

{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback d-block" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row form-group">--}}
{{--                                <div class="col-lg-12 mb-3">--}}
{{--                                    <label for="confirm_password" class="form-label">Confirm New Password</label>--}}
{{--                                    <input type="text"--}}
{{--                                           name="confirm_password"--}}
{{--                                           id="confirm_password"--}}
{{--                                           class="form-control"--}}
{{--                                           placeholder="Enter confirm password"--}}
{{--                                           required="required"--}}
{{--                                    >--}}

{{--                                    @error('confirm_password')--}}
{{--                                    <span class="invalid-feedback d-block" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <button type="submit" class="btn btn-info float-right">Update</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
@endsection

@extends('layouts.main')

@section('title')
    Profils
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sākums</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Profils</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Profils</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                    <h4 class="mb-0 mt-2">{{ ucwords(auth()->user()->first_name) }} {{ ucwords(auth()->user()->last_name) }}</h4>
                    <p class="text-muted font-14">
                        {{ ucwords(auth()->user()->userRole->role->role_name) }}
                    </p>
                    <div class="text-start mt-3">
                        <p class="text-muted mb-2 font-13">
                            <strong>Full Name :</strong>
                            <span class="ms-2">
                                {{ ucwords(auth()->user()->first_name) }} {{ ucwords(auth()->user()->last_name) }}
                            </span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong>Mobilais numurs :</strong>
                            <span class="ms-2">
                                {{ auth()->user()->mobile_number }}
                            </span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong>Epasts :</strong>
                            <span class="ms-2 ">
                                {{ auth()->user()->email }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf

                            @method('PUT')

                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personiskā informācija</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">Vārds</label>
                                        <input type="text"
                                               name="first_name"
                                               value="{{ auth()->user()->first_name }}"
                                               required="required"
                                               class="form-control"
                                               id="firstname"
                                               placeholder="Vārds"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Uzvārds</label>
                                        <input type="text"
                                               name="last_name"
                                               class="form-control"
                                               id="lastname" placeholder="Uzvārds"
                                               value="{{ auth()->user()->last_name }}"
                                               required="required"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Epasts</label>
                                        <input type="email"
                                               name="email"
                                               class="form-control" id="useremail"
                                               placeholder="Epasts"
                                               value="{{ auth()->user()->email }}"
                                               required="required"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="usermobile" class="form-label">Mobilais numurs</label>
                                        <input type="text"
                                               name="mobile_number"
                                               class="form-control"
                                               id="usermobile"
                                               placeholder="Mobilais numurs"
                                               value="{{ auth()->user()->mobile_number }}"
                                               required="required"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Sertifikāta nr.</label>
                                        <input type="text"
                                               name="certificate_no"
                                               class="form-control" id="certificate_no"
                                               placeholder="Sertifikāta nr."
                                               value="{{ auth()->user()->certificate_no }}"
                                               required="required"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">Parole</label>
                                        <input type="password"
                                               name="password"
                                               class="form-control"
                                               id="userpassword"
                                               placeholder="Parole"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">Apstiprināt paroli</label>
                                        <input type="password"
                                               name="confirm_password"
                                               class="form-control"
                                               id="userconfirmpassword"
                                               placeholder="Apstiprināt paroli"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn btn-success mt-2">
                                    <i class="mdi mdi-content-save"></i> Atjaunināt
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

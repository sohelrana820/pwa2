@extends('layouts.auth')

@section('content')
    <div class="text-center w-75 m-auto">
        <h4 class="text-dark-50 text-center mt-0 fw-bold">Pieslēgties</h4>
        <p class="text-muted mb-4">Ievadiet savu e-pasta adresi un paroli, lai piekļūtu panelim.</p>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="emailaddress" class="form-label">Epasts</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Parole</label>
            <div class="input-group input-group-merge">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="mb-3 mb-3">
            @if (Route::has('password.request'))
                <div class="text-center">
                    <a class="btn btn-link" href="tel:+371 24040400">
                        Nepieciešamības gadījumā sazināties
                        <br/>
                        <i class="mdi mdi-cellphone-basic"></i> Telefona nr: +371 24040400
                    </a>
                </div>
            @endif
        </div>
        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Pieslēgties
                </button>
            </div>
        </div>
    </form>
@endsection

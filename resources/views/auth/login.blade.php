@extends('layouts.auth')

@section('content')
    <div class="text-center w-75 m-auto">
        <h4 class="text-dark-50 text-center mt-0 fw-bold">Sign In</h4>
        <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="emailaddress" class="form-label">Email address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your password?</small></a>
            <label for="password" class="form-label">Password</label>
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
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
    </form>
@endsection

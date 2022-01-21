@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <div class="text-center w-75 m-auto">
        <h4 class="text-dark-50 text-center mt-0 fw-bold">Sign In</h4>
        <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
    </div>
    <form action="#">
        <div class="mb-3">
            <label for="emailaddress" class="form-label">Email address</label>
            <input class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email">
        </div>
        <div class="mb-3">
            <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your password?</small></a>
            <label for="password" class="form-label">Password</label>
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" placeholder="Enter your password">
                <div class="input-group-text" data-password="false">
                    <span class="password-eye"></span>
                </div>
            </div>
        </div>
        <div class="mb-3 mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                <label class="form-check-label" for="checkbox-signin">Remember me</label>
            </div>
        </div>
        <div class="mb-3 mb-0 text-center">
            <button class="btn btn-primary" type="submit"> Log In </button>
        </div>
    </form>
@endsection

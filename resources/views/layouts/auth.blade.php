
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Project Management | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assets/css/app-modern-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />

    <!-- Custom CSS -->
    @yield('styles')

</head>

<body class="loading" data-layout-config='{"darkMode":false}'>
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="#">
                            <span><img src="assets/images/logo.png" alt="" height="18"></span>
                        </a>
                    </div>
                    <div class="card-body p-4">
                        @include('child.message')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer footer-alt">
    {{ date('Y') }} - {{ date('Y') }} © Project Management
</footer>

<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- Custom scripts -->
@yield('scripts')

</body>
</html>

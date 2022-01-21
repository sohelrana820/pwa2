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

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>

@include('child.top_header')

<div class="container-fluid">
    <div class="wrapper">
        @include('child.navbar')
        <div class="content-page">
            <div class="content">
                @include('child.message')
                @yield('content')
            </div>
            @include('child.footer')
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- Custom scripts -->
@yield('scripts')

</body>
</html>

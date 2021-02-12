<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <title>{{ config('app.name', 'NGR') }}</title>

    <link href="{{ secure_asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ secure_asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">LIRS</h1>

            </div>
            <h3>Lagos State Internal Revenue Service</h3>
            <p>Login in.</p>
                @yield('content')
            <p class="m-t"> <small>New Growth Application &copy; 2020 IT Unit</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ secure_asset('asset/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ secure_asset('asset/js/popper.min.js') }}"></script>
    <script src="{{ secure_asset('asset/js/bootstrap.js') }}"></script>

</body>

</html>

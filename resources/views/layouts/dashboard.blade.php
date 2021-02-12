<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">        
    <title>NgrApp - @yield('title')</title>

    <link href="{{ secure_asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- DATATABLE style -->
    <link rel="stylesheet" href="{{ secure_asset('assets/css/plugins/dataTables/datatables.min.css') }}">

    <!-- Toastr style -->
    <link href="{{ secure_asset('assets/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ secure_asset('assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">

    <link href="{{ secure_asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        @include('partials.sidebar')

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        @include('partials.navbar')
    </nav>
        </div>
        @yield('content')
        <br/>
        @include('partials.footer')
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ secure_asset('assets/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ secure_asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ secure_asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- DATATABLE script -->
    <script src="{{ secure_asset('assets/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Flot -->


    <!-- Peity -->
    <script src="{{ secure_asset('assets/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ secure_asset('assets/js/inspinia.js') }}"></script>
    <script src="{{ secure_asset('assets/js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ secure_asset('assets/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- GITTER -->
    <script src="{{ secure_asset('assets/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ secure_asset('assets/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->


    <!-- ChartJS-->


    <!-- Toastr -->

    @stack('dt-planning')
    @stack('dt-lands') 
    @stack('dt-horc')   
    @stack('team_crud')
    @stack('upload')
    <script>
    </script>
</body>
</html>

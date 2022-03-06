<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>{{ config('app.name') }} | {{ $title }}</title>

    <meta name="description" content="IntelC, Internet, Fibra óptica">
    <meta name="author" content="SmartFrame" />
    <meta name="copyright" content="IntelC" />
    <meta name="robots" content="index"/>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ============================================ -->
    <style>
        @media (min-width: 700px) {
            .img-cardmini {
                width: 114px;
            }
        }

        .flex {
            display: flex;
        }

        .list-default-style li {
            list-style: square inside;
            margin-left: 25px;
        }
    </style>

    @stack('styles_add')
    @yield('other_styles')

    <link rel="shortcut icon" type="image/png" href="favicon.png">

    <!-- CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500i,700%7CRoboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('intelc/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('intelc/plugins/swiper/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('intelc/plugins/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('intelc/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('intelc/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('intelc/css/colors/theme-color-1.css') }}">
    <link rel="stylesheet" href="{{ asset('intelc/css/custom.css') }}">
    <!-- Color CSS -->
    <!-- Responsive CSS -->
     <h1 style="display: none;">IntelC</h1>
</head>

<body class="demo-5">

    <!-- Preloader -->
    <div class="preLoader"></div>
    @include('partials.header')
    @yield('content')
    @include('partials.footer')

    @yield('scripts_cdn')



    <script src="{{ asset('intelc/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('intelc/js/fontawesome-all.min.js') }}"></script>
    <script src="{{ asset('intelc/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/typed.js/typed.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/waypoints/sticky.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/particles.js/particles.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/particles.js/particles.settings.js') }}"></script>
    <script src="{{ asset('intelc/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/parsley/parsley.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/retinajs/retina.min.js') }}"></script>
    <script src="{{ asset('intelc/js/menu.min.js') }}"></script>
    <script src="{{ asset('intelc/js/scripts.js') }}"></script>
    <script src="{{ asset('intelc/js/custom.js') }}"></script>


    @yield('scripts')
    @yield('script_last')
</body>

</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <!-- ICONS CSS -->
        <!-- Typography CSS -->
        <!-- Custom Main StyleSheet CSS -->
		<!-- Custom Main StyleSheet CSS -->
		<!-- Custom Main StyleSheet CSS -->
        <link href="{{ asset('css/municipio/style.css')}}?v=1.0" rel="stylesheet">
        <link href="{{ asset('css/municipio/svg-icon.css')}}" rel="stylesheet">
        <link href="{{ asset('css/municipio/bootstrap.css')}}" rel="stylesheet">
        <link href="{{ asset('css/municipio/font-awesome.css')}}" rel="stylesheet">
        <link href="{{ asset('css/municipio/typography.css')}}" rel="stylesheet">
        <link href="{{ asset('css/municipio/component.css')}}" rel="stylesheet">
        <link href="{{ asset('css/municipio/shotcode.css')}}" rel="stylesheet">
        <link href="{{ asset('css/municipio/color.css')}}" rel="stylesheet">
        <link href="{{ asset('css/municipio/responsive.css')}}" rel="stylesheet">
		<!-- Custom Main StyleSheet CSS -->
        <!-- Color CSS -->
        <!-- Responsive CSS -->
    </head>
    <body>
        @yield('content')
    	<!--Bootstrap core JavaScript-->
		<!--Pretty Photo JavaScript-->
        <!--Counter up JavaScript-->
        <!--Custom JavaScript-->
        <script src="{{ asset('js/municipio/jquery.js')}}"></script>
        <script src="{{ asset('js/municipio/bootstrap.js')}}"></script>
        <script src="{{ asset('js/municipio/waypoints-sticky.js')}}"></script>
        <script src="{{ asset('js/municipio/waypoints.js')}}"></script>
    	<script src="{{ asset('js/municipio/custom.js')}}?v=1.1"></script>
		<script>document.documentElement.className = 'js';</script>
    </body>
</html>

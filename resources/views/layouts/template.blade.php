<!doctype html>
<html class="no-js" lang="es">

<head>
    {{-- <meta charset="utf-8"> --}}

    <!--====== Title ======-->
    <title>{{ config('app.name') }} | {{ $title }}</title>

    <meta name="description" content="El mejor internet de Fibra Óptica. Encuentra el plan que más desees y vuela con tu navegación con fibra óptica. En Palora, contrata el mejor internet de Fibra Óptica.">
    <meta name="keyworks" content="IntelC, Internet, Fibra óptica">
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

        .row {
            display: flex;
            flex-wrap: wrap;
        }
    </style>

    @stack('styles_add')
    @yield('other_styles')

    <link rel="shortcut icon" type="image/png" href="{{ asset('intelc/img/clogo.png')}}">

    <!-- CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500i,700%7CRoboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('intelc/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('intelc/plugins/swiper/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('intelc/plugins/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('intelc/css/style.css') }}?v=2.2">
    <link rel="stylesheet" href="{{ asset('intelc/css/button-whatsapp.css') }}?v=1.2">
    <link rel="stylesheet" href="{{ asset('intelc/css/responsive.css') }}?v=1.2">
    <link rel="stylesheet" href="{{ asset('intelc/css/colors/theme-color-1.css') }}">
    <link rel="stylesheet" href="{{ asset('intelc/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/skelleton.css')}}">
    <script src="{{ asset('js/swiper-bundle.min.js')}}"></script>

    <!-- Color CSS -->
    <!-- Responsive CSS -->
     <h1 style="display: none;">INTELC</h1>
</head>

<body class="demo-5">

    <!-- Preloader -->
    <div class="preLoader"></div>
    @include('partials.header')
    @yield('content')
    @include('partials.footer')

    @yield('scripts_cdn')

    <div class="phone-call cbh-phone cbh-green cbh-show  cbh-static" id="clbh_phone_div" style="position: fixed; bottom: 75px; right: -55px; z-index: 80;"><a target="_blank" id="WhatsApp-button" href="https://api.whatsapp.com/send/?phone=593979150254&text=Deseo saber sobre las promociones de los planes de internet&amp;phone=+593979150254" class="phoneJs" title="Mesaj Gönder!"><div class="cbh-ph-circle"></div><div class="cbh-ph-circle-fill"></div><div class="cbh-ph-img-circle1"></div></a></div>

    <script src="{{ asset('intelc/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('intelc/js/fontawesome-all.min.js') }}"></script>
    <script src="{{ asset('intelc/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/typed.js/typed.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/waypoints/sticky.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/particles.js/particles.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/particles.js/particles.settings.js') }}?v=1.1"></script>
    <script src="{{ asset('intelc/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/parsley/parsley.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('intelc/plugins/retinajs/retina.min.js') }}"></script>
    <script src="{{ asset('intelc/js/menu.min.js') }}"></script>
    <script src="{{ asset('intelc/js/scripts.js') }}"></script>
    <script src="{{ asset('intelc/js/custom.js') }}"></script>
    <script>
        function copyToClipBoard(content) {
            var aux = document.createElement("input");
            aux.setAttribute("value", content);
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
        }
    </script>
    <script>
        function removeSlidePlan(type_id){
            $('.type-plans-all-to-actions').addClass('d-none');
            $('.type-plan-update-'+type_id).removeClass('d-none');
            /*var pricingSlider = new Swiper('.pricing-slider', {
                slidesPerView: 3,
                loop: true,
                centeredSlides: true,
                spaceBetween: 2,
                allowTouchMove: false,
                speed: 500,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: true,
                },
                pagination: {
                    el: '.pricing-pagination',
                    clickable: true,
                },
                breakpoints: {
                    // when window width is <= 575px
                    575: {
                        slidesPerView: 1
                    }
                }
            });*/
        }
    </script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VMJQK5NRLJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VMJQK5NRLJ');
</script>
    @yield('scripts')
    @yield('script_last')
</body>

</html>
@extends('layouts.template')

@section('content')
    <!-- Page title -->
    <section class="page-title-wrap position-relative bg-light">
        <div id="particles_js"></div>
        <div class="container">
            <div class="row">
                <div class="col-11">
                    <div class="page-title position-relative pt-5 pb-5">
                        <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp"
                            data-delay="1.2">
                            <li><a href="/">Inicio</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="#">Acerca de Nosotros</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">Test de velocidad</h1>
                    </div>
                </div>
                <div class="col-1">
                    <div class="world-map position-relative">
                        <img src="img/map.svg" alt="" alt="" data-no-retina class="svg">>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->

    <!-- About us -->
    <section class="pt-7 pb-7">
        <div class="raw">
            <div class="col-md-12 text-center">
                <button class="btn btn-warning" id="start-test" onclick="startTest()">Iniciar test</button>
            </div>
        </div>
        <div class="raw pt-3 d-none" id="test-net">
            <div class="col-md-12 text-center">
                <h4 class="text-center" style="font-size: 2em">Tu velocidad de internet es de</h4>
                <p style="font-size: 1.5em" id="result-text-test">Calculando...</p>
            </div>
        </div>
        <div class="raw mt-5">
            <div class="col-md-12 text-center">
                <a target="_blank" href="https://www.speedtest.net/es" class="btn btn-sm btn-danger">Visitar otro test de velocidad</a>
            </div>
        </div>
    </section>
@endsection

@section('script_last')
    <script>
        function startTest() {
            $('#start-test').prop('disabled', true);
            $('#test-net').removeClass('d-none');
            $('#result-text-test').html('Calculando...');
            var imageAddr = "http://www.tranquilmusic.ca/images/cats/Cat2.JPG" + "?n=" + Math.random();
            var startTime, endTime;
            var downloadSize = 5616998;
            var download = new Image();
            download.onload = function() {
                endTime = (new Date()).getTime();
                showResults();
            }
            startTime = (new Date()).getTime();
            download.src = imageAddr;
    
            function showResults() {
                var duration = (endTime - startTime) / 1000; //Math.round()
                var bitsLoaded = downloadSize * 8;
                var speedBps = (bitsLoaded / duration).toFixed(2);
                var speedKbps = (speedBps / 1024).toFixed(2);
                var speedMbps = (speedKbps / 1024).toFixed(2);

                $('#start-test').prop('disabled', false);
                $('#result-text-test').html(speedMbps+' Mbps de desacarga');
                // alert("Your connection speed is: \n" +speedBps + " bps\n" +speedKbps + " kbps\n" +speedMbps + " Mbps\n");
            }
        }
    </script>
@endsection

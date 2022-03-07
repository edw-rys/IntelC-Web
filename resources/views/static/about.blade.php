@extends('layouts.template')

@section('content')
    <!-- Page title -->
    <section class="page-title-wrap position-relative bg-light">
        <div id="particles_js"></div>
        <div class="container">
            <div class="row">
                <div class="col-11">
                    <div class="page-title position-relative pt-5 pb-5">
                        <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp" data-delay="1.2">
                            <li><a href="/">Ibicio</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="#">Acerca de Nosotros</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">Acerca de Nosotros</h1>
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="about-us-title text-center">
                        <h2 data-animate="fadeInUp" data-delay=".1">EMPRESA </h2>
                        <p data-animate="fadeInUp" data-delay=".2">INTELC es un Operador  de Telecomunicaciones especializado en internet fibra óptica Gpon e internet inalámbrico con la mas alta calidad y tecnología. Cuenta con un gran equipo de profesionales para ofrecer respaldo y soporte 24 horas.</p>
                        <p data-animate="fadeInUp" data-delay=".3">Los 7 días de la semana, para que tu empresa o negocio este siempre conectado.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="single-about-us-info" data-animate="fadeInUp" data-delay=".1">
                        <h3>Nuestra misión</h3>
                        <p>Ser una empresa líder en Telecomunicaciones, que se desarrolle en forma armónica y sustentable, teniendo como eje principal proveer el mejor servicio de  Internet de Alta Velocidad y otros servicios de telecomunicaciones a clientes residenciales y empresas, siempre con la más alta calidad y capacidad a unos precios sumamente competitivos. Fomentando el desarrollo de las telecomunicaciones del país.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-about-us-info" data-animate="fadeInUp" data-delay=".2">
                        <h3>Nuestra visión</h3>
                        <p>Ofrecer el mejor servicio de Internet, con gente altamente capacitada y calificada para brindar un mejor servicio, satisfacción  y seguridad al cliente.</p>
                    </div>
                </div>
            </div>

            <div class="write-about-us text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 data-animate="fadeInUp" data-delay=".1">Nuestra Empresa</h2>
                        <p data-animate="fadeInUp" data-delay=".2">INTELC Telecomunicaciones cuenta con infraestructura propia y con la tecnología más avanzada disponible en el mercado, para lograr un servicio estable y eficiente, lo cual permite la disponibilidad del servicio en un 99.9%, estando su red siempre en constante crecimiento.</p>
                        <p data-animate="fadeInUp" data-delay=".2"><strong>Ofreciendo servicios de internet de altas velocidades dónde otros no llegan.</strong></p>
                        <a href="{{ route('front.view.static', 'contact') }}" class="btn btn-primary" data-animate="fadeInUp" data-delay=".3">Contáctanos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of About us -->

    @include('components.parts.team')
@endsection

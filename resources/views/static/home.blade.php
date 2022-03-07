@extends('layouts.template')

@section('other_styles')
@endsection


@section('content')
    <!-- Banner -->
    <section class="position-relative bg-light pt-4 pb-4">
        <div id="particles_js"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Banner content -->
                    <div class="banner-content">
                        <h1 data-animate="fadeInUp" data-delay="1.2">El mejor proveedor de servicio de internet de Palora en {{ date("Y") }}</h1>
                        <h2 data-animate="fadeInUp" data-delay="1.3"><span class="typed"></span></h2>
                        <ul class="list-inline" data-animate="fadeInUp" data-delay="1.4">
                            {{-- <li><a href="#" class="btn btn-primary">Learn More</a></li> --}}
                            <li><a href="#planes-internet" class="btn">Consultar ofertas<i class="fas fa-caret-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <!-- Banner image -->
                    <div class="banner-image">
                        <img src="{{ asset('intelc/img/slide.png') }}" alt="" data-animate="fadeInUp" data-delay="1.5" data-depth="0.2">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->

    <!-- Features -->
    <section class="pt-7 pb-5-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".1">
                        <img src="{{ asset('intelc/img/icons/business-query.svg') }}" alt="" alt="" width="60">
                        <h3>Para negocios digitales</h3>
                        <p>Maneje su negocio a través de una conexión a internet veloz.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".3">
                        <img src="{{ asset('intelc/img/icons/support.svg') }}" alt="" alt="" data-no-retina class="svg">>
                        <h3>Soporte técnico 24/7/365</h3>
                        <p>Estamos para ateder sus dudas sobre nuestros servicios.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".5">
                        <img src="{{ asset('intelc/img/icons/security.svg') }}" alt="" alt="" width="60">
                        <h3>Navegue seguro a través de la red!</h3>
                        <p>Aseguramos sus datos a través de nuestra red cifrada.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Features -->

    
    @include('components.parts.services')
    @include('components.parts.plants_princes')
    @include('components.parts.testimonials')
    @include('components.parts.places')
    
@endsection

@section('script_last')

@endsection
@extends('layouts.template')

@section('other_styles')
@endsection


@section('content')
    <!-- Banner -->
    @php
    $routes_img = [asset('intelc/img/slide2.png'), asset('intelc/img/slide3.png')];
    @endphp
    <section class="position-relative bg-light pb-4">
        <div id="particles_js"></div>
        <div class="">
            <div class="row align-items-center w-100">
                <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($routes_img as $k_i => $img_r)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $k_i }}"
                                @if ($k_i == '0') class="active" @endif></li>
                        @endforeach
                        {{-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> --}}
                        {{-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($routes_img as $k_i => $img_r)
                            <div class="carousel-item @if ($k_i == '0') active @endif">
                                <img class="d-block w-100" src="{{ $img_r }}" alt="First slide"
                                    style="max-height: 80vh; width: 100%">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                {{-- <div class="col-lg-6 d-none d-lg-block">
                    <!-- Banner image -->
                    <div class="banner-image">
                        <img src="{{ asset('intelc/img/slide.png') }}" alt="" data-animate="fadeInUp" data-delay="1.5"
                            data-depth="0.2">
                    </div>
                </div> --}}
                <div class="col-lg-6 m-auto pt-2">
                    <!-- Banner content -->
                    <div class="banner-content">
                        <h1 data-animate="fadeInUp" data-delay="1.2" style="font-size: 1.5em">El mejor proveedor de servicio
                            de internet de Palora en {{ date('Y') }}</h1>
                        <h2 data-animate="fadeInUp" data-delay="1.3"><span class="typed"></span></h2>
                        <ul class="list-inline" data-animate="fadeInUp" data-delay="1.4">
                            {{-- <li><a href="#" class="btn btn-primary">Learn More</a></li> --}}
                            <li><a href="#planes-internet" class="btn">Consultar ofertas<i
                                        class="fas fa-caret-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->

    <!-- Features -->
    <section class="pt-4 pb-4"
        style="background: linear-gradient(0deg, rgba(255,255,255,1) 44%, rgba(198,233,251,1) 100%); font-size: 1.4em">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".1">
                        <img src="{{ asset('intelc/img/icons/business-query.svg') }}" alt="" alt="" width="100">
                        <h3>Para negocios digitales</h3>
                        <p>Maneje su negocio a través de una conexión a internet veloz.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".3">
                        <img src="{{ asset('intelc/img/icons/support.svg') }}" alt="" alt="" data-no-retina
                            class="svg" width="100">
                        <h3>Soporte técnico 24/7/365</h3>
                        <p>Estamos para ateder sus dudas sobre nuestros servicios.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".5">
                        <img src="{{ asset('intelc/img/icons/security.svg') }}" alt="" alt="" width="80">
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

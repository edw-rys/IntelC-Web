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
                            <li><a href="">Inicio</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="#">Preguntas Frecuentes</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">Preguntas Frecuentes</h1>
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

    <!-- FAQ -->
    <section class="pt-7 pb-7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="about-us-title text-center">
                        <h2 data-animate="fadeInUp" data-delay=".1">¿Tiene alguna pregunta en su mente?</h2>
                    </div>
                </div>
            </div>
            <div class="border-bottom pt-4 pb-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="single-faq-wrap">
                            <h2 data-animate="fadeInUp" data-delay=".1">Preguntas y respuestas generales</h2>
                            @forelse ($items as $item)
                                <h4 data-animate="fadeInUp" data-delay=".2"><i class="fas fa-question-circle"></i> {{ $item->question}}</h4>
                                <p data-animate="fadeInUp" data-delay=".3">{!! $item->answer !!}</p>
                            @empty
                                <h4>No hay preguntas frecuentes</h4>
                            @endforelse
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </section>
    <!-- End of FAQ -->
@endsection

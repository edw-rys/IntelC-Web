@extends('layouts.template')

@section('content')
    <!-- 404 content -->
    <section class="pt-5 pb-5 bg-light">
        <div class="container">
            <div class="not-found text-center">
                <img src="{{ asset('intelc/img/404.png')}}" alt="" data-animate="shake" data-delay="1.3">
                <span class="roboto" data-animate="fadeInUp" data-delay=".1">Oops!</span>
                <p data-animate="fadeInUp" data-delay=".2">La página que está buscando se movió, eliminó, cambió de nombre o es posible que nunca exista..</p>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <a href="/" data-animate="fadeInUp" data-delay=".2"><i class="fas fa-home"></i> Ir a casa</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
@endsection
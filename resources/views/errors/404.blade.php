@extends('errors.templates.layout')
@push('styles_add')
    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/404.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
@section('content')
    <div class="wrapper"> 
        <!-- CITY 404 WRAP START-->
        <div class="city_404_wrap overlay">
            <div class="container">
                <div class="city_404_text">
                    <h2>404</h2>
                    <h3>Recurso no encontrado</h3>
                    <h4>Ups, la página que estás buscando no se encuentra aquí.</h4>
                    <a class="theam_btn animated" href="{{ route('front.home')}}" tabindex="0">Regresar a la pagina principal</a>
                </div>
            </div>
        </div>
        <!-- CITY 404 WRAP END-->
    </div>
        
@endsection
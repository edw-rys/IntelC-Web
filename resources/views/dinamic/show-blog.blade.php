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
                            <li><a href="/">Inice</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="#">Detalles del blog</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">Detalles del blog</h1>
                    </div>
                </div>
                <div class="col-1">
                    <div class="world-map position-relative">
                        <img src="{{ asset('intelc/img/map.svg')}}" alt="" alt="" data-no-retina class="svg">>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->

    <!-- Blog -->
    <section class="blog pt-7 pb-7">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="post-details" data-animate="fadeInUp" data-delay=".1">
                        <div class="post-content">
                            <img src="{{ $item->file_url }}" alt="" data-animate="fadeInUp" data-delay=".2">
                            <span data-animate="fadeInUp" data-delay=".3">Posteado el: <a href="#">{{ $item->created_at->format('d/m/Y') }}</a> por <a href="#">{{ $item->user_created != null ? $item->user_created->name : 'ADMIN'}}</a> </span>
                            <h2 data-animate="fadeInUp" data-delay=".4">{{$item->title}}</h2>
                            {{-- DESCRIPTION --}}
                            <p>{!! $item->description !!}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Blog -->
@endsection

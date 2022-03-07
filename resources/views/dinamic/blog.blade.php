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
                            <li><a href="/">Índice</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">Blog</h1>
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
    <!-- Page title -->
    <section class="blog pt-7 pb-7">
        <div class="container">
            <!-- Posts -->
            <div class="row">
                @forelse ($items as $item)
                    <div class="col-md-6" id="blog-{{$item->id}}">
                        <div class="single-post" data-animate="fadeInUp" data-delay=".1">
                            <div class="image-hover-wrap">
                                <img src="{{ $item->file_url }}" alt="">
                                <div class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                    <ul class="list-inline">
                                        <li><a href="#blog-{{$item->id}}"onclick="copyToClipBoard('{{ route('front.blog.show', $item->id)}}')"><i class="fas fa-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <span>Posteado el <a href="javascript:void(0)">{{ $item->created_at->format('d/m/Y') }}</a></span>
                            <h4>{{ $item->title }}</h4>
                            <a href="{{ route('front.blog.show', $item->id)}}">Continúe Leyendo<i class="fas fa-caret-right"></i></a>
                        </div>
                    </div>
                @empty
                    <h3 style="text-align: center">No hay historias</h3>
                @endforelse
            </div>


            @include('components.paginator',[
                'paginator' => $items,
                'elements' => $items,
            ])
        </div>
    </section>
    <!-- End of Blog -->
@endsection

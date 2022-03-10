@extends('layouts.template')

@section('other_styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection

@section('content')

    @if (!$items->isEmpty())
        @foreach ($items as $item)
            <!-- Our services -->
            <section>
                <div class="services-title position-relative pt-7" data-bg-img="{{ asset('intelc/img/buildings.jpg')}}">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-8">
                                <!-- Section title -->
                                <div class="section-title text-center">
                                    <h2 class="text-white" data-animate="fadeInUp" data-delay=".1">{{ $item->title }}</h2>
                                    <p class="text-white" data-animate="fadeInUp" data-delay=".3">{!! $item->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="services-wrap bg-white position-relative pt-5 pb-5">
                    <div class="container">
                        <!-- All services -->
                        <div class="row">
                            @foreach ($item->items as $file)

                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="single-service" data-animate="fadeInUp" data-delay=".45">
                                        <img src="{{asset('intelc/img/icons/website.svg')}}" alt="" alt="" data-no-retina class="svg">>
                                        <h4>{!! $file->description !!}</h4>
                                        <a class="see_more_btn" href="{{ $file->file_url }}" target="_blank">Mostrar Documento</a>
                                    </div>
                                </div>
                            @endforeach
                            

                        </div>
                    </div>
                </div>
            </section>
            <!-- End of Our services -->
         @endforeach
        @include('components.paginator', [
            'paginator' => $items,
            'elements' => $items,
        ])
    @else
        <div class="mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="city_health_text">
                            <h2><span>Archivos</span> No encontrados</h2>
                            <p>Los documentos estarán próximos a subirse. </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="city_health_fig">
                            <figure class="box">
                                <div class="box-layer layer-1"></div>
                                <div class="box-layer layer-2"></div>
                                <div class="box-layer layer-3"></div>
                                <img src="{{ asset('intelc/img/folder.png') }}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

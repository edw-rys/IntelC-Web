 <!-- Our services -->
 <section>
    <div class="services-title position-relative pt-7" data-bg-img="img/buildings.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <!-- Section title -->
                    <div class="section-title text-center">
                        <h2 class="text-white" data-animate="fadeInUp" data-delay=".1" style="font-size: 2.5em">¡Ventajas De Elegir Nuestros Servicios!</h2>
                        {{-- <p class="text-white" data-animate="fadeInUp" data-delay=".3">Te damos varios </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services-wrap bg-white position-relative pt-5 pb-5" style="margin: -18rem auto 0 auto;">
        <div class="container">
            <!-- All services -->
            <div class="row">
                @forelse ($services as $service)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service" data-animate="fadeInUp" data-delay=".05">
                            <img src="{{ $service->file_url}}" style="width: 40px" alt="{{ $service->title }}" >
                            <h4>{{ $service->title }}</h4>
                            <span>{{ $service->short_description }}</span>
                        </div>
                    </div>
                    
                @empty
                <div class="col-12">
                    <div class="single-service" data-animate="fadeInUp" data-delay=".05">
                        <h4>No hay servicios</h4>
                    </div>
                </div>
                @endforelse
                
            </div>

            <!-- Service contact info -->
            <div class="roboto text-center font-weight-medium" data-animate="fadeInUp" data-delay=".65">
                <p>Si tiene alguna pregunta en mente, simplemente <a href="{{ route('front.view.static', 'contact')}}">haga clic aquí</a> para escribir o puede <br>Llama al <a href="tel:+593979150254">0979150254</a> - <a href="tel:+593979229620">0979229620</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End of Our services -->
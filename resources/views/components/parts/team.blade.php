 <!-- Our team -->
 <section class="pt-7 pb-5-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="section-title text-center">
                    <h2 data-animate="fadeInUp" data-delay=".1">Nuestro Equipo</h2>
                    <p data-animate="fadeInUp" data-delay=".2">Lo conformamos por:</p>
                </div>
            </div>
        </div>

        <!-- Members -->
        <div class="row">
            @forelse (ourTeam() as $integrant)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-member" data-animate="fadeInUp" data-delay="0">
                        <div class="image-hover-wrap">
                            <img src="{{ $integrant->file_url }}" alt="">
                            <div class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                
                            </div>
                        </div>
                        <div class="single-member-info">
                            <h4>{{ $integrant->name }}</h4>
                            <span>{{ $integrant->cargo }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <h4 class="text-center">No hay integrantes</h4>
            @endforelse
        </div>
    </div>
</section>
<!-- End of Our team -->    
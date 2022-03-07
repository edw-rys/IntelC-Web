 <!-- Reviews -->
 <section class="pt-7 pb-7 bg-light">
    <div class="container">
        <div class="section-title text-center">
            <h2 data-animate="fadeInUp" data-delay=".1">Lo que dicen los clientes sobre nosotros</h2>
        </div>
        <div class="swiper-container review-slider">
            @if ($testimonials->isNotEmpty())
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testimoial)
                        <div class="swiper-slide single-review-slide">
                            <h4>{{$testimoial->person}}
                                @for ($i = 0; $i < $testimoial->stars; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </h4>
                            <span>{{$testimoial->place}}</span>
                            <p>{!! $testimoial->description !!}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <h4 class="text-center">No hay testimonios</h4>
            @endif
        </div>
        <div class="swiper-pagination review-pagination position-static"></div>
    </div>
</section>
<!-- End of Reviews -->
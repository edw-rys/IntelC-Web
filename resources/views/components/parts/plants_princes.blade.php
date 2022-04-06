<!-- Pricing plans -->
<section class="pricing-plans pt-7 pb-7" id="planes-internet" style="background: linear-gradient(0deg, rgba(255,255,255,1) 44%, rgba(249,199,150,1) 100%);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Section title -->
                <div class="section-title w-100 d-flex" style="justify-content: space-around;">
                    @foreach ($typePlanes as $typeP)
                        <button class="btn btn-danger ml-3 mr-3" style="font-size: 1.5em" onclick="filterPans({{ $typeP->id }})">{{ $typeP->title }} </button>   
                    @endforeach
                    {{-- <p data-animate="fadeInUp" data-delay=".3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered by injected humour</p> --}}
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-12">
                <!-- Pricing slider -->
                <div class="pricing-slides text-center">
                    <div class="swiper-container pricing-slider">
                        @if ($planesPrices->isNotEmpty())
                            <div class="swiper-wrapper">
                                @foreach ($planesPrices as $planPrice)
                                    <div class="swiper-slide single-pricing-slide card-plan-typeall card-plan-type-{{ $planPrice->type_id }}">
                                        <div class="single-pricing-plan">
                                            <img src="{{ $planPrice->file_url }}" alt="{{ $planPrice->title }}"
                                                width="50">
                                            <h4>{{ $planPrice->title }}</h4>
                                            <span class="time roboto">{{ $planPrice->short_description }}</span>
                                            <strong class="roboto">$ {{ $planPrice->price }}
                                                <sub>/M</sub></strong>
                                            <p>{!! $planPrice->description !!}</p>
                                            <a target="_blank" href="https://api.whatsapp.com/send?phone=+593979150254&text=Hola, deseo obtener el plan de internet {{ $planPrice->title }}!"" class="btn btn-primary">Obtenga este plan</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <h4 class="text-center">No hay planes en este momento</h4>
                        @endif
                    </div>
                    <div class="swiper-pagination pricing-pagination position-static"></div>
                </div>
                <!-- End of Pricing slider -->
            </div>
        </div>
    </div>
</section>
<!-- End of Pricing plans -->

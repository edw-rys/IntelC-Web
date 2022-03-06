@extends('layouts.template')

@section('other_styles')
@endsection


@section('content')
    <!-- Banner -->
    <section class="position-relative bg-light pt-4 pb-4">
        <div id="particles_js"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Banner content -->
                    <div class="banner-content">
                        <h1 data-animate="fadeInUp" data-delay="1.2">El mejor proveedor de servicio de internet de Palora en {{ date("Y") }}</h1>
                        <h2 data-animate="fadeInUp" data-delay="1.3"><span class="typed"></span></h2>
                        <ul class="list-inline" data-animate="fadeInUp" data-delay="1.4">
                            {{-- <li><a href="#" class="btn btn-primary">Learn More</a></li> --}}
                            <li><a href="#" class="btn">Consultar ofertas<i class="fas fa-caret-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <!-- Banner image -->
                    <div class="banner-image">
                        <img src="{{ asset('intelc/img/slide.png') }}" alt="" data-animate="fadeInUp" data-delay="1.5" data-depth="0.2">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->

    <!-- Features -->
    <section class="pt-7 pb-5-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".1">
                        <img src="{{ asset('intelc/img/icons/vpn.svg') }}" alt="" alt="" data-no-retina class="svg">>
                        <h3>Fast VPN Without Third Parties</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".3">
                        <img src="{{ asset('intelc/img/icons/support.svg') }}" alt="" alt="" data-no-retina class="svg">>
                        <h3>24/7/365 Technical Support</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".5">
                        <img src="{{ asset('intelc/img/icons/guarantee.svg') }}" alt="" alt="" data-no-retina class="svg">>
                        <h3>30 Days Money Back Guarantee</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Features -->

    <!-- Our services -->
    <section>
        <div class="services-title position-relative pt-7" data-bg-img="img/buildings.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <!-- Section title -->
                        <div class="section-title text-center">
                            <h2 class="text-white" data-animate="fadeInUp" data-delay=".1">Why You Need Our Service </h2>
                            <p class="text-white" data-animate="fadeInUp" data-delay=".3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="services-wrap bg-white position-relative pt-5 pb-5">
            <div class="container">
                <!-- All services -->
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service" data-animate="fadeInUp" data-delay=".05">
                            <img src="{{ asset('intelc/img/icons/security.svg') }}" alt="" alt="" data-no-retina class="svg">>
                            <h4>Ensure Privacy & Security</h4>
                            <span>At vero eos et accusamus et iusto odioissimos bland very voluptatum.</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service" data-animate="fadeInUp" data-delay=".1">
                            <img src="{{ asset('intelc/img/icons/speed.svg') }}" alt="" alt="" data-no-retina class="svg">>
                            <h4>Streaming Access & Speed</h4>
                            <span>At vero eos et accusamus et iusto odioissimos bland very voluptatum.</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service" data-animate="fadeInUp" data-delay=".15">
                            <img src="{{ asset('intelc/img/icons/device.svg') }}" alt="" alt="" data-no-retina class="svg">>
                            <h4>VPN For All Devices</h4>
                            <span>At vero eos et accusamus et iusto odioissimos bland very voluptatum.</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service" data-animate="fadeInUp" data-delay=".2">
                            <img src="{{ asset('intelc/img/icons/internet.svg') }}" alt="" alt="" data-no-retina class="svg">>
                            <h4>Fully Encrypted Internet</h4>
                            <span>At vero eos et accusamus et iusto odioissimos bland very voluptatum.</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service" data-animate="fadeInUp" data-delay=".25">
                            <img src="{{ asset('intelc/img/icons/network.svg') }}" alt="" alt="" data-no-retina class="svg">>
                            <h4>Multiple VPN Network</h4>
                            <span>At vero eos et accusamus et iusto odioissimos bland very voluptatum.</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service" data-animate="fadeInUp" data-delay=".3">
                            <img src="{{ asset('intelc/img/icons/virus.svg') }}" alt="" alt="" data-no-retina class="svg">>
                            <h4>Block Malicious Content</h4>
                            <span>At vero eos et accusamus et iusto odioissimos bland very voluptatum.</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service" data-animate="fadeInUp" data-delay=".35">
                            <img src="{{ asset('intelc/img/icons/bandwidth.svg') }}" alt="" alt="" data-no-retina class="svg">>
                            <h4>Unlimited Bandwidth</h4>
                            <span>At vero eos et accusamus et iusto odioissimos bland very voluptatum.</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service" data-animate="fadeInUp" data-delay=".4">
                            <img src="{{ asset('intelc/img/icons/trial.svg') }}" alt="" alt="" data-no-retina class="svg">>
                            <h4>7 Days Free Trial</h4>
                            <span>At vero eos et accusamus et iusto odioissimos bland very voluptatum.</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service" data-animate="fadeInUp" data-delay=".45">
                            <img src="{{ asset('intelc/img/icons/website.svg') }}" alt="" alt="" data-no-retina class="svg">>
                            <h4>Access Restricted Websites</h4>
                            <span>At vero eos et accusamus et iusto odioissimos bland very voluptatum.</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service" data-animate="fadeInUp" data-delay=".5">
                            <img src="{{ asset('intelc/img/icons/settings.svg') }}" alt="" alt="" data-no-retina class="svg">>
                            <h4>User Frendly Settings</h4>
                            <span>At vero eos et accusamus et iusto odioissimos bland very voluptatum.</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service" data-animate="fadeInUp" data-delay=".55">
                            <img src="{{ asset('intelc/img/icons/team.svg') }}" alt="" alt="" data-no-retina class="svg">>
                            <h4>Expert Support Team</h4>
                            <span>At vero eos et accusamus et iusto odioissimos bland very voluptatum.</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service" data-animate="fadeInUp" data-delay=".6">
                            <img src="{{ asset('intelc/img/icons/money.svg') }}" alt="" alt="" data-no-retina class="svg">>
                            <h4>Money Back Guarantee</h4>
                            <span>At vero eos et accusamus et iusto odioissimos bland very voluptatum.</span>
                        </div>
                    </div>
                </div>

                <!-- Service contact info -->
                <div class="roboto text-center font-weight-medium" data-animate="fadeInUp" data-delay=".65">
                    <p>If you have any questions in your mind, Just <a href="contact.html">click here</a> to write or you can <br>Call to <a href="tel:1234567890">(+1) 234-567-890</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Our services -->
    @include('components.parts.plants_princes')
    
    <!-- Reviews -->
    <section class="pt-7 pb-7 bg-light">
        <div class="container">
            <div class="section-title text-center">
                <h2 data-animate="fadeInUp" data-delay=".1">What client’s say about us</h2>
            </div>
            <div class="swiper-container review-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide single-review-slide">
                        <h4>Marsha C. Meyer
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </h4>
                        <span>Melbourne, Australia</span>
                        <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give complete account of the system, and expound the actual teachings of happiness. No one rejects, dislikes, or avoids.</p>
                    </div>
                    
                    <div class="swiper-slide single-review-slide">
                        <h4>Bns H. Jabed
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </h4>
                        <span>Noakhali, Bangladesh</span>
                        <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give complete account of the system, and expound the actual teachings of happiness. No one rejects, dislikes, or avoids.</p>
                    </div>
                    
                    <div class="swiper-slide single-review-slide">
                        <h4>Cathy S. Knight
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </h4>
                        <span>California, United States</span>
                        <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give complete account of the system, and expound the actual teachings of happiness. No one rejects, dislikes, or avoids.</p>
                    </div>
                    
                    <div class="swiper-slide single-review-slide">
                        <h4>Cathy S. Knight
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </h4>
                        <span>California, United States</span>
                        <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give complete account of the system, and expound the actual teachings of happiness. No one rejects, dislikes, or avoids.</p>
                    </div>
                    
                    <div class="swiper-slide single-review-slide">
                        <h4>Cathy S. Knight
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </h4>
                        <span>California, United States</span>
                        <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give complete account of the system, and expound the actual teachings of happiness. No one rejects, dislikes, or avoids.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination review-pagination position-static"></div>
        </div>
    </section>
    <!-- End of Reviews -->

    <!-- Mobile app -->
    <section class="pt-7 pb-7">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-4 d-none d-md-block">
                    <div class="text-center" data-animate="fadeInUp" data-delay=".1">
                        <img src="{{ asset('intelc/img/mobile.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="app-info">
                        <h2 data-animate="fadeInUp" data-delay=".1">Download Your Application</h2>
                        <p data-animate="fadeInUp" data-delay=".3">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem</p>
                        <ul class="apps-list list-inline">
                            <li data-animate="fadeInUp" data-delay=".5"><a href="#"><img src="{{ asset('intelc/img/play-store.png') }}" alt=""></a></li>
                            <li data-animate="fadeInUp" data-delay=".6"><a href="#"><img src="{{ asset('intelc/img/app-store.png') }}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Mobile app -->

    <!-- Servers -->
    <section class="servers pt-7 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="section-title">
                        <h2 data-animate="fadeInUp" data-delay=".1">865 Server In 197 Country</h2>
                        <p data-animate="fadeInUp" data-delay=".2">There are many variations of passages of Lorem Ipsum ailable, but the majority have suffered hmour</p>
                    </div>
                    <ul class="data-centers list-unstyled list-item clearfix">
                        <li data-animate="fadeInUp" data-delay=".1"><i class="fas fa-caret-right"></i>North America (201)</li>
                        <li data-animate="fadeInUp" data-delay=".2"><i class="fas fa-caret-right"></i>South America (169)</li>
                        <li data-animate="fadeInUp" data-delay=".3"><i class="fas fa-caret-right"></i>Europe (151)</li>
                        <li data-animate="fadeInUp" data-delay=".4"><i class="fas fa-caret-right"></i>Australia/Oceania (142)</li>
                        <li data-animate="fadeInUp" data-delay=".5"><i class="fas fa-caret-right"></i>Asia (70)</li>
                        <li data-animate="fadeInUp" data-delay=".6"><i class="fas fa-caret-right"></i>Africa (40)</li>
                    </ul>
                    <a href="#" class="btn server-btn" data-animate="fadeInUp" data-delay=".7">View Payment Method <i class="fas fa-caret-right"></i></a>
                </div>
                <div class="col-xl-8 col-lg-7 d-none d-lg-block">
                    <div class="server-map">
                        <img src="{{ asset('intelc/img/servers.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Servers -->

    <!-- Our clients -->
    <section class="clients-wrap pt-4 pb-4">
        <div class="container">
            <ul class="our-clients list-unstyled d-md-flex align-items-md-center justify-content-md-between m-0">
                <li data-animate="fadeInUp" data-delay=".1">
                    <a href="#" target="_blank"><img src="{{ asset('intelc/img/brands/brand1.png') }}" alt=""></a></li>
                <li data-animate="fadeInUp" data-delay=".2">
                    <a href="#" target="_blank"><img src="{{ asset('intelc/img/brands/brand2.png') }}" alt=""></a></li>
                <li data-animate="fadeInUp" data-delay=".3">
                    <a href="#" target="_blank"><img src="{{ asset('intelc/img/brands/brand3.png') }}" alt=""></a></li>
                <li data-animate="fadeInUp" data-delay=".4">
                    <a href="#" target="_blank"><img src="{{ asset('intelc/img/brands/brand4.png') }}" alt=""></a></li>
                <li data-animate="fadeInUp" data-delay=".5">
                    <a href="#" target="_blank"><img src="{{ asset('intelc/img/brands/brand5.png') }}" alt=""></a></li>
                <li data-animate="fadeInUp" data-delay=".6">
                    <a href="#" target="_blank"><img src="{{ asset('intelc/img/brands/brand6.png') }}" alt=""></a></li>
                <li data-animate="fadeInUp" data-delay=".7">
                    <a href="#" target="_blank"><img src="{{ asset('intelc/img/brands/brand7.png') }}" alt=""></a></li>
                <li data-animate="fadeInUp" data-delay=".8">
                    <a href="#" target="_blank"><img src="{{ asset('intelc/img/brands/brand8.png') }}" alt=""></a></li>
                <li data-animate="fadeInUp" data-delay=".9">
                    <a href="#" target="_blank"><img src="{{ asset('intelc/img/brands/brand9.png') }}" alt=""></a></li>
            </ul>
        </div>
    </section>
    <!-- End of Our clients -->

    
@endsection

@section('script_last')

@endsection
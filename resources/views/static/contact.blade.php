@extends('layouts.template')

@section('content')
    @if (session()->has('message'))
        <p class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="ik ik-x"></i></button>
            <i class="icon fas fa-check"></i> {!! session()->get('message') !!}
        </p>
        @php session()->forget('message') @endphp
    @endif
    <!-- Page title -->
    <section class="page-title-wrap position-relative bg-light">
        <div id="particles_js"></div>
        <div class="container">
            <div class="row">
                <div class="col-11">
                    <div class="page-title position-relative pt-5 pb-5">
                        <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp"
                            data-delay="1.2">
                            <li><a href="">Inicio</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="#">Contácto</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">Contácto</h1>
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
    <section class="pt-7 pb-7">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 col-md-7">
                    <div class="section-title">
                        <h2 data-animate="fadeInUp" data-delay=".1">Seleccione sus consultas y escriba a nuestros expertos.</h2>
                    </div>
                    <div class="queries-wrap">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="single-query d-flex align-items-center" data-animate="fadeInUp"
                                    data-delay=".05">
                                    <div class="query-icon">
                                        <img src="{{ asset('intelc/img/icons/general-query.svg')}}" alt="" alt="" data-no-retina
                                            class="svg">>
                                    </div>
                                    <div class="query-info">
                                        <h4>Consultas Básicas o Generales</h4>
                                        <a href="mailto:intelc_ecuador@hotmail.com">intelc_ecuador@hotmail.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="single-query d-flex align-items-center" data-animate="fadeInUp"
                                    data-delay=".15">
                                    <div class="query-icon">
                                        <img src="{{ asset('intelc/img/icons/support-query.svg')}}" alt="" alt="" data-no-retina
                                            class="svg">>
                                    </div>
                                    <div class="query-info">
                                        <h4>Consultas de soporte técnico</h4>
                                        <a href="mailto:intelc_ecuador@hotmail.com">intelc_ecuador@hotmail.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="single-query d-flex align-items-center" data-animate="fadeInUp"
                                    data-delay=".25">
                                    <div class="query-icon">
                                        <img src="{{ asset('intelc/img/icons/a-query.svg')}}" alt="" alt="" data-no-retina
                                            class="svg">>
                                    </div>
                                    <div class="query-info">
                                        <h4>Consultas publicitarias</h4>
                                        <a href="mailto:intelc_ecuador@hotmail.com">intelc_ecuador@hotmail.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="single-query d-flex align-items-center" data-animate="fadeInUp"
                                    data-delay=".45">
                                    <div class="query-icon">
                                        <img src="{{ asset('intelc/img/icons/affiliate-query.svg')}}" alt="" alt="" data-no-retina
                                            class="svg">>
                                    </div>
                                    <div class="query-info">
                                        <h4>Consultas del programa de afiliados</h4>
                                        <a href="mailto:intelc_ecuador@hotmail.com">intelc_ecuador@hotmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="contact-form-wrap">
                        <div class="text-center">
                            <h2 data-animate="fadeInUp" data-delay=".1">Formulario de contácto</h2>
                            <p data-animate="fadeInUp" data-delay=".2">Rellene el formulario. Tu correo electrónico no será publicado.
                                Los campos obligatorios están marcados por <span class="text-danger font-weight-bold">*</span></p>
                        </div>
                        <form class="contact-form" action="{{route('front.contact.submit')}}" method="post">
                            @csrf
                            <div class="position-relative" data-animate="fadeInUp" data-delay=".3">
                                <input type="text" name="subject" placeholder="Asunto*" required class="form-control">
                            </div>
                            <div class="position-relative" data-animate="fadeInUp" data-delay=".3">
                                <input type="text" name="name" placeholder="Nombre*" required class="form-control">
                            </div>
                            <div class="position-relative" data-animate="fadeInUp" data-delay=".4">
                                <input type="email" name="email" placeholder="E-mail*" required class="form-control">
                            </div>
                            {{-- <div class="position-relative" data-animate="fadeInUp" data-delay=".5">
                                <input type="text" name="telephone" placeholder="Celular*"
                                    data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-minlength="10"
                                    data-parsley-minlength-message="Mínimo 10 caracteres." required class="form-control">
                            </div> --}}
                            <div class="position-relative" data-animate="fadeInUp" data-delay=".7">
                                <textarea name="message" placeholder="Escriba el mensaje*" required
                                    class="form-control"></textarea>
                            </div>
                            <button class="btn btn-primary btn-square btn-block" data-animate="fadeInUp" type="submit"
                                data-delay=".8">Enviar mensaje</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-7 pb-7">
        <h4 class="text-center" style="font-size: 2em">Ubícanos</h4>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31904.428865548914!2d-77.98203021410033!3d-1.704174320468668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d3d61eb0d4219d%3A0x4dc0be7af92197d0!2sPalora!5e0!3m2!1ses-419!2sec!4v1649280849236!5m2!1ses-419!2sec" style="width: 100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection

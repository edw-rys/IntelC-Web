<div class="row align-items-center">
    <div class="col-lg-2 col-md-3 col-sm-3 col-9">
        <!-- Logo -->
        <div class="logo" data-animate="fadeInUp" data-delay=".7">
            <a href="/">
                <img src="{{ asset('intelc/img/logo.png')}}" alt="VPNet">
            </a>
        </div>
    </div>
    <div class="col-lg-10 col-md-9 col-sm-3 col-3">
        <nav data-animate="fadeInUp" data-delay=".9">
            <!-- Header-menu -->
            <div class="header-menu">
                <ul>
                    <li class="{{ isActiveRoute('home') ? 'active' : '' }}"><a href="/">Inicio</a></li>
                    <li class="{{ isActiveRoute('about') ? 'active' : '' }}"><a href="{{ route('front.view.static', 'about') }}">Nosotros</a></li>
                    <li class="{{ isActiveRoute('blog') ? 'active' : '' }}"><a href="{{ route('front.view.static', 'blog') }}">Blog</a></li>
                    <li class="{{ isActiveRoute('faq') ? 'contact' : '' }}"><a href="{{ route('front.view.static', 'faq') }}">Preguntas frecuentes</a></li>
                    <li class="{{ isActiveRoute('test-velocidad') ? 'contact' : '' }}"><a href="{{ route('front.view.static', 'test-velocidad') }}">Test de velocidad</a></li>
                    <li>
                        <a href="#">Archivos <i class="fas fa-caret-down"></i></a>
                        <ul>
                            <li><a href="{{ route('front.files.index', 'files') }}">Archivos</a></li>
                        </ul>
                    </li>
                    <li class="{{ isActiveRoute('blog') ? 'contact' : '' }}"><a href="{{ route('front.view.static', 'contact') }}">Contacto</a></li>
                </ul>
            </div>
            <!-- End of Header-menu -->
        </nav>
    </div>
    
</div>
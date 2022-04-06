<!-- Main header -->
<header class="header">
    {{-- <div class="header-top bg-primary" data-animate="fadeInDown" data-delay=".5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <!-- Header info -->
                    <ul class="header-info list-inline text-white mb-md-0">
                        <li>Su IP : {{ request()->ip() }}</li>
                    </ul>
                </div>
                <div class="col-md-3 d-none d-md-block">
                    <!-- Header social icons -->
                </div>
            </div>
        </div>
    </div> --}}

    <div class="main-header">
        <div class="container">
            <div id="particles_js_2"></div>
            @include('partials.navbar')

        </div>
    </div>
</header>
<!-- End of Main header -->
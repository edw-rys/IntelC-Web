<!-- Footer -->
<footer class="main-footer bg-primary pt-4" style="    font-size: 1.2em;">
    <div class="container">
        <div class="row pb-3">
            <!-- Footer info -->
            <div class="col-md-4">
                <div class="footer-info">
                    <h3 class="text-white" data-animate="fadeInUp" data-delay="0">Acerca de nosotros</h3>
                    <p data-animate="fadeInUp" data-delay=".05">Somos un Operador de Telecomunicaciones especializado en internet fibra óptica Gpon e internet inalámbrico con la mas alta calidad y tecnología. </p>
                    
                    <ul class="social-links list-inline mb-0">
                        <li data-animate="fadeInUp" data-delay=".25"><a href="https://www.facebook.com/@intelce1/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- End of Footer info -->
            
            <!-- Footer newsletter -->
            <div class="col-md-4">
                <div class="footer-newsletter">
                    <h3 class="text-white" data-animate="fadeInUp" data-delay="0">Contácto</h3>
                    <ul class="footer-contacts list-unstyled" style="font-size: 1em;">
                        <li data-animate="fadeInUp" data-delay=".1">
                            <i class="fas fa-phone"></i>
                            <a href="tel:+593979150254">(+593) 979150254</a>, 
                            <a href="tel:+593979229620">(+593) 979229620</a>
                        </li>
                        <li data-animate="fadeInUp" data-delay=".15">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:info.vpnet@yourmail.com">intelce_ecuador@hotmail.com</a>
                        </li>
                        <li data-animate="fadeInUp" data-delay=".2">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Dirección: Av. Cumanda entre Policia Nacional y Av. Ibarra</span>
                            <br>
                            <span>Edf: Pérez  oficina # 1 </span>
                            <br>
                            <span>PALORA-Morona Santiago </span>
                        </li>
                    </ul>
                </div>
            </div>
            {{--  --}}
            @php
                $visitantes = count_visitantes();
            @endphp
            <div class="col-md-4">
                <div class="footer-newsletter">
                    <h3 class="text-white" data-animate="fadeInUp" data-delay="0">Visitantes: </h3>
                    <ul class="footer-contacts list-unstyled" style="font-size: 1em;">
                        <li data-animate="fadeInUp" data-delay=".1" style="padding-left: 5px">
                            <strong >Dirario: {{ $visitantes->daily }}</strong>
                        </li>
                        <li data-animate="fadeInUp" data-delay=".1" style="padding-left: 5px">
                            <strong >Mensual: {{ $visitantes->month }}</strong>
                        </li>
                        <li data-animate="fadeInUp" data-delay=".1" style="padding-left: 5px">
                            <strong >Anual: {{ $visitantes->all }}</strong>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End of Footer newsletter -->
        </div>
        
        <div class="bottom-footer">
            <div class="row">
                <!-- Copyright -->
                <div class="col-md-5 order-last order-md-first">
                    <p class="copyright" data-animate="fadeInDown" data-delay=".85">&copy; Copyright {{ date('Y')}} <a href="https://edw-dev.com" target="_blank">edw-dev.com</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer -->

<!-- Back to top -->
<div class="back-to-top">
    <a href="#"> <i class="fas fa-arrow-up"></i></a>
</div>
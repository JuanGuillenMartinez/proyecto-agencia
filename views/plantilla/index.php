<?php

?>

<body>
    <div id="fh5co-wrapper">
        <div id="fh5co-page">

            <div class="fh5co-hero">
                <div class="fh5co-overlay"></div>
                <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(/plantilla/images/cover_bg_1.jpg);">
                    <div class="desc">
                        <div class="container">
                            <div class="row">
                                <div class="form-paquete col-md-6">
                                    <div class="tabulation animate-box">
                                        <div class="containter" style="background-color: white;">
                                            <h1>Aqui va el form</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 desc2 animate-box">

                                    <h2>Oferta exclusiva</h2>
                                    <h3>Vuelo de Hong Kong via Los Angeles, USA</h3>
                                    <span class="price">$599</span>
                                    <p><a class="btn btn-primary btn-lg" href="#">Conocer más</a></p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div id="fh5co-tours" class="fh5co-section-gray">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-8 text-center heading-section animate-box">
                        <h3>Paquetes populares</h3>
                        <p>Encuentra las mejores ofertas con paquetes que incluyen los boletos de viaje, traslado del aeropuerto a tu hotel y seguro de viaje.</p>
                    </div>
                </div>

                <div class="row">
                    <?= $this->render('/paquete/populares'); ?>
                    <div class="col-md-12 text-center animate-box">
                        <p><a class="btn btn-primary btn-outline btn-lg" href="/paquete">Ver todas las ofertas <i class="icon-arrow-right22"></i></a></p>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-features">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 animate-box">

                        <div class="feature-left">
                            <span class="icon">
                                <i class="icon-hotairballoon"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Family Travel</h3>
                                <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
                                <p><a href="#">Learn More</a></p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4 animate-box">
                        <div class="feature-left">
                            <span class="icon">
                                <i class="icon-search"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Travel Plans</h3>
                                <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
                                <p><a href="#">Learn More</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 animate-box">
                        <div class="feature-left">
                            <span class="icon">
                                <i class="icon-wallet"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Honeymoon</h3>
                                <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
                                <p><a href="#">Learn More</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 animate-box">

                        <div class="feature-left">
                            <span class="icon">
                                <i class="icon-wine"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Business Travel</h3>
                                <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
                                <p><a href="#">Learn More</a></p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4 animate-box">
                        <div class="feature-left">
                            <span class="icon">
                                <i class="icon-genius"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Solo Travel</h3>
                                <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
                                <p><a href="#">Learn More</a></p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 animate-box">
                        <div class="feature-left">
                            <span class="icon">
                                <i class="icon-chat"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Explorer</h3>
                                <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
                                <p><a href="#">Learn More</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="fh5co-destination">
            <div class="tour-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul id="fh5co-destination-list" class="animate-box">
                            <li class="one-forth text-center" style="background-image: url(/img/destino/mexico.jpg); ">
                                <a href="#">
                                    <div class="case-studies-summary">
                                        <h2>México</h2>
                                    </div>
                                </a>
                            </li>
                            <li class="one-forth text-center" style="background-image: url(/img/destino/bogota.jpg); ">
                                <a href="#">
                                    <div class="case-studies-summary">
                                        <h2>Colombia</h2>
                                    </div>
                                </a>
                            </li>
                            <li class="one-forth text-center" style="background-image: url(/img/destino/peru.jpg); ">
                                <a href="#">
                                    <div class="case-studies-summary">
                                        <h2>Perú</h2>
                                    </div>
                                </a>
                            </li>
                            <li class="one-forth text-center" style="background-image: url(/img/destino/argentina.jpg); ">
                                <a href="#">
                                    <div class="case-studies-summary">
                                        <h2>Argentina</h2>
                                    </div>
                                </a>
                            </li>

                            <li class="one-forth text-center" style="background-image: url(/img/destino/japon.jpg); ">
                                <a href="#">
                                    <div class="case-studies-summary">
                                        <h2>Japón</h2>
                                    </div>
                                </a>
                            </li>
                            <li class="one-half text-center">
                                <div class="title-bg">
                                    <div class="case-studies-summary">
                                        <h2>Destinos más populares</h2>
                                        <span><a href="#">Ver todos los destinos</a></span>
                                    </div>
                                </div>
                            </li>
                            <li class="one-forth text-center" style="background-image: url(/img/destino/angeles.jpg); ">
                                <a href="#">
                                    <div class="case-studies-summary">
                                        <h2>Los Angeles</h2>
                                    </div>
                                </a>
                            </li>
                            <li class="one-forth text-center" style="background-image: url(/img/destino/vegas.jpg); ">
                                <a href="#">
                                    <div class="case-studies-summary">
                                        <h2>Las Vegas</h2>
                                    </div>
                                </a>
                            </li>
                            <li class="one-forth text-center" style="background-image: url(/img/destino/miami.jpg); ">
                                <a href="#">
                                    <div class="case-studies-summary">
                                        <h2>Miami</h2>
                                    </div>
                                </a>
                            </li>
                            <li class="one-forth text-center" style="background-image: url(/img/destino/york.jpg); ">
                                <a href="#">
                                    <div class="case-studies-summary">
                                        <h2>New York</h2>
                                    </div>
                                </a>
                            </li>
                            <li class="one-forth text-center" style="background-image: url(/img/destino/londres.jpg); ">
                                <a href="#">
                                    <div class="case-studies-summary">
                                        <h2>Londres</h2>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-blog-section" class="fh5co-section-gray">
            <?= $this->render('/paquete/recientes'); ?>
        </div>
        <!-- fh5co-blog-section -->
        <div id="fh5co-testimonial" style="background-image:url(/plantilla/images/img_bg_1.jpg);">
            <div class="container">
                <div class="row animate-box justify-content-md-center">
                    <div class="col-md-8 text-center fh5co-heading">
                        <h2>Happy Clients</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box-testimony animate-box">
                            <blockquote>
                                <span class="quote"><span><i class="icon-quotes-right"></i></span></span>
                                <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                            </blockquote>
                            <p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="box-testimony animate-box">
                            <blockquote>
                                <span class="quote"><span><i class="icon-quotes-right"></i></span></span>
                                <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
                            </blockquote>
                            <p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="box-testimony animate-box">
                            <blockquote>
                                <span class="quote"><span><i class="icon-quotes-right"></i></span></span>
                                <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                            </blockquote>
                            <p class="author">John Doe, Founder <a href="#">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div id="footer">
                <div class="container">
                    <div class="row row-bottom-padded-md">
                        <div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
                            <h3>About Travel</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
                            <h3>Top Flights Routes</h3>
                            <ul>
                                <li><a href="#">Manila flights</a></li>
                                <li><a href="#">Dubai flights</a></li>
                                <li><a href="#">Bangkok flights</a></li>
                                <li><a href="#">Tokyo Flight</a></li>
                                <li><a href="#">New York Flights</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
                            <h3>Top Hotels</h3>
                            <ul>
                                <li><a href="#">Boracay Hotel</a></li>
                                <li><a href="#">Dubai Hotel</a></li>
                                <li><a href="#">Singapore Hotel</a></li>
                                <li><a href="#">Manila Hotel</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
                            <h3>Interest</h3>
                            <ul>
                                <li><a href="#">Beaches</a></li>
                                <li><a href="#">Family Travel</a></li>
                                <li><a href="#">Budget Travel</a></li>
                                <li><a href="#">Food &amp; Drink</a></li>
                                <li><a href="#">Honeymoon and Romance</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
                            <h3>Best Places</h3>
                            <ul>
                                <li><a href="#">Boracay Beach</a></li>
                                <li><a href="#">Dubai</a></li>
                                <li><a href="#">Singapore</a></li>
                                <li><a href="#">Hongkong</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
                            <h3>Affordable</h3>
                            <ul>
                                <li><a href="#">Food &amp; Drink</a></li>
                                <li><a href="#">Fare Flights</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-6 text-center">
                            <p class="fh5co-social-icons">
                                <a href="#"><i class="icon-twitter2"></i></a>
                                <a href="#"><i class="icon-facebook2"></i></a>
                                <a href="#"><i class="icon-instagram"></i></a>
                                <a href="#"><i class="icon-dribbble2"></i></a>
                                <a href="#"><i class="icon-youtube"></i></a>
                            </p>
                            <p>Copyright 2016 Free Html5 <a href="#">Module</a>. All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Freehtml5.co</a> / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>



    </div>
    <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->

</body>
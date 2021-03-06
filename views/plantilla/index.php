<?php

?>

<body>
    <div id="fh5co-wrapper">
        <div id="fh5co-page">
            <?= $this->render("/paquete/mejor_oferta", compact("paquete")); ?>
        </div>
        <div id="fh5co-tours" class="fh5co-section-gray">
            <?= $this->render("/paquete/ofertas", compact("paquetesOfertas")); ?>
        </div>


         

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <?=$this->render("/persona/login", compact("user", "persona", "login"))?>
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
                                        <h2>M??xico</h2>
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
                                        <h2>Per??</h2>
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
                                        <h2>Jap??n</h2>
                                    </div>
                                </a>
                            </li>
                            <li class="one-half text-center">
                                <div class="title-bg">
                                    <div class="case-studies-summary">
                                        <h2>Destinos m??s populares</h2>
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
            <?= $this->render('/paquete/recientes', compact("paquetesRecientes")); ?>
        </div>

    </div>
    <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->

</body>
<?php

use yii\helpers\Html;

?>
<?= $this->render("/paquete/mejor_oferta", compact("paquete")); ?>

<div class="container">
    <div class="body-paquetes">
        <div class="text row justify-content-md-center">
            <div class="col-md-8 text-center heading-section animate-box">
                <h3>Conoce todos nuestros paquetes</h3>
                <p>Nosotros le ofrecemos el siguiente catalogo de paquetes disponibles para usted.</p>
            </div>
        </div>

        <section class="recent-posts section-paquetes">
            <?php
            if (isset($paquetes)) { ?>
                <div class="card-columns listrecent">
                    <?php
                    foreach ($paquetes as $paquete) { ?>
                        <div class="card">
                            <a href="post.html">
                                <div class="container-image-paquete row justify-content-center">
                                    <?= Html::img("@web/img/paquete/" . $paquete->paq_url, ['class' => 'img-paquete img-fluid']) ?>
                                </div>
                                <!-- <img class="img-fluid" src="assets/img/demopic/7.jpg" alt=""> -->
                            </a>
                            <div class="card-text-campo card-block">
                                <h2 class="card-title"><a href="post.html"><?= $paquete->paq_nombre ?></a></h2>
                                <div>
                                    <div class="row">
                                        <div class="icons-card-paquete col-md-2">
                                            <i class="fas fa-plane-departure"></i>
                                        </div>
                                        <div class="text-card-paquete col-md-10">
                                            <span><?= $paquete->paqFkvuelo->vueFkaeroorigen->aeroFkubicacion->ubi_capital . ' - ' . $paquete->paqFkvuelo->vueFkaeroorigen->aeroFkubicacion->ubiFkpais->pai_pais ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="icons-card-paquete col-md-2">
                                            <i class="fas fa-plane-arrival"></i>
                                        </div>
                                        <div class="text-card-paquete col-md-10">
                                            <span><?= $paquete->paqFkvuelo->getVueloDestino() ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="icons-card-paquete col-md-2">
                                            <i class="fas fa-hotel"></i>
                                        </div>
                                        <div class="text-card-paquete col-md-10">
                                            <span><?= $paquete->paqFkalojamiento->getAlojamientoInfo() ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="icons-card-paquete col-md-2">
                                            <i class="fas fa-car-crash"></i>
                                        </div>
                                        <div class="text-card-paquete col-md-10">
                                            <span><?= $paquete->paqFkseguro->getSeguroNombre() ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="metafooter">
                                    <div class="wrapfooter" style="bottom: 13%;">
                                        <h6 class="precio-card d-inline mb-2" style="padding-bottom: 4px;margin-left: 0;padding-right: 12px;"><?= "De " . $paquete->getFormatedSubtotal() . " a " . $paquete->getFormatedPrecioDescuento() ?></h6>
                                    </div>
                                    <div class="wrapfooter">
                                        <span class="post-read-more"><a class="a-add"><i class="fas fa-cart-plus" onclick="agregarCarrito(<?= $paquete->paq_id ?>)" title="Agregar"></i></a></span>
                                        <span class="post-read-more" style="margin-right: 12px;">
                                            <?= Html::a('<i class="far fa-eye"></i>', ["/plantilla/paquete?id={$paquete->paq_id}"], ['class' => 'a-add']) ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <h1>No hay paquetes registrados</h1>
            <?php } ?>
        </section>
    </div>
</div>
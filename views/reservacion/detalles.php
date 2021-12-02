<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;

?>
<div>
    <!-- <div class="title-detalles row justify-content-md-center">
        <div class="col-md-8 text-center heading-section animate-box">
            <h3>Detalles de la reservación</h3>
            <p>Encuentra toda la información disponible de tus reservaciones</p>
        </div>
    </div> -->
    <div class="container-detalles">
        <div class="paquetes-reservacion">
            <div class="title-detalles row justify-content-md-center">
                <div class="col-md-8 text-center heading-section animate-box">
                    <h3><?= "Reservación " ?></h3>
                    <p>Encuentra toda la información disponible de tus reservaciones</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="banner-descripcion-paquete col-md-12" style="max-width: 88%;">
                    <div class="title-info-paquete">
                        <h1>Información de la reservación</h1>
                    </div>
                    <div class="contenido-informacion-paquete row">
                        <div class="div-contenido col-md-6">
                            <div class="elemento-informacion-paquete row">
                                <div class="icono-informacion-paquete col-md-3"><i class="fas fa-plane-departure"></i></div>
                                <div class="descripcion-elemento-informacion col-md-9">
                                    <p><?= "Propietario: " . $reservacion->getClienteNombre() ?></p>
                                </div>
                            </div>
                            <div class="elemento-informacion-paquete row">
                                <div class="icono-informacion-paquete col-md-3"><i class="fas fa-plane"></i></div>
                                <div class="descripcion-elemento-informacion col-md-9">
                                    <p><?= "Fecha de compra " . $reservacion->getFechaFormated() ?></p>
                                </div>
                            </div>
                            <div class="elemento-informacion-paquete row">
                                <div class="icono-informacion-paquete col-md-3"><i class="fas fa-hotel"></i></div>
                                <div class="descripcion-elemento-informacion col-md-9">
                                    <p><?= "Hora de compra: " . $reservacion->getHoraFormated() ?></p>
                                </div>
                            </div>

                        </div>
                        <div class="div-contenido col-md-6">
                            <div class="elemento-informacion-paquete row">
                                <div class="icono-informacion-paquete col-md-3"><i class="fas fa-car"></i></div>
                                <div class="descripcion-elemento-informacion col-md-9">
                                    <p><?= "ID de reservación:  " . $reservacion->res_id ?></p>
                                </div>
                            </div>
                            <div class="elemento-informacion-paquete row">
                                <div class="icono-informacion-paquete col-md-3"><i class="fas fa-car-crash"></i></div>
                                <div class="descripcion-elemento-informacion col-md-9">
                                    <p><?= "Estatus: " . $reservacion->res_estatus ?></p>
                                </div>
                            </div>
                            <div class="elemento-informacion-paquete row">
                                <div class="icono-informacion-paquete col-md-3"><i class="fas fa-money-bill-wave"></i></div>
                                <div class="descripcion-elemento-informacion col-md-9">
                                    <p><?= "Total pagado: " . $reservacion->getSubtotal() ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <section class="light">

                <div class="container container-detalles-reservacion py-2">
                    <!-- <div class="h1 text-center text-dark" id="pageHeaderTitle">My Cards Light</div> -->
                    <?php
                    $paquetesReservacion = $reservacion->getPaquetes();
                    foreach ($paquetesReservacion as $paqueteReservacion) {
                        $paquete = $paqueteReservacion->recpaqFkpaquete;
                    ?>
                        <article class="postcard light red">
                            <a class="postcard__img_link" href="#">
                                <?= Html::img('@web/img/paquete/' . $paquete->paq_url, ['class' => 'postcard__img']) ?>
                                <?= Html::img('@web/img/aeropuerto/' . $paquete->paqFkvuelo->vueFkaerodestino->aero_url, ['class' => 'postcard__img']) ?>
                            </a>
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title red"><a href="/paquete/mostrar?<?= $paquete->paq_id ?>"><?= $paquete->paq_nombre ?></a></h1>
                                <div class="postcard__subtitle small">
                                    <time datetime="2020-05-25 12:00:00">
                                        <i class="fas fa-calendar-alt mr-2"></i><?= $reservacion->getFechaHoraFormated() ?></time>
                                </div>
                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt"><?= $paquete->paq_descripcion ?></div>
                                <ul class="postcard__tagbox">
                                    <li class="tag__item"><i class="fas fa-tag mr-2"></i><?= "Cantidad: " . $paqueteReservacion->recpaq_cantidad ?></li>
                                    <li class="tag__item"><i class="fas fa-money-check-alt"></i><?= " Precio: " . $paqueteReservacion->getSubtotalGrupoPaquetesFormated() ?></li>
                                    <li class="tag__item play red">
                                        <?= Html::a('<i class="far fa-eye"></i> Ver más' , ['/plantilla/paquete?id=' . $paquete->paq_id]) ?>
                                        <!-- <a href="#"><i class="fas fa-play mr-2"></i>Ver más</a> -->
                                    </li>
                                </ul>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </section>
        </div>
    </div>
</div>
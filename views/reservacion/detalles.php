<?php

use yii\bootstrap4\Html;
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
                    <h3><?= "Reservación: "?></h3>
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
                                    <p><?= "Propietario: " . $persona->getNombreCompleto() ?></p>
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
                                    <p><?= "Total pagado: $" . $reservacion->getSubtotal() ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <section class="light">

                <div class="container container-detalles-reservacion py-2">
                    <!-- <div class="h1 text-center text-dark" id="pageHeaderTitle">My Cards Light</div> -->


                    <article class="postcard light red">
                        <a class="postcard__img_link" href="#">
                            <img class="postcard__img" src="https://picsum.photos/501/500" alt="Image Title" />
                        </a>
                        <div class="postcard__text t-dark">
                            <h1 class="postcard__title red"><a href="#">Podcast Title</a></h1>
                            <div class="postcard__subtitle small">
                                <time datetime="2020-05-25 12:00:00">
                                    <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                            <ul class="postcard__tagbox">
                                <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                                <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                                <li class="tag__item play red">
                                    <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
            </section>
        </div>
    </div>
</div>
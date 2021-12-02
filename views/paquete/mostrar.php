<?php

use yii\helpers\Html;

?>
<div class="container-mostrar">
    <div class="grid second-nav">
        <div class="column-xs-12">
            <nav>
                <ol class="breadcrumb-list">
                    <li class="breadcrumb-item"><?= Html::a('Paquetes', ['/plantilla'], ['a-url-descripcion-paquete']) ?></li>
                    <li class="breadcrumb-item"><?= Html::a('Paquetes', ['/plantilla/paquetes'], ['a-url-descripcion-paquete']) ?> </li>
                    <li class="breadcrumb-item active"><?= $paquete->paq_nombre ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <?php
    $imagenPaquete = "@web/img/paquete/" . $paquete->paq_url;
    $imagenOrigen = "@web/img/aeropuerto/" . $paquete->paqFkvuelo->vueFkaeroorigen->aero_url;
    $imagenDestino = "@web/img/aeropuerto/" . $paquete->paqFkvuelo->vueFkaerodestino->aero_url;
    $imagenAlojamiento = "@web/img/alojamiento/" . $paquete->paqFkalojamiento->alo_url;
    ?>
    <div class="body-vista-paquete row">
        <div class="col-md-6">
            <div class="product-gallery row">
                <div class="product-image">
                    <div class="img-vista-paquete">
                        <?= Html::img($imagenPaquete, ['class' => 'img-vista-producto img-producto-mostrar', 'title' => $paquete->paq_nombre]) ?>
                    </div>
                </div>
                <ul class="ul-list-images-paquete image-list row">
                    <div class="col-md-4 div-image">
                        <?= Html::img($imagenOrigen, ['class' => 'img-vista-producto img-descripcion-paquete', 'title' => $paquete->getPaisOrigen()]) ?>
                        <!-- <li class="image-item"></li> -->
                    </div>
                    <div class="col-md-4 div-image">
                        <?= Html::img($imagenDestino, ['class' => 'img-vista-producto img-descripcion-paquete', 'title' => $paquete->getPaisDestino()]) ?>
                    </div>
                    <div class="col-md-4 div-image">
                        <?= Html::img($imagenAlojamiento, ['class' => 'img-vista-producto img-descripcion-paquete', 'title' => "Hotel " . $paquete->getAlojamientoNombre()]) ?>
                    </div>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="">
                <h1 class="title-descripcion-paquete"><?= $paquete->paq_nombre ?></h1>
                <div class="div-precios-paquete row">
                    <h2 class="precio-descripcion-paquete col-md-6"><?= $paquete->getFormatedSubtotal() ?></h2>
                    <h2 class="precio-final-paquete col-md-6"><?= $paquete->getFormatedPrecioDescuento() ?></h2>
                </div>
                <div class="description">
                    <p class="p-descripcion-paquete"><?= $paquete->paq_descripcion ?></p>
                </div>
                <?= Html::button(' Añadir al carro', ['class' => 'add-to-cart', 'id' => 'button-add', 'onclick' => "agregarCarrito({$paquete->paq_id})"]) ?>
            </div>
        </div>
        <div class="contenedor-informacion-paquete col-md-12">
            <div class="banner-descripcion-paquete col-md-12">
                <div class="title-info-paquete">
                    <h1>Información del paquete</h1>
                </div>
                <div class="contenido-informacion-paquete row">
                    <div class="div-contenido col-md-6">
                        <div class="elemento-informacion-paquete row">
                            <div class="icono-informacion-paquete col-md-3"><i class="fas fa-plane-departure"></i></div>
                            <div class="descripcion-elemento-informacion col-md-9">
                                <p><?= "Vuelo desde " . $paquete->getPaisOrigen() . " hasta " . $paquete->getPaisDestino() . " con " . $paquete->getAerolineaNombre() ?></p>
                            </div>
                        </div>
                        <div class="elemento-informacion-paquete row">
                            <div class="icono-informacion-paquete col-md-3"><i class="fas fa-plane"></i></div>
                            <div class="descripcion-elemento-informacion col-md-9">
                                <p><?= "Saliendo de " . $paquete->getOrigenVuelo() . " con destino a " . $paquete->getDestinoVuelo() ?></p>
                            </div>
                        </div>
                        <div class="elemento-informacion-paquete row">
                            <div class="icono-informacion-paquete col-md-3"><i class="fas fa-hotel"></i></div>
                            <div class="descripcion-elemento-informacion col-md-9">
                                <p><?= "Alojamiento incluido: " . $paquete->getAlojamientoNombre() . " úbicado en " . $paquete->paqFkalojamiento->alo_direccion ?></p>
                            </div>
                        </div>

                    </div>
                    <div class="div-contenido col-md-6">
                        <div class="elemento-informacion-paquete row">
                            <div class="icono-informacion-paquete col-md-3"><i class="fas fa-car"></i></div>
                            <div class="descripcion-elemento-informacion col-md-9">
                                <p><?= "Traslado incluido desde el aeropuerto " . $paquete->getDestinoVuelo() . " hasta su hotel " . $paquete->getAlojamientoNombre() ?></p>
                            </div>
                        </div>
                        <div class="elemento-informacion-paquete row">
                            <div class="icono-informacion-paquete col-md-3"><i class="fas fa-car-crash"></i></div>
                            <div class="descripcion-elemento-informacion col-md-9">
                                <p><?= "Incluye un seguro de viaje " . $paquete->paqFkseguro->getSeguroNombre() . " válido en " . $paquete->paqFkseguro->segFkregion->reg_region ?></p>
                            </div>
                        </div>
                        <div class="elemento-informacion-paquete row">
                            <div class="icono-informacion-paquete col-md-3"><i class="fas fa-money-bill-wave"></i></div>
                            <div class="descripcion-elemento-informacion col-md-9">
                                <p><?= "De " . $paquete->getFormatedSubtotal() . " a " . $paquete->getFormatedPrecioDescuento() . " pesos, con un increíble " . $paquete->paq_descuento . "% de descuento" ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
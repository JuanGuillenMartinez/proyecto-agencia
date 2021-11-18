<?php

use yii\helpers\Html;

?>

<div class="fh5co-cover" style="background-image: url(/img/fondo.jpg);">
    <div class="desc">
        <div class="container">
            <div class="row">
                <div class="form-paquete col-md-6">
                    <div class="tabulation animate-box">
                        <div class="containter">
                            <div>
                                <div class="card-mejor-oferta">
                                    <div class="div-img-responsive">
                                        <?= Html::img("@web/img/paquete/{$paquete->paq_url}", ['class' => 'img-modal animate-box img-responsive']); ?>
                                    </div>
                                    <div class="card-body-paquete card-body d-flex flex-column justify-content-between">
                                        <div>
                                            <h6 class="precio-card d-inline mb-2">
                                            <?= "De $" . $paquete->paq_subtotal . " a $" . $paquete->getPrecioDescuento() ?></h6>
                                            <h4 class="titulo-card"><?= $paquete->paqFkvuelo->getVueloInfo() ?></h4>
                                            <span class="descripcion-card">Vuelo <?= $paquete->paqFkvuelo->vue_tipo ?><br>Vuelo con <?= $paquete->paq_descuento ?>% de descuento<br>Traslado incluido<br>
                                            </span>
                                        </div>
                                        <?= Html::button('<i class="fas fa-cart-plus"></i>Agregar al carrito', ['class' => 'btn-add btn btn-primary d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center', 'role' => 'button', 'data-bss-hover-animate' => 'pulse', 'target' => 'blank', 'onclick' => "agregarCarrito({$paquete->paq_id})"]) ?>
                                        <!-- <a class="btn-add btn btn-primary d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center" role="button" data-bss-hover-animate="pulse" target="_blank"><i class="fas fa-cart-plus"></i>Agregar al carrito</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="div-mejor-oferta col-md-6 desc2 animate-box">
                    <h2>Oferta exclusiva</h2>
                    <h3>Vuelo de <?= $paquete->paqFkvuelo->vueFkaeroorigen->aeroFkubicacion->ubi_capital ?> hasta  <?= $paquete->paqFkvuelo->vueFkaerodestino->aeroFkubicacion->ubi_capital ?></h3>
                    <span class="price">&#36;<?= $paquete->getSubtotalDescuento() ?> MXN</span>
                    <p>
                        <?= Html::a('Conocer más', ['/plantilla/paquete?id=' . $paquete->paq_id], ['class' => 'btn btn-primary btn-lg']) ?>
                        <!-- <a class="btn btn-primary btn-lg" href="#">Conocer más</a> -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

use yii\bootstrap4\Html;

$precioFinalReservacion = 0;
$numeroPaquetes = isset($paquetesReservacion) ? count($paquetesReservacion) : 0;
$ahorroTotal = 0;

?>
<div class="div-body-cart">
    <div class="container-cart">
        <div class="row justify-content-md-center">
            <div class="col-md-8 text-center heading-section animate-box">
                <h3>Reservaciones</h3>
                <p>Encuentra las mejores ofertas con paquetes que incluyen los boletos de viaje, traslado del aeropuerto a tu hotel y seguro de viaje.</p>
            </div>
        </div>
        <div class="cart">
            <div class="products">
                <?php
                if (isset($paquetesReservacion)) {
                    foreach ($paquetesReservacion as $reservacionPaquete) {
                        $paquete = $reservacionPaquete->recpaqFkpaquete;
                        $precioFinalReservacion += $paquete->getPrecioDescuento();
                        $ahorroTotal += $paquete->getPrecioDescontado();
                ?>
                        <div class="product">
                            <div class="div-product-cart">
                                <?= Html::img("@web/img/paquete/" . $paquete->paq_url, ['class' => 'img-product-cart']) ?>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name"><?= $paquete->paq_nombre . ' - ' . $paquete->paqFkvuelo->getVueloDestino() ?></h3>
                                <h4 class="product-price"><span><?= ' Llevatelo por tan solo $' . $paquete->getPrecioDescuento() ?></span><span class="span-precio"><?= '$' . $paquete->paq_subtotal ?></span></h4>

                                <h4 class="product-offer"><?= $paquete->paq_descuento . '% de descuento!' ?></h4>
                                <p class="product-quantity">Cantidad: <input readonly value="1" name="">
                                    <button class="product-remove" onclick="eliminarPaqueteCarrito(<?= $reservacionPaquete->recpaq_id ?>)">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        <span class="remove">Eliminar</span>
                                    </button>
                            </div>
                        </div>
                <?php }
                } else { ?>
                    <h2>No hay productos en el carrito</h2>
                <?php } ?>
            </div>
            <div class="cart-total">
                <p>
                    <span>Precio Final</span>
                    <span><?= '$' . $precioFinalReservacion ?></span>
                </p>
                <p>
                    <span>Número de paquetes</span>
                    <span><?= $numeroPaquetes ?></span>
                </p>
                <p>
                    <span>Ahorras</span>
                    <span><?= '$' . $ahorroTotal ?></span>
                </p>
                <a href="#">Pagar</a>
            </div>
        </div>
    </div>
</div>
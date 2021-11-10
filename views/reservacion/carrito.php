<?php

use yii\bootstrap4\Html;

$precioFinalReservacion = 0;
$numeroPaquetes = count($reservacion->reservacionpaquetes);
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
                foreach ($reservacion->reservacionpaquetes as $reservacionPaquete) { 
                    $paquete = $reservacionPaquete->recpaqFkpaquete; 
                    $precioFinalReservacion += $paquete->getPrecioDescuento();
                    $ahorroTotal += $paquete->getPrecioDescontado();
                    ?>
                    <div class="product">
                        <?= Html::img("@web/img/paquete/" . $paquete->paq_url) ?>
                        <div class="product-info">
                            <h3 class="product-name"><?= $paquete->paq_nombre . ' - ' . $paquete->paqFkvuelo->getVueloDestino() ?></h3>
                            <h4 class="product-price"><?= '$' . $paquete->paq_subtotal ?></h4>
                            <h4 class="product-offer"><?= $paquete->paq_descuento . '%'?></h4>
                            <p class="product-quantity">Cantidad: <input readonly value="1" name="">
                            <p class="product-remove">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                <span class="remove">Eliminar</span>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="cart-total">
                <p>
                    <span>Precio Final</span>
                    <span><?='$' . $precioFinalReservacion?></span>
                </p>
                <p>
                    <span>Número de paquetes</span>
                    <span><?= $numeroPaquetes ?></span>
                </p>
                <p>
                    <span>Ahorras</span>
                    <span><?='$' . $ahorroTotal ?></span>
                </p>
                <a href="#">Pagar</a>
            </div>
        </div>
    </div>
</div>
<?php

use yii\bootstrap4\Html;
?>

<?php
if (isset($paquetesReservacion)) {
    foreach ($paquetesReservacion as $reservacionPaquete) {
        $paquete = $reservacionPaquete->recpaqFkpaquete;

        $numeroPaquetes += $reservacionPaquete->recpaq_cantidad;
        $precioFinalReservacion += $reservacionPaquete->getSubtotalGrupoPaquetes();
        $ahorroTotal += $reservacionPaquete->getDescuentoGrupoPaquetes();
?>
        <div class="product">
            <div class="div-product-cart">
                <?= Html::img("@web/img/paquete/" . $paquete->paq_url, ['class' => 'img-product-cart']) ?>
            </div>
            <div class="product-info">
                <h3 class="product-name"><?= $paquete->paq_nombre . ' - ' . $paquete->paqFkvuelo->getVueloDestino() ?></h3>
                <h4 class="product-price"><span><?= ' Llevatelo por tan solo $' . $paquete->getPrecioDescuento() ?></span><span class="span-precio"><?= '$' . $paquete->paq_subtotal ?></span></h4>

                <h4 class="product-offer"><?= $paquete->paq_descuento . '% de descuento!' ?></h4>
                <div class="row">
                    <div class="col-md-4">
                        <p class="product-quantity">Cantidad: <input readonly value="<?= $reservacionPaquete->recpaq_cantidad ?>" name=""></p>
                    </div>
                    <div class="col-md-4">
                        <a href="/plantilla/paquete?id=<?= $paquete->paq_id ?>"><button class="product-show">
                                <i class="far fa-eye"></i>
                                <span class="remove">Ver</span>
                            </button></a>
                    </div>
                    <div class="col-md-4">
                        <button class="product-remove" onclick="eliminarPaqueteCarrito(<?= $reservacionPaquete->recpaq_id ?>)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            <span class="remove">Eliminar</span>
                        </button>
                    </div>
                </div>
                <p class="product-quantity">Cantidad: <input readonly value="1" name=""></p>
            </div>
        </div>
    <?php }
} else { ?>
    <h2>No hay productos en el carrito</h2>
<?php } ?>
<?php

use yii\bootstrap4\Html;
?>

<?php
if (isset($paquetesReservacion)) {
    foreach ($paquetesReservacion as $reservacionPaquete) {
        $paquete = $reservacionPaquete->recpaqFkpaquete;?>
        <div class="product">
            <div class="div-product-cart">
                <?= Html::img("@web/img/paquete/" . $paquete->paq_url, ['class' => 'img-product-cart']) ?>
            </div>
            <div class="product-info">
                <h3 class="product-name"><?= $paquete->paq_nombre . ' - ' . $paquete->paqFkvuelo->getVueloDestino() ?></h3>
                <h4 class="product-price"><span><?= ' Llevatelo por tan solo $' ?><span id="precioPaquete"><?= $paquete->getPrecioDescuento() ?></span></span><span class="span-precio"><?= '$<span id="precioSinDescuento">' . $paquete->paq_subtotal . '</span>' ?></span></h4>
                <div class="row">
                    <div class="col-md-1">
                        <h4 id="descuento-producto" class="product-offer"><?= $paquete->paq_descuento ?></h4>
                    </div>
                    <div style="padding-left: 0;" class="col-md-11">
                        <h4><?= '% de descuento!' ?></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="container-inumber col-md-4">
                        <span class="input-decrement input-number-decrement size-input">–</span><input id="inumber-cantidad<?= $reservacionPaquete->recpaq_id ?>" class="input-number size-input" type="text" value=<?= $reservacionPaquete->recpaq_cantidad ?> min="1" max="10"><span class="input-increment input-number-increment size-input">+</span><span id="btn-check" onclick="actualizarCarrito(<?= $reservacionPaquete->recpaq_id ?>)" class="input-number-increment size-input">&check;</span>
                    </div>
                    <div class="col-md-4">
                        <a href="/plantilla/paquete?id=<?= $paquete->paq_id ?>"><button style="float: right;" class="product-show">
                                <i class="far fa-eye"></i>
                                <span class="remove">Ver</span>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <button class="product-remove size-input" onclick="eliminarPaqueteCarrito(<?= $reservacionPaquete->recpaq_id ?>)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            <span class="remove">Eliminar</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php }
} else { ?>
    <h2>No hay productos en el carrito</h2>
<?php } ?>
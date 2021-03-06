<?php

use yii\bootstrap4\Html;


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
            <div class="products" id="div-carrito">
                <?= $this->render('paquetes-carrito', compact('reservacion', 'paquetesReservacion')) ?>
            </div>
            <div class="cart-total">
                <p>
                    <span>Precio Final</span>
                    <span id="span-precio-final">$0</span>
                </p>
                <p>
                    <span>Número de paquetes</span>
                    <span id="span-numero-paquetes">0</span>
                </p>
                <p>
                    <span>Ahorras</span>
                    <span id="span-ahorro">$0</span>
                </p>
                <?= Html::button('Pagar', (isset($reservacion) && isset($paquetesReservacion)) ? ['onclick' => "validarReservacion(1, {$reservacion->res_id})", 'id' => 'btn-pagar-reservacion'] : ['disabled' => true]) ?>
            </div>
        </div>
    </div>
</div>
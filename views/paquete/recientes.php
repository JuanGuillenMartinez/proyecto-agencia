<?php

use app\models\Paquete;
use yii\helpers\Html;
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8 text-center heading-section animate-box">
            <?= Html::tag('h3', 'Paquetes recientes', []); ?>
            <?= Html::tag('p', 'Ultimos paquetes añadidos a nuestro catalogo de ofertas con un gran precio. Disponible para todos.', []); ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row row-paquete row-bottom-padded-md">

    <?php
        foreach ($paquetesRecientes as $paquete) {
            $urlImagen = '@web/img/paquete/' . $paquete->paq_url; ?>
            <div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
                <div>
                    <?= Html::img($urlImagen, ['class' => 'img-responsive', 'width' => '125%']); ?>
                    <div class='desc'>
                        <span></span>
                        <div class='ofertas-description'>
                            <h3><?= $paquete->paq_nombre ?></h3>
                            <span><?= $paquete->paqFkvuelo->getVueloDestino() ?></span>
                            <span style='text-decoration-line: line-through;' class='price'>&#36;<?= $paquete->paq_subtotal ?></span>
                            <span class='descuento'>Hasta <?= $paquete->paq_descuento ?>%</span>
                            <?= Html::button('Comprar ahora', ['class' => 'btn btn-primary btn-outline', 'onClick' => "modal({$paquete->paq_id})"]) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

    <div class="col-md-12 text-center animate-box">
        <p><a class="btn btn-primary btn-outline btn-lg" href="#">Ver todos <i class="icon-arrow-right22"></i></a></p>
    </div>

</div>
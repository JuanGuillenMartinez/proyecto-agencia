<?php

use yii\helpers\Html;

$paquete = $model;

?>
<div class="card-paquete">
    <div class="container-image-paquete grid-item">
        <?= Html::img("@web/img/paquete/" . $paquete->paq_url, ['class' => 'img-paquete']) ?>
        <?php
        // echo ('<pre>');
        // var_dump($model);
        // echo ('</pre>');
        // die;
        ?>
    </div>
    <div class="card-text-campo card-block">
        <h2 class="card-title titulo-card-paquete"><a href="post.html"><?= $paquete->paq_nombre ?></a></h2>
        <div>
            <div class="row">
                <div class="icons-card-paquete col-md-2">
                    <i class="fas fa-plane-departure"></i>
                </div>
                <div class="text-card-paquete col-md-10">
                    <span><?= $paquete->getVueloInfoOrigen() ?>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="icons-card-paquete col-md-2">
                    <i class="fas fa-plane-arrival"></i>
                </div>
                <div class="text-card-paquete col-md-10">
                    <span><?= $paquete->getVueloInfoDestino() ?></span>
                </div>
            </div>
            <div class="row">
                <div class="icons-card-paquete col-md-2">
                    <i class="fas fa-hotel"></i>
                </div>
                <div class="text-card-paquete col-md-10">
                    <span><?= $paquete->getAlojamientoInfo() ?></span>
                </div>
            </div>
            <div class="row">
                <div class="icons-card-paquete col-md-2">
                    <i class="fas fa-car-crash"></i>
                </div>
                <div class="text-card-paquete col-md-10">
                    <span><?= $paquete->getSeguroInfo() ?></span>
                </div>
            </div>
        </div>
        <div class="metafooter ">
            <div>
                <h6 class="precio-card"><?= "De " . $paquete->getFormatedSubtotal() . " a " . $paquete->getFormatedPrecioDescuento() ?></h6>
            </div>
            <div>
                <span class="post-read-more">
                    <a class="a-add post-buy">
                        <i class="fas fa-cart-plus" onclick="agregarCarrito(<?= $paquete->paq_id ?>)" title="Agregar"></i>
                    </a>
                </span>
                <span class="post-read-more">
                    <?= Html::a('<i class="far fa-eye"></i>', ["/plantilla/paquete?id={$paquete->paq_id}"], ['class' => 'a-add']) ?>
                </span>
            </div>
        </div>
    </div>
</div>
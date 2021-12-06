<?php

use yii\helpers\Html;

?>
<div class="card-paquete div-fondo-seguro">
    <div class="card-text-campo card-block div-contenido-seguro">
        <h2 class="card-title titulo-card-paquete"><a href="post.html"><?= $model->seg_nombre ?></a></h2>
        <div>
            <div class="row">
                <div class="icons-card-paquete col-md-2">
                    <i class="fas fa-globe-europe"></i>
                </div>
                <div class="text-card-paquete col-md-10">
                    <span><?= $model->getNombreRegion() ?></span>
                </div>
            </div>
            <div class="row">
                <div class="icons-card-paquete col-md-2">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="text-card-paquete col-md-10">
                    <span><?= $model->getNombreAseguradora() ?></span>
                </div>
            </div>
            <div class="row">
                <div class="icons-card-paquete col-md-2">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div class="text-card-paquete col-md-10">
                    <span><?= $model->getAseguradoraTelefono() ?></span>
                </div>
            </div>
            <div class="row">
                <div class="icons-card-paquete col-md-2">
                    <i class="far fa-envelope"></i>
                </div>
                <div class="text-card-paquete col-md-10">
                    <span><?= $model->getAseguradoraCorreo() ?></span>
                </div>
            </div>
        </div>
        <div class="metafooter ">
            <div>
                <h6 class="precio-card"><?= $model->getPrecioFormated() . " MXN." ?></h6>
            </div>
        </div>
    </div>
</div>
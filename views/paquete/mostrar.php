<?php

use yii\helpers\Html;
?>
<div class="container">
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
                    <?= Html::img($imagenPaquete, ['class' => 'img-producto-mostrar']) ?> 
                </div>
                <ul class="ul-list-images-paquete image-list row">
                    <div class="col-md-4 div-image">
                        <?= Html::img($imagenOrigen, ['class' => 'img-descripcion-paquete']) ?> 
                        <!-- <li class="image-item"></li> -->
                    </div>
                    <div class="col-md-4 div-image">
                    <?= Html::img($imagenDestino, ['class' => 'img-descripcion-paquete']) ?> 
                    </div>
                    <div class="col-md-4 div-image">
                    <?= Html::img($imagenAlojamiento, ['class' => 'img-descripcion-paquete']) ?> 
                    </div>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="">
                <h1 class="title-descripcion-paquete"><?= $paquete->paq_nombre ?></h1>
                <h2 class="precio-descripcion-paquete"><?= '$' . $paquete->paq_subtotal ?></h2>
                <div class="description">
                    <p class="p-descripcion-paquete">The purposes of bonsai are primarily contemplation for the viewer, and the pleasant exercise of effort and
                        ingenuity for the grower.</p>
                    <p class="p-descripcion-paquete">By contrast with other plant cultivation practices, bonsai is not intended for production of food or for
                        medicine. Instead, bonsai practice focuses on long-term cultivation and shaping of one or more small trees
                        growing in a container.</p>
                </div>
                <?= Html::button(' Añadir al carro', ['class' => 'add-to-cart', 'id' => 'button-add']) ?>
            </div>
        </div>
    </div>
</div>
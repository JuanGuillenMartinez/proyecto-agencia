<?php

use app\models\Vuelo;
use app\models\CatAeropuerto;
use yii\helpers\Html;

?>
<?= $this->render("/paquete/mejor_oferta", compact('paquete')); ?>

<div class="container">
    <div class="main-card-vuelos">
        <div class="text row justify-content-md-center">
            <div class="col-md-8 text-center heading-section animate-box">
                <h3>Hoteles</h3>
                <p>Le ofrecemos una amplia variedad de hoteles</p>
            </div>
        </div>
    </div>
</div>

<div class="body-vuelo">
    <div class="all-container">

        <?php
        foreach ($hoteles as $alojamiento) { ?>
            <div class="card">
                <div class="card-one">
                    <div class="div-img">
                        <?= Html::img('@web/img/alojamiento/' . $alojamiento->alo_url, ['class' => 'card-img']) ?>
                    </div>
                    <h6 class="guided titulo-h6-vuelo">Hotel</h6>
                    <h2 class="titulo-h2-vuelo"><?= $alojamiento->alo_nombre ?></h2>
                    <h5 class="titulo-h5-vuelo"><?= $alojamiento->alo_direccion ?></h5>
                    <h5 class="titulo-h5-vuelo"><?= $alojamiento->getUbicacionInfo() ?></h5>
                    <div class="row row-vuelo">
                        
                        <div class="col-md-6 text-prices">
                            <span class="from span-vuelo">Desde</span>
                            <span class="price span-vuelo precio"><i class="fas fa-dollar-sign"></i><?= $alojamiento->alo_precio ?></span>
                            <span class="person span-vuelo">Por noche</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php  }; ?>
    </div>
</div>
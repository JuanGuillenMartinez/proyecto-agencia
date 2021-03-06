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
                <h3>Vuelos </h3>
                <p>Le ofrecemos una amplia variedad de vuelos con una gran cantidad de destinos y lugares</p>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-5 col-md-5">
    <div class="tabulation animate-box">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#flights" aria-controls="flights" role="tab" data-toggle="tab">Busca tu vuelo ideal</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="flights">
                <div class="row">
                    <?= $this->render('_search', ['model' => $model]) ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="body-vuelos">
    <div class="all-container">

        <?php
        foreach ($vuelos as $vuelo) { ?>
            <div class="card-vuelos">
                <div class="card-one">
                    <div class="div-img">
                        <?= Html::img('@web/img/aeropuerto/' . $vuelo->vueFkaerodestino->aero_url, ['class' => 'card-img']) ?>
                    </div>
                    <h6 class="guided titulo-h6-vuelo"><?= $vuelo->vue_tipo ?></h6>
                    <h2 class="titulo-h2-vuelo"><?= $vuelo->getVueloDestino() ?></h2>
                    <h5 class="titulo-h5-vuelo"><?= $vuelo->vue_estatus ?></h5>
                    <div class="row row-vuelo">
                        <div class="col-md-6">
                            <i class="far fa-clock"> <span class="span-vuelo"><?= $vuelo->vue_salida ?></span></i><br>
                            <!-- <i class="fas fa-user-friends"> <span class="span-vuelo"><?= $vuelo->vue_capacidad ?></span></i> -->
                            <i class="fas fa-plane"> <span class="span-vuelo"><?= $vuelo->getVueAerolinea() ?></span></i>
                        </div>
                        <div class="col-md-6 text-prices">
                            <span class="from span-vuelo">Desde</span>
                            <span class="price span-vuelo precio"><i class="fas fa-dollar-sign"></i><?= $vuelo->vue_precio ?></span>
                            <span class="person span-vuelo">Por persona</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php  }; ?>
    </div>
</div>
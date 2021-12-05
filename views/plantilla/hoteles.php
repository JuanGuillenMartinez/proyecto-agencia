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

<div class="col-sm-5 col-md-5">
    <div class="tabulation animate-box">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#flights" aria-controls="flights" role="tab" data-toggle="tab">Busca tu hotel ideal</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="flights">
                <div class="row">
                    <?= $this->render('_searchH', ['model' => $model]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="body-hotel">
    <div class="all-container-hotel">
        <?php
        foreach ($hoteles as $alojamiento) { ?>
            <div class="cards-hotel">
                <div class="card-hotel">
                    <div class="card__image-holder-hotel">
                        <?= Html::img('@web/img/alojamiento/' . $alojamiento->alo_url, ['class' => 'img-hotel']) ?>
                    </div>
                    <div class="card-title-hotel">
                        <a href="#" class="toggle-info-hotel btn-hotel">
                            <span class="left-hotel"></span>
                            <span class="right-hotel"></span>
                        </a>
                        <h2 class="titulo-h2-hotel">
                            <?= $alojamiento->alo_nombre ?>
                        </h2>
                        <h4 class="titulo-h4-hotel">
                            <small><?= $alojamiento->getUbicacionInfo() ?></small>
                        </h4>
                    </div>
                    <div class="card-flap-hotel flap1-hotel">
                        <div class="card-description-hotel">
                            <div class="row">
                                <div class="col-md-6">
                                    <i class="fas fa-map-marker-alt"></i><i><span class="span-hotel"> <?= $alojamiento->alo_direccion ?></span></i><br>
                                </div>
                                <div class="col-md-6 text-prices">
                                    <span class="from span-vuelo">Desde</span>
                                    <span class="price span-vuelo precio"><i class="fas fa-dollar-sign"><?= $alojamiento->alo_precio ?></i></span><br>
                                    <span class="person span-vuelo">La noche</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-flap-hotel flap2-hotel">
                            <!--div class="card-actions-hotel">
                            <a href="#" class="btn-hotel">Read more</a>
                        </div-->
                        </div>
                    </div>
                </div>
            </div>
        <?php  }; ?>
    </div>
</div>
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


<div class="body-vuelo">
    <div class="all-container">

        <?php
        foreach ($hoteles as $alojamiento) { ?>
            <div class="card-vuelos">
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

        </*div class="all-container-hotel"*/>
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
                    <h2>
                        <?= $alojamiento->alo_nombre ?>
                        <small><?= $alojamiento->alo_direccion ?></small>
                    </h2>
                    <h4>
                        <small><?= $alojamiento->getUbicacionInfo() ?></small>
                    </h4>
                </div>
                <div class="card-flap-hotel flap1-hotel">
                    <div class="card-description-hotel">
                        This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when
                        they're not available etc.
                    </div>
                    <div class="card-flap-hotel flap2-hotel">
                        <div class="card-actions-hotel">
                            <!--a href="#" class="btn-hotel">Read more</a-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php  }; ?>
</*/div*/>
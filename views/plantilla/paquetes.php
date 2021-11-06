<?php

use app\models\Paquete;
use yii\helpers\Html;

?>
<?= $this->render("/paquete/mejor_oferta", compact("paquete")); ?>

<div class="container">
    <div class="main-card-paquetes">
        <div class="text row justify-content-md-center">
            <div class="col-md-8 text-center heading-section animate-box">
                <h3>Conoce todos nuestros paquetes</h3>
                <p>Nosotros le ofrecemos el siguiente catalogo de paquetes disponibles para usted.</p>
            </div>
        </div>
        <ul class="cards">
            <?php
            $paquetes = Paquete::find()->all();
            foreach ($paquetes as $paquete) {
                echo '<li class="cards_item">
                    <div class="card-paquete">
                    <div class="card_image">';
                $urlImagen = '@web/img/paquete/' . $paquete->paq_url;
                echo Html::img($urlImagen, ['class' => 'image-card']);
                echo '</div>';
                echo "
                    <div class='card_content'>
                    <h2 class='card_title'>{$paquete->getDestinoVuelo()}</h2>
                    <p class='card_text'>{$paquete->paqFkvuelo->getVueloInfo()}</p>
                    <button class='btn-card-paquetes card_btn'>Leer más</button>
                </div>
                    ";
                echo '</div>
                    </li>';
            }
            ?>
        </ul>
    </div>
</div>
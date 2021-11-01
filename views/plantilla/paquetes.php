<?php

use app\models\Paquete;
use yii\helpers\Html;

?>
<?= $this->render("/paquete/mejor_oferta"); ?>

<div class="container">
    <div class="main-card-paquetes">
        <ul class="cards">
            <?php 
                $paquetes = Paquete::find()->all();
                foreach($paquetes as $paquete) {
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
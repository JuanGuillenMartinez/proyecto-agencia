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
    <div class="row row-bottom-padded-md">
        <?php
        $paquetes = Paquete::find()->orderBy(['paq_id' => SORT_DESC])->limit(12)->all();
        foreach ($paquetes as $paquete) {
            $urlImagen = '@web/img/paquete/' . $paquete->paq_url;
            echo "
                    <div class='col-lg-4 col-md-4 col-sm-6'>
                        <div class='fh5co-blog animate-box'>
                        <a href='#'> ";
                        echo Html::img($urlImagen, ['class' => 'img-responsive', 'height' => '300px']);
                        echo "</a>
                        <div class='blog-text'>
                    <div class='prod-title'>
                        <h3><a href='#'>{$paquete->paq_nombre}</a></h3>
                        <h3><a href='#'>{$paquete->paqFkvuelo->getVueloInfo()}</a></h3>
                        <p><a href='#'>Leer más...</a></p>
                    </div>
                    </div>
                    </div>
                    </div>
                ";
        }
        ?>
    </div>

    <div class="col-md-12 text-center animate-box">
        <p><a class="btn btn-primary btn-outline btn-lg" href="#">Ver todos <i class="icon-arrow-right22"></i></a></p>
    </div>

</div>
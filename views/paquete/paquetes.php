<?php

use yii\widgets\ListView;

?>

<?= $this->render("/paquete/mejor_oferta", compact("paquete")); ?>

<div class="container">
    <div class="body-paquetes">
        <div class="text row justify-content-md-center">
            <div class="col-md-8 text-center heading-section animate-box">
                <h3>Conoce todos nuestros paquetes</h3>
                <p>Nosotros le ofrecemos el siguiente catalogo de paquetes disponibles para usted.</p>
            </div>
        </div>
        
        <div>
            <?= $this->render('_search', ['model' => $searchModel]); ?>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'options' => [
                    'tag' => 'div',
                    'class' => 'list-wrapper section-paquetes',
                    'id' => 'list-wrapper'
                ],
                'itemView' => '_paquete',
                'layout' => '{pager}{items}{summary}',
            ]);
            ?>
        </div>
    </div>
</div>
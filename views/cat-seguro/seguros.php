<?php

use yii\widgets\ListView;

?>

<?= $this->render("/paquete/mejor_oferta", compact("paquete")); ?>

<div class="container">
    <div class="body-paquetes">
        <div class="text row justify-content-md-center">
            <div class="col-md-8 text-center heading-section animate-box">
                <h3>Conoce todos nuestros seguros</h3>
                <p>Nosotros le ofrecemos el siguiente catalogo de seguros para que nuestros clientes disfruten completamente su viaje.</p>
            </div>
        </div>
        <div class="body-view-paquetes">
            <div class="search-paquetes">
                <?= $this->render('_search', ['model' => $searchModel]); ?>
            </div>
            <div class="section-cards-paquetes">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'options' => [
                        'tag' => 'div',
                        'class' => 'list-wrapper section-paquetes',
                        'id' => 'list-wrapper'
                    ],
                    'itemView' => '_seguro',
                    'layout' => '{pager}{items}{summary}',
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
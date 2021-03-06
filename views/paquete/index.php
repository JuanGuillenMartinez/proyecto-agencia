<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaqueteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
// Aqui va la vista de el index con todos los registros
$this->title = 'Paquetes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paquete-index container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar Paquete', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Paquete',
                'attribute' => 'paq_nombre',
            ],
            [
                'contentOptions' => [
                    'class' => 'lbl-descripcion'
                ],
                'label' => 'Descripcion',
                'attribute' => 'paq_descripcion',
            ],
            'paq_descuento',
            'paq_subtotal',
            [
                'attribute' => 'imagen',
                'format' => 'raw',
            ],
            'infoVuelo',
            // 'destinoVuelo',
            // 'origenVuelo',
            'numeroHabitacion',
            'nombreSeguro',
            'precioTraslado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

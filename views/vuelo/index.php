<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VueloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vuelos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vuelo-index container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Añadir Vuelo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'vue_id',
            'vue_tipo',
            'vue_salida',
            'vue_llegada',
            'vue_fecha',
            'vue_capacidad',
            'vue_precio',
            'vue_estatus',
            //'vue_fkaerolinea',
            'aerolineaNombre',
            //'vue_fkaeroorigen',
            'origenVuelo',
            //'vue_fkaerodestino',
            'destinoVuelo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

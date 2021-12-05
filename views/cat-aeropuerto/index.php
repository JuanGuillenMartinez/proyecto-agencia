<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatAeropuertoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aeropuertos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-aeropuerto-index container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Añadir Aeropuerto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'aero_id',
            'aero_nombre',
            'aero_direccion',
            'aero_pagina',
            [
                'attribute' => 'imagen',
                'format' => 'raw',
            ],
            //'aero_fkubicacion',
            'capitalNombre',
            'nombrePais',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatAerolineaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aerolineas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-aerolinea-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Aerolinea', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /* 'aer_id', */
            'aer_nombre',
            'aer_tipo',
            'aer_pagina',
            /* 'aer_url', */
            [
            'attribute' => 'imagen',
            'format' => 'raw',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

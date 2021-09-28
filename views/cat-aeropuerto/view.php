<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CatAeropuerto */

$this->title = $model->aero_id;
$this->params['breadcrumbs'][] = ['label' => 'Aeropuertos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cat-aeropuerto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->aero_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->aero_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de que quiere eliminar este artículo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'aero_id',
            'aero_nombre',
            'aero_direccion',
            'aero_pagina',
            'aero_url:url',
            'aero_fkubicacion',
        ],
    ]) ?>

</div>

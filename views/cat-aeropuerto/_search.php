<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatAeropuertoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-aeropuerto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'aero_id') ?>

    <?= $form->field($model, 'aero_nombre') ?>

    <?= $form->field($model, 'aero_direccion') ?>

    <?= $form->field($model, 'aero_pagina') ?>

    <?= $form->field($model, 'aero_fkubicacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

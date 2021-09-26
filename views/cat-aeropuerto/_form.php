<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatAeropuerto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-aeropuerto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'aero_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aero_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aero_pagina')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aero_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aero_fkubicacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

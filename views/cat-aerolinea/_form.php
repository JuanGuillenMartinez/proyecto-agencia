<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatAerolinea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-aerolinea-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'aer_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aer_tipo')->dropDownList([ 'regional' => 'Regional', 'red' => 'Red', 'gran escala' => 'Gran escala', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'aer_pagina')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

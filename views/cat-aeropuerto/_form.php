<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use app\models\CatUbicacion;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatAeropuerto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-aeropuerto-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'aero_nombre')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'aero_direccion')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'aero_pagina')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="col-md-3">
            <?= $form->field($model, 'aero_url')->textInput(['maxlength' => true]) ?>
        </div>


        <?php //$form->field($model, 'aero_fkubicacion')->textInput() 
        ?>

        <div class="col-md-3">
        <?= $form->field($model, 'aero_fkubicacion')->widget(Select2::classname(), [
            'data' => CatUbicacion::map(),
            'language' => 'es',
            'options' => ['placeholder' => 'Selecciona una ciudad...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        </div>


    </div>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
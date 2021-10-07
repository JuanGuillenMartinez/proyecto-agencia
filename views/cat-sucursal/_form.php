<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatSucursal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-sucursal-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-3">
        <?= $form->field($model, 'suc_nombre')->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="col-md-3">
        <?= $form->field($model, 'suc_direccion')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-3">
        <?= $form->field($model, 'suc_correo')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-3">
        <?= $form->field($model, 'suc_telefono')->textInput(['maxlength' => true]) ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

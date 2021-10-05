<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatAseguradora */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-aseguradora-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ase_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ase_telefono')->textInput() ?>

    <?= $form->field($model, 'ase_correo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

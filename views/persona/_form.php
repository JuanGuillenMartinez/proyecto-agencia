<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'per_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_nacimiento')->textInput() ?>

    <?= $form->field($model, 'per_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_fkuser')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Paquete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paquete-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paq_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paq_subtotal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paq_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paq_fkvuelo')->textInput() ?>

    <?= $form->field($model, 'paq_fkalojamiento')->textInput() ?>

    <?= $form->field($model, 'paq_fkseguro')->textInput() ?>

    <?= $form->field($model, 'paq_fktraslado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reservacionpaquete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservacionpaquete-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recpaq_estatus')->dropDownList(['Seleccionado' => 'Seleccionado', 'Descartado' => 'Descartado'], ['prompt' => '']) ?>

    <?= $form->field($model, 'recpaq_fkreservacion')->textInput() ?>

    <?= $form->field($model, 'recpaq_fkpaquete')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
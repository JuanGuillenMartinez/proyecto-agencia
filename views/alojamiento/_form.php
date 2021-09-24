<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Alojamiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alojamiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alo_habitacion')->textInput() ?>

    <?= $form->field($model, 'alo_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alo_precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alo_fkubucacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

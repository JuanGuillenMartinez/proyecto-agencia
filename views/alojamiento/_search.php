<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlojamientoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alojamiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'alo_id') ?>

    <?= $form->field($model, 'alo_nombre') ?>

    <?= $form->field($model, 'alo_habitacion') ?>

    <?= $form->field($model, 'alo_direccion') ?>

    <?= $form->field($model, 'alo_precio') ?>

    <?php // echo $form->field($model, 'alo_url') ?>

    <?php // echo $form->field($model, 'alo_fkubucacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

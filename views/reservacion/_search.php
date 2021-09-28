<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReservacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'res_id') ?>

    <?= $form->field($model, 'res_creacion') ?>

    <?= $form->field($model, 'res_estatus') ?>

    <?= $form->field($model, 'res_subtotal') ?>

    <?= $form->field($model, 'res_fkpersona') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

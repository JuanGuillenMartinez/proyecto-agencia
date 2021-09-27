<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PagoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pago-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pag_id') ?>

    <?= $form->field($model, 'pag_direccion') ?>

    <?= $form->field($model, 'pag_tipo') ?>

    <?= $form->field($model, 'pag_entidad') ?>

    <?= $form->field($model, 'pag_tarjeta') ?>

    <?php // echo $form->field($model, 'pag_expiracion') ?>

    <?php // echo $form->field($model, 'pag_estatus') ?>

    <?php // echo $form->field($model, 'pag_fkreservacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

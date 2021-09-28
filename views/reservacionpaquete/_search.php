<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReservacionpaqueteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservacionpaquete-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recpaq_id') ?>

    <?= $form->field($model, 'recpaq_fkreservacion') ?>

    <?= $form->field($model, 'recpaq_fkpaquete') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

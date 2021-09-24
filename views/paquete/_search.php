<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaqueteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paquete-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'paq_id') ?>

    <?= $form->field($model, 'paq_nombre') ?>

    <?= $form->field($model, 'paq_subtotal') ?>

    <?= $form->field($model, 'paq_url') ?>

    <?= $form->field($model, 'paq_fkvuelo') ?>

    <?php // echo $form->field($model, 'paq_fkalojamiento') ?>

    <?php // echo $form->field($model, 'paq_fkseguro') ?>

    <?php // echo $form->field($model, 'paq_fktraslado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

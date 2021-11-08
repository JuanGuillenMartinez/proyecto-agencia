<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatAerolineaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-aerolinea-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'aer_id') ?>

    <?= $form->field($model, 'aer_nombre') ?>

    <?= $form->field($model, 'aer_tipo') ?>

    <?= $form->field($model, 'aer_pagina') ?>

    <?= $form->field($model, 'aer_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

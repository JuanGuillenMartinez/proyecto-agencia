<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VueloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vuelo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vue_id') ?>

    <?= $form->field($model, 'vue_tipo') ?>

    <?= $form->field($model, 'vue_salida') ?>

    <?= $form->field($model, 'vue_llegada') ?>

    <?= $form->field($model, 'vue_fecha') ?>

    <?php // echo $form->field($model, 'vue_capacidad') ?>

    <?php // echo $form->field($model, 'vue_precio') ?>

    <?php // echo $form->field($model, 'vue_estatus') ?>

    <?php // echo $form->field($model, 'vue_fkaerolinea') ?>

    <?php // echo $form->field($model, 'vue_fkaeroorigen') ?>

    <?php // echo $form->field($model, 'vue_fkaerodestino') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

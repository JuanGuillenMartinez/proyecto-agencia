<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'per_id') ?>

    <?= $form->field($model, 'per_nombre') ?>

    <?= $form->field($model, 'per_paterno') ?>

    <?= $form->field($model, 'per_materno') ?>

    <?= $form->field($model, 'per_nacimiento') ?>

    <?php // echo $form->field($model, 'per_direccion') ?>

    <?php // echo $form->field($model, 'per_correo') ?>

    <?php // echo $form->field($model, 'per_telefono') ?>

    <?php // echo $form->field($model, 'per_url') ?>

    <?php // echo $form->field($model, 'per_fkuser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

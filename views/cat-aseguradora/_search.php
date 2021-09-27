<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatAseguradoraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-aseguradora-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ase_id') ?>

    <?= $form->field($model, 'ase_nombre') ?>

    <?= $form->field($model, 'ase_telefono') ?>

    <?= $form->field($model, 'ase_correo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

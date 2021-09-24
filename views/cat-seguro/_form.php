<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatSeguro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-seguro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seg_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seg_precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seg_fkregion')->textInput() ?>

    <?= $form->field($model, 'seg_fkaseguradora')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

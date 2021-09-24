<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatRegion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-region-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reg_region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

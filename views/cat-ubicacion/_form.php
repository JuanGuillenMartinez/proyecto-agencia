<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatUbicacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-ubicacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ubi_capital')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ubi_fkpais')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

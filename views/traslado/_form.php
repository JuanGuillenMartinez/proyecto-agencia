<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Traslado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="traslado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tra_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_fkubicacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

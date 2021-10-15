<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Traslado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="traslado-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md">
            <?= $form->field($model, 'tra_precio')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reservacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'res_creacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'res_estatus')->dropDownList([ 'Pagado' => 'Pagado', 'En cobro' => 'En cobro', 'Cancelado' => 'Cancelado', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'res_subtotal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'res_fkpersona')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pago */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pago-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pag_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pag_tipo')->dropDownList([ 'debito' => 'Debito', 'credito' => 'Credito', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pag_entidad')->dropDownList([ 'mastercard' => 'Mastercard', 'visa' => 'Visa', 'american express' => 'American express', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pag_tarjeta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pag_expiracion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pag_estatus')->dropDownList([ 'pagado' => 'Pagado', 'en proceso' => 'En proceso', 'rechazado' => 'Rechazado', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pag_fkreservacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

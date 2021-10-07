<?php

use app\models\Pago;
use yii\helpers\Html;
use kartik\select2\Select2;
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

    <?php /* $form->field($model, 'pag_fkreservacion')->textInput() */ ?>
    

    <?=
    $form->field($model, 'pag_fkreservacion')->widget(Select2::classname(), [
        'data' => Pago::mapReservaciones(),
        'language' => 'es',
        'options' => ['placeholder' => 'Selecciona una reservacion ...'],
        'pluginOptions' => [
            'allowClear' => true    
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

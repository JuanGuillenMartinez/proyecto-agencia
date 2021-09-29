<?php

use app\models\Paquete;
use app\models\Reservacion;
use kartik\select2\Select2;
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

    <?= $form->field($model, 'res_fkpersona')->widget(Select2::classname(), [
        'data' => Reservacion::getClientesNombresMap(),
        'options' => ['placeholder' => 'Selecciona el cliente ...'],
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

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php /*= $form->field($model, 'emp_fksucursal')->textInput() */?>

    <?= $form->field($model, 'emp_fksucursal')->widget(Select2::classname(), [
    'data' => $sucursal,
    'language' => 'es', 
    'options' => ['placeholder' => 'Seleccione una sucursal...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]); ?>


    <?php /*= $form->field($model, 'emp_fkpersona')->textInput() */?>

    <?= $form->field($model, 'emp_fkpersona')->widget(Select2::classname(), [
    'data' => $persona,
    'language' => 'es', 
    'options' => ['placeholder' => 'Seleccione una persona...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]); ?>
    

    <?php /*= $form->field($model, 'emp_fkpuesto')->textInput() */?>

    <?= $form->field($model, 'emp_fkpuesto')->widget(Select2::classname(), [
    'data' => $puesto,
    'language' => 'es', 
    'options' => ['placeholder' => 'Seleccione un puesto...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

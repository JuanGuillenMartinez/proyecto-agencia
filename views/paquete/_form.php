<?php

use yii\helpers\Html;
use app\models\Paquete;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Paquete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paquete-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'paq_nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'paq_subtotal')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'paq_fkvuelo')->widget(Select2::classname(), [
                'data' => Paquete::getVuelosMap(),
                'options' => ['placeholder' => 'Selecciona un vuelo ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'paq_fkalojamiento')->widget(Select2::classname(), [
                'data' => Paquete::getAlojamientosMap(),
                'options' => ['placeholder' => 'Selecciona un alojamiento ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'paq_fkseguro')->widget(Select2::classname(), [
                'data' => Paquete::getSegurosMap(),
                'options' => ['placeholder' => 'Selecciona un seguro ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'paq_fktraslado')->widget(Select2::classname(), [
                'data' => Paquete::getTrasladosMap(),
                'options' => ['placeholder' => 'Selecciona un traslado ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'img')->widget(FileInput::className(), [
                'options'       => ['accept' => 'image/*'], 
                'pluginOptions' => [
                    'allowedExtensions'    => ['jpg', 'png'],
                    // 'initialPreview'       => [$model->url],
                    // 'initialPreviewAsData' => true,
                ],
            ]); ?>          
        </div>
        
    </div>
    <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            </div>
    <?php ActiveForm::end(); ?>

</div>
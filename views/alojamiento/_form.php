<?php

use yii\helpers\Html;
use kartik\file\FileInput;
use kartik\widgets\Select2;
use app\models\CatUbicacion;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Alojamiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alojamiento-form container-crud">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        
        <div class="col-md-3">
        <?= $form->field($model, 'alo_nombre')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
        <?= $form->field($model, 'alo_habitacion')->textInput() ?>
        </div>

        <div class="col-md-3">
        <?= $form->field($model, 'alo_direccion')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
        <?= $form->field($model, 'alo_precio')->textInput(['maxlength' => true]) ?>
        </div>

        <?php //$form->field($model, 'alo_fkubucacion')->textInput() 
        ?>
        
        <div class="col-md-3">
        <?= $form->field($model, 'alo_fkubucacion')->widget(Select2::classname(), [
            'data' => CatUbicacion::map(),
            'language' => 'es',
            'options' => ['placeholder' => 'Selecciona una ciudad...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        </div>

        <div class="col-md-12">
            <?= $form->field($model, 'img')->widget(FileInput::className(), [
                'options'       => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'allowedExtensions'    => ['jpg', 'png'],
                    'initialPreview'       => [$model->url],
                    'initialPreviewAsData' => true,
                ],
            ]); ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
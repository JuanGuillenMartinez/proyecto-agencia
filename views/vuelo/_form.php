<?php

use app\models\Vuelo;
use yii\helpers\Html;
use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use kartik\time\TimePicker;
use kartik\widgets\Select2;
use app\models\CatAerolinea;
use app\models\CatUbicacion;
use app\models\CatAeropuerto;

/* @var $this yii\web\View */
/* @var $model app\models\Vuelo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vuelo-form container-crud">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <!--div class="col-md-3">
            <?php //= $form->field($model, 'vue_tipo')->dropDownList(['Directo' => 'Directo', 'Escala' => 'Escala',], ['prompt' => '']) ?>
        </div-->
        
        <div class="col-md-3">
            <?= $form->field($model, 'vue_tipo')->widget(Select2::classname(), [
                'data' => Vuelo::mapTipo(),
                'language' => 'es',
                'options' => ['placeholder' => 'Selecciona el tipo de vuelo...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'vue_salida')->widget(TimePicker::classname(), [
                'options' => ['placeholder' => 'Hora de salida'],
                'pluginOptions' => [
                    'showSeconds' => true,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                    'secondStep' => 5,
                ]
            ]); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'vue_llegada')->widget(TimePicker::classname(), [
                'options' => ['placeholder' => 'Hora de llegada'],
                'pluginOptions' => [
                    'showSeconds' => true,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                    'secondStep' => 5,
                ]
            ]); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'vue_fecha')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Fecha límite'],
                'removeButton' => false,
                'pickerIcon' => '<i class = "fas fa-calendar-alt text-primary"></i>',
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'vue_capacidad')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'vue_precio')->textInput(['maxlength' => true]) ?>
        </div>

        <!--div class="col-md-3">
            <?php //= $form->field($model, 'vue_estatus')->dropDownList(['Listo' => 'Listo', 'Retrasado' => 'Retrasado', 'Cancelado' => 'Cancelado',], ['prompt' => '']) ?>
        </div-->

        <div class="col-md-3">
            <?= $form->field($model, 'vue_estatus')->widget(Select2::classname(), [
                'data' => Vuelo::mapEstatus(),
                'language' => 'es',
                'options' => ['placeholder' => 'Selecciona el tipo de vuelo...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <?php //= $form->field($model, 'vue_fkaerolinea')->textInput() 
        ?>

        <?php //= $form->field($model, 'vue_fkaeroorigen')->textInput() 
        ?>

        <?php //= $form->field($model, 'vue_fkaerodestino')->textInput() 
        ?>

        <div class="col-md-3">
            <?= $form->field($model, 'vue_fkaerolinea')->widget(Select2::classname(), [
                'data' => CatAerolinea::map(),
                'language' => 'es',
                'options' => ['placeholder' => 'Selecciona una aerolinea...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'vue_fkaeroorigen')->widget(Select2::classname(), [
                'data' => CatAeropuerto::map(),
                'language' => 'es',
                'options' => ['placeholder' => 'Selecciona el aeropuerto de origen...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'vue_fkaerodestino')->widget(Select2::classname(), [
                'data' => CatAeropuerto::map(),
                'language' => 'es',
                'options' => ['placeholder' => 'Selecciona el aeropuerto de destino...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>


    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
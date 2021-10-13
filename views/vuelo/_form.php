<?php

use yii\helpers\Html;
use kartik\widgets\Select2;
use yii\widgets\ActiveForm;
use app\models\CatAerolinea;
use app\models\CatUbicacion;

/* @var $this yii\web\View */
/* @var $model app\models\Vuelo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vuelo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vue_tipo')->dropDownList([ 'Directo' => 'Directo', 'Escala' => 'Escala', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'vue_salida')->textInput() ?>

    <?= $form->field($model, 'vue_llegada')->textInput() ?>

    <?= $form->field($model, 'vue_fecha')->textInput() ?>

    <?= $form->field($model, 'vue_capacidad')->textInput() ?>

    <?= $form->field($model, 'vue_precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vue_estatus')->dropDownList([ 'Listo' => 'Listo', 'Retrasado' => 'Retrasado', 'Cancelado' => 'Cancelado', ], ['prompt' => '']) ?>

    <?php //= $form->field($model, 'vue_fkaerolinea')->textInput() ?>

    <?php //= $form->field($model, 'vue_fkaeroorigen')->textInput() ?>

    <?php //= $form->field($model, 'vue_fkaerodestino')->textInput() ?>

    <?=$form->field($model, 'vue_fkaerolinea')->widget(Select2::classname(), [
    'data' => CatAerolinea::map(),
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona una aerolinea...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);?>

<?=$form->field($model, 'vue_fkaeroorigen')->widget(Select2::classname(), [
    'data' => CatUbicacion::map(),
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona el aeropuerto de origen...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);?>

<?=$form->field($model, 'vue_fkaerodestino')->widget(Select2::classname(), [
    'data' => CatUbicacion::map(),
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona el aeropuerto de destino...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

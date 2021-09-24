<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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

    <?= $form->field($model, 'vue_fkaerolinea')->textInput() ?>

    <?= $form->field($model, 'vue_fkaeroorigen')->textInput() ?>

    <?= $form->field($model, 'vue_fkaerodestino')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use app\models\CatUbicacion;
use yii\helpers\Html;
use kartik\widgets\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Alojamiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alojamiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alo_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alo_habitacion')->textInput() ?>

    <?= $form->field($model, 'alo_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alo_precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alo_url')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'alo_fkubucacion')->textInput() ?>

    <?=$form->field($model, 'alo_fkubucacion')->widget(Select2::classname(), [
    'data' => CatUbicacion :: map(),
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona una ciudad...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

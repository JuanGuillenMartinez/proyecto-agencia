<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\CatUbicacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-ubicacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ubi_capital')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'ubi_fkpais')->textInput() ?>

    <?=$form->field($model, 'ubi_fkpais')->widget(Select2::classname(), [
    'data' => $paises,
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona un país...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

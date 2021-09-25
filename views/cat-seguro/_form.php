<?php

use app\models\CatAseguradora;
use app\models\CatSeguro;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatSeguro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-seguro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seg_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seg_precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seg_fkregion')->widget(Select2::classname(), [
        'data' => CatSeguro::getRegionesMap(),
        'options' => ['placeholder' => 'Selecciona una región ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ]); 
    ?>

    <?= $form->field($model, 'seg_fkaseguradora')->widget(Select2::classname(), [
        'data' => CatSeguro::getAseguradorasMap(),
        'options' => ['placeholder' => 'Selecciona una aseguradora ...'],
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

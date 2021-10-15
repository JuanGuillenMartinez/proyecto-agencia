<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatAerolinea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-aerolinea-form">

    
    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'aer_nombre')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?=
                $form->field($model, 'aer_tipo')->widget(Select2::classname(), [
                    'data' => ['regional' => 'Regional', 'red' => 'Red', 'gran escala' => 'Gran escala',],
                    'language' => 'es',
                    'options' => ['placeholder' => 'Selecciona un tipo ...'],
                    'pluginOptions' => [
                        'allowClear' => true    
                    ],
                ]);
            ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'aer_pagina')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
      
    <?php /* $form->field($model, 'aer_tipo')->dropDownList(['regional' => 'Regional', 'red' => 'Red', 'gran escala' => 'Gran escala',  ], ['prompt' => '']) */?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

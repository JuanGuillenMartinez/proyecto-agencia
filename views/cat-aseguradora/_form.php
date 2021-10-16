<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
/* use yii\bootstrap4\ActiveForm; */

/* @var $this yii\web\View */
/* @var $model app\models\CatAseguradora */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-aseguradora-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'ase_nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            
            <?=$form->field($model, 'ase_telefono',[
                'feedbackIcon'=>[
                    'prefix'=>'fas fa-',
                    'default'=>'mobile-alt',
                    'success'=>'check-circle',
                    'error'=>'exclamation-circle',
                ]
            ])->widget('yii\widgets\MaskedInput',['mask'=>'999-999-9999']); ?>
            
            
        </div>
        

        <div class="col-md-4">
            <?= $form->field($model, 'ase_correo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

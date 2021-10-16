<?php

use app\models\Pago;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Pago */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pago-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'pag_direccion')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?=
            $form->field($model, 'pag_tipo')->widget(Select2::classname(), [
                'data' => [ 'debito' => 'Debito', 'credito' => 'Credito',],
                'language' => 'es',
                'options' => ['placeholder' => 'Selecciona un tipo ...'],
                'pluginOptions' => [
                    'allowClear' => true    
                ],
            ]);
            ?>
        </div>
        <div class="col-md-3">
            <?=
            $form->field($model, 'pag_entidad')->widget(Select2::classname(), [
                'data' => [ 'mastercard' => 'Mastercard', 'visa' => 'Visa', 'american express' => 'American express', ],
                'language' => 'es',
                'options' => ['placeholder' => 'Selecciona una entidad ...'],
                'pluginOptions' => [
                    'allowClear' => true    
                ],
            ]);
            ?>
        </div>
        <div class="col-md-3">
            
            <?=$form->field($model, 'pag_tarjeta',[
                'feedbackIcon'=>[
                    'prefix'=>'fas fa-',
                    'default'=>'credit-card',
                    'success'=>'check-circle',
                    'error'=>'exclamation-circle',
                ]
            ])->widget('yii\widgets\MaskedInput',['mask'=>'9999 9999 9999 9999']); ?>
            
            
        </div>
        <div class="col-md-4">
        <?=$form->field($model, 'pag_expiracion',[
                'feedbackIcon'=>[
                    'prefix'=>'fas fa-',
                    'default'=>'credit-card',
                    'success'=>'check-circle',
                    'error'=>'exclamation-circle',
                ]
            ])->widget('yii\widgets\MaskedInput',['mask'=>'99/99']); ?>
                    
        </div>
        <div class="col-md-4">
            <?=
                $form->field($model, 'pag_estatus')->widget(Select2::classname(), [
                    'data' => [ 'pagado' => 'Pagado', 'en proceso' => 'En proceso', 'rechazado' => 'Rechazado', ],
                    'language' => 'es',
                    'options' => ['placeholder' => 'Selecciona un estatus ...'],
                    'pluginOptions' => [
                        'allowClear' => true    
                    ],
                ]);
            ?>
        </div>
        <div class="col-md-4">
            <?=
                $form->field($model, 'pag_fkreservacion')->widget(Select2::classname(), [
                    'data' => Pago::mapReservaciones(),
                    'language' => 'es',
                    'options' => ['placeholder' => 'Selecciona una reservacion ...'],
                    'pluginOptions' => [
                        'allowClear' => true    
                    ],
                ]);
            ?>
        </div>
       
    </div>
    <?php  
    /* $form->field($model, 'pag_tipo')->dropDownList([ 'debito' => 'Debito', 'credito' => 'Credito', '' => '', ], ['prompt' => '']) */
    ?>
    <?php 
    /* $form->field($model, 'pag_entidad')->dropDownList([ 'mastercard' => 'Mastercard', 'visa' => 'Visa', 'american express' => 'American express', ], ['prompt' => '']) */
    ?>
    <?php 
    /* $form->field($model, 'pag_estatus')->dropDownList([ 'pagado' => 'Pagado', 'en proceso' => 'En proceso', 'rechazado' => 'Rechazado', ], ['prompt' => '']) */
    ?>
    <?php /* $form->field($model, 'pag_fkreservacion')->textInput() */ ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

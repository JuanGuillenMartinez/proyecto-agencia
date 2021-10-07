<?php

use app\controllers\PersonaController;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'per_nombre')->textInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col-md-3">
            <?= $form->field($model, 'per_paterno')->textInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col-md-3">
            <?= $form->field($model, 'per_materno')->textInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col-md-3">
            <?= $form->field($model, 'per_nacimiento')->textInput() ?>
        </div>
    
        <div class="col-md-3">
            <?= $form->field($model, 'per_direccion')->textInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col-md-3">
            <?= $form->field($model, 'per_correo')->textInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col-md-3">
            <?= $form->field($model, 'per_telefono')->textInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col-md-3">
            <?= $form->field($model, 'per_url')->textInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col-md-3">
        <?= $form->field($model, 'per_fkuser')->widget(Select2::classname(), [
        'data' => $users,
        'language' => 'es', 
        'options' => ['placeholder' => 'Seleccione un usuario...'],
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

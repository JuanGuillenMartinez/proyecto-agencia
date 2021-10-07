<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;


?>

<div>
    <h1>Registrar persona</h1>

    <div class="registrar-persona">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
       
        <div class="col-md-3">
            <?= $form->field($user, 'username')->textInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($user, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($user, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>
        </div>

        <div class="col-md-9">
        </div>
        <div class="col-md-3">
            <?= $form->field($user, 'email_confirmed')->checkbox() ?>
        </div>
        
        <div class="col-md-2">
            <?= $form->field($persona, 'per_nombre')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($persona, 'per_paterno')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($persona, 'per_materno')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($persona, 'per_nacimiento')->textInput() ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($persona, 'per_direccion')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($persona, 'per_correo')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($persona, 'per_telefono')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($persona, 'per_url')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($persona, 'per_fkuser')->textInput()?>
        </div>

        
    </div>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>

</div>
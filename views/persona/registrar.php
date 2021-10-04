<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;


?>

<div>
    <h1>Registrar persona</h1>

    <div class="registrar-persona">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($user, 'username')->textInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>

	<?= $form->field($user, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>

	<?= $form->field($user, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
	
    <?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>
	
    <?= $form->field($user, 'email_confirmed')->checkbox() ?>


    <?= $form->field($persona, 'per_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'per_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'per_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'per_nacimiento')->textInput() ?>

    <?= $form->field($persona, 'per_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'per_correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'per_telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'per_url')->textInput(['maxlength' => true]) ?>

     <?php /*= $form->field($model, 'per_fkuser')->textInput() */?>
   
    <?= $form->field($persona, 'per_fkuser')->widget(Select2::classname(), [
    'data' => $users,
    'language' => 'es', 
    'options' => ['placeholder' => 'Seleccione un usuario...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]); ?>




    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>

</div>
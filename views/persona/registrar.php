<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\bootstrap4\ActiveForm;


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

        
        <div class="col-md-4">
                    <?= $form->field($persona, 'per_url')->widget(
                            FileInput::classname(),
                            [
                                'options' => [
                                    'accept' => 'images/*',
                                ],
                                'pluginOptions' => [
                                    'showPreview'    => true,
                                    'showRemove'     => false,
                                    'showUpload'     => false,
                                    'browseClass'    => 'btn btn-success',
                                    'uploadClass'    => 'btn btn-info',
                                    'removeClass'    => 'btn btn-danger',
                                    'removeIcon'     => '<i class="glyphicon glyphicon-trash"></i>',
                                    'allowedFileExtensions' => ["png", "jpg", "jpeg"],
                                    'initialPreview' => [
                                    Url::home(true) . 'img/perfil.png'
                                    ],
                                    'initialPreviewAsData' => true,
                                ]
                            ]
                        );
                        ?>
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
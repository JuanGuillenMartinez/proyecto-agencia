<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\file\FileInput;
use kartik\widgets\DatePicker;
use yii\bootstrap4\ActiveForm;


?>

<div>
    <h1>Registrar</h1>

    <div class="registrar-persona">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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
            <?= $form->field($persona, 'per_nacimiento')->widget(
                DatePicker::className(),
                [
                    'type' => DatePicker::TYPE_INPUT,
                    'value' => date('Y-m-d'),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]
            ) ?>
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
                    <?= $form->field($persona, 'img')->widget(
                            FileInput::classname(),
                            [
                                'options' => [
                                'accept' => 'image/*',
                                ],
                                'pluginOptions' => [
                                    'showPreview'    => true,
                                    'showRemove'     => false,
                                    'showUpload'     => false,
                                    'browseClass'    => 'btn btn-success',
                                    'allowedFileExtensions' => ["png", "jpg", "jpeg"],
                                    'initialPreview' => [
                                    Url::home(true) . 'img/fecha.png'
                                    ],
                                    'initialPreviewAsData' => true,
                                ]
                            ]
                        );
                    ?>
        </div>

        
    </div>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>

</div>
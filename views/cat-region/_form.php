<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatRegion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-region-form container-crud">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'reg_region')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'img')->widget(FileInput::className(), [
                'options'       => ['accept' => 'image/*'], 
                'pluginOptions' => [
                    'allowedExtensions'    => ['jpg', 'png'],
                    'initialPreview'       => [$model->url],
                    'initialPreviewAsData' => true,
                ],
            ]); ?>          
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>

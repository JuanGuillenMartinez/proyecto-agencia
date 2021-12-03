<?php

use yii\helpers\Html;
use app\models\Traslado;
use kartik\form\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Traslado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="traslado-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'tra_nombre')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'tra_precio')->textInput(['maxlength' => true]) ?>
    </div>

    <?php /* $form->field($model, 'tra_fkubicacion')->textInput() */ ?>
    

    <div class="col-md-4">
            <?=
                $form->field($model, 'tra_fkubicacion')->widget(Select2::classname(), [
                    'data' => Traslado::mapUbicacion(),
                    'language' => 'es',
                    'options' => ['placeholder' => 'Selecciona una ubicacion ...'],
                    'pluginOptions' => [
                        'allowClear' => true    
                    ],
                ]);
            ?>
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

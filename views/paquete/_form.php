<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Paquete;
use kartik\file\FileInput;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Paquete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paquete-form container-crud">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-md-12">
            <?= $form->field($model, 'paq_nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'paq_descripcion')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'paq_descuento')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'paq_subtotal')->textInput(['maxlength' => true, 'readonly' => true, 'value' => 0]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'paq_fkvuelo')->widget(Select2::classname(), [
                'data' => Paquete::getVuelosMap(),
                'options' => ['placeholder' => 'Selecciona un vuelo ...', 'id' => 'vueloId'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'paq_fkalojamiento')->widget(DepDrop::classname(), [
                'options' => ['id' => 'alojamientoId'],
                'pluginOptions' => [
                    'depends' => ['vueloId'],
                    'placeholder' => 'Selecciona un alojamiento ...',
                    'url' => Url::to(['/paquete/alojamiento'])
                ]
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'paq_fktraslado')->widget(DepDrop::classname(), [
                'pluginOptions' => [
                    'depends' => ['vueloId', 'alojamientoId'],
                    'placeholder' => 'Selecciona un traslado ...',
                    'url' => Url::to(['/paquete/traslado'])
                ]
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'paq_fkseguro')->widget(Select2::classname(), [
                'data' => Paquete::getSegurosMap(),
                'options' => ['placeholder' => 'Selecciona un seguro ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
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
<script>

</script>
<?php

?>
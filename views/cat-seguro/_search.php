<?php

use yii\helpers\Html;
use app\models\Paquete;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatSeguroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paquete-search container-crud">

    <?php $form = ActiveForm::begin([
        'action' => ['seguros'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'seg_nombre') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'seg_fkregion')->widget(Select2::classname(), [
                'data' => Paquete::getRegionMap(),
                'options' => ['placeholder' => 'Selecciona la región ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'seg_fkaseguradora')->widget(Select2::classname(), [
                'data' => Paquete::getAseguradoraMap(),
                'options' => ['placeholder' => 'Selecciona la aseguradora ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="form-group col-md-12">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
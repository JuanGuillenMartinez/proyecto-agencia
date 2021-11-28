<?php

use app\models\Paquete;
use app\models\Reservacion;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reservacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservacion-form container-crud">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'res_estatus')->dropDownList(['Pagado' => 'Pagado', 'En cobro' => 'En cobro', 'Cancelado' => 'Cancelado', 'En carrito' => 'En carrito'], ['prompt' => '']) ?>
        </div>

        <div class="col-md-12">
            <?= $form->field($model, 'res_fkpersona')->widget(Select2::classname(), [
                'data' => Reservacion::getClientesNombresMap(),
                'options' => ['placeholder' => 'Selecciona el cliente ...'],
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
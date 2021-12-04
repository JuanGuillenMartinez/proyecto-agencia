<?php

use yii\helpers\Html;
use app\models\Paquete;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaqueteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paquete-search container-crud">

    <?php $form = ActiveForm::begin([
        'action' => ['paquetes'],
        'method' => 'get',
    ]); ?>

    <?php //$form->field($model, 'paq_id') 
    ?>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'paq_nombre') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'destinoVuelo') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'origenVuelo') ?>
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

        <?php //$form->field($model, 'paq_subtotal') 
        ?>

        <?php //$form->field($model, 'paq_url') 
        ?>

        <?php //$form->field($model, 'paq_fkvuelo') 
        ?>

        <?php // echo $form->field($model, 'paq_fkalojamiento') 
        ?>

        <?php // echo $form->field($model, 'paq_fkseguro') 
        ?>

        <?php // echo $form->field($model, 'paq_fktraslado') 
        ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-search"></i>', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fas fa-eraser"></i>', ['paquetes'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
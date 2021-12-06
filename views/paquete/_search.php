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

        <div class="col-md-4">
            <?= $form->field($model, 'paq_nombre')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'paisOrigen')->widget(Select2::classname(), [
                'data' => Paquete::getPaisesMap(),
                'options' => ['placeholder' => 'Selecciona el país de origen ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'paisDestino')->widget(Select2::classname(), [
                'data' => Paquete::getPaisesMap(),
                'options' => ['placeholder' => 'Selecciona el país de destino ...'],
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
        <div class="form-group col-md-12 btn-bar">
            <?= Html::submitButton('<i class="fas fa-search"></i>', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fas fa-eraser"></i>', ['paquetes'], ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
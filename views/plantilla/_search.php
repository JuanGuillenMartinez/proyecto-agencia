<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="plantilla-search">

    <?php $form = ActiveForm::begin([
        'action' => ['vuelos'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ciudadOrigen') ?>

    <?= $form->field($model, 'ciudadDestino') ?>
    
    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['vuelos'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

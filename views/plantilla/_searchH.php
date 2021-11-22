<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="plantilla-searchH">

    <?php $form = ActiveForm::begin([
        'action' => ['hoteles'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'aloDestino') ?>
    
    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['hoteles'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatSeguroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-seguro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'seg_id') ?>

    <?= $form->field($model, 'seg_nombre') ?>

    <?= $form->field($model, 'seg_precio') ?>

    <?= $form->field($model, 'seg_fkregion') ?>

    <?= $form->field($model, 'seg_fkaseguradora') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

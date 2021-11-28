<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatSeguro */

$this->title = 'Actualizar seguro: ' . $model->seg_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Seguros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->seg_nombre, 'url' => ['view', 'seg_id' => $model->seg_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cat-seguro-update container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatAeropuerto */

$this->title = 'Editar Aeropuerto: ' . $model->aero_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Aeropuertos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aero_id, 'url' => ['view', 'aero_id' => $model->aero_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-aeropuerto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

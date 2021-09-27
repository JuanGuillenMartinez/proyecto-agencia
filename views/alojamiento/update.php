<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Alojamiento */

$this->title = 'Editar Alojamiento: ' . $model->alo_id;
$this->params['breadcrumbs'][] = ['label' => 'Alojamientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->alo_id, 'url' => ['view', 'alo_id' => $model->alo_id]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="alojamiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

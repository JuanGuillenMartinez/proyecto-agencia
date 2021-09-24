<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Traslado */

$this->title = 'Update Traslado: ' . $model->tra_id;
$this->params['breadcrumbs'][] = ['label' => 'Traslados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tra_id, 'url' => ['view', 'tra_id' => $model->tra_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="traslado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

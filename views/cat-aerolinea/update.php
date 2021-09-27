<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatAerolinea */

$this->title = 'Actualizar Aerolinea: ' . $model->aer_id;
$this->params['breadcrumbs'][] = ['label' => 'Aerolineas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aer_id, 'url' => ['view', 'id' => $model->aer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-aerolinea-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

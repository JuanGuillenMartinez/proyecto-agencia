<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatPuesto */

$this->title = 'Editar Puesto: ' . $model->pue_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Puestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pue_id, 'url' => ['view', 'pue_id' => $model->pue_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-puesto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

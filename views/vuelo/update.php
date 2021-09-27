<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vuelo */

$this->title = 'Editar Vuelo: ' . $model->vue_id;
$this->params['breadcrumbs'][] = ['label' => 'Vuelos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vue_id, 'url' => ['view', 'vue_id' => $model->vue_id]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="vuelo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

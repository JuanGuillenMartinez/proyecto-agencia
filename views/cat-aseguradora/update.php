<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatAseguradora */

$this->title = 'Update Cat Aseguradora: ' . $model->ase_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Aseguradoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ase_id, 'url' => ['view', 'id' => $model->ase_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-aseguradora-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

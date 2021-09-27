<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatSucursal */

$this->title = 'Update Cat Sucursal: ' . $model->suc_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Sucursals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->suc_id, 'url' => ['view', 'suc_id' => $model->suc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-sucursal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

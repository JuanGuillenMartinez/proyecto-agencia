<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatRegion */

$this->title = 'Actualizar información de región: ' . $model->reg_id;
$this->params['breadcrumbs'][] = ['label' => 'Regiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reg_region, 'url' => ['view', 'reg_id' => $model->reg_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cat-region-update container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

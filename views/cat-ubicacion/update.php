<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatUbicacion */

$this->title = 'Editar Ubicacion: ' . $model->ubi_id;
$this->params['breadcrumbs'][] = ['label' => 'Ubicaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ubi_id, 'url' => ['view', 'id' => $model->ubi_id]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="cat-ubicacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatUbicacion */

$this->title = 'Update Cat Ubicacion: ' . $model->ubi_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Ubicacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ubi_id, 'url' => ['view', 'ubi_id' => $model->ubi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-ubicacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

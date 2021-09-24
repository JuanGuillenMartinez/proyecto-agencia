<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Alojamiento */

$this->title = $model->alo_id;
$this->params['breadcrumbs'][] = ['label' => 'Alojamientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alojamiento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'alo_id' => $model->alo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'alo_id' => $model->alo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'alo_id',
            'alo_habitacion',
            'alo_direccion',
            'alo_precio',
            'alo_url:url',
            'alo_fkubucacion',
        ],
    ]) ?>

</div>

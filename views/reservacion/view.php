<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reservacion */

$this->title = $model->res_id;
$this->params['breadcrumbs'][] = ['label' => 'Reservacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reservacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'res_id' => $model->res_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'res_id' => $model->res_id], [
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
            'res_id',
            'res_creacion',
            'res_estatus',
            'res_subtotal',
            'res_fkpersona',
        ],
    ]) ?>

</div>

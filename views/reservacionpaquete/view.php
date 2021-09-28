<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reservacionpaquete */

$this->title = $model->recpaq_id;
$this->params['breadcrumbs'][] = ['label' => 'Reservacionpaquetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reservacionpaquete-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'recpaq_id' => $model->recpaq_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'recpaq_id' => $model->recpaq_id], [
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
            'recpaq_id',
            'recpaq_fkreservacion',
            'recpaq_fkpaquete',
        ],
    ]) ?>

</div>

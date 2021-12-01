<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pago */

$this->title = $model->pag_id;
$this->params['breadcrumbs'][] = ['label' => 'Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pago-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->pag_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->pag_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro que deseas eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pag_id',
            'persona',
            [
                'attribute'=>'historial',
                'format'=>'raw',
            ],
            'pag_direccion',
            'pag_tipo',
            'pag_entidad',
            'pag_tarjeta',
            'pag_expiracion',
            'pag_estatus',
            'pag_fkreservacion',
            'reservacion',
        ],
    ]) ?>

</div>

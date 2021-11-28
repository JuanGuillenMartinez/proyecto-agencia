<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Paquete */
// Aqui va la vista de informacion de cada registro
$this->title = $model->paq_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Paquetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="paquete-view container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->paq_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->paq_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea eliminar el paquete?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'paq_id',
            'paq_nombre',
            'paq_descripcion',
            'paq_descuento',
            'paq_subtotal',
            [
                'attribute' => 'imagen',
                'format' => 'raw',
            ],
            'destinoVuelo',
            'origenVuelo',
            'numeroHabitacion',
            'nombreSeguro',
            'precioTraslado',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vuelo */

$this->title = $model->vue_id;
$this->params['breadcrumbs'][] = ['label' => 'Vuelos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vuelo-view container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->vue_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->vue_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de que quiere eliminar este artículo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'vue_id',
            'vue_tipo',
            'vue_salida',
            'vue_llegada',
            'vue_fecha',
            'vue_capacidad',
            'vue_precio',
            'vue_estatus',
            //'vue_fkaerolinea',
            'aerolineaNombre',
            //'vue_fkaeroorigen',
            'vueOrigen',
            //'vue_fkaerodestino',
            'vueDestino',
        ],
    ]) ?>

</div>

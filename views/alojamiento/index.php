<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlojamientoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alojamientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alojamiento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Añadir Alojamiento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'alo_id',
            'alo_nombre',
            'alo_habitacion',
            'alo_direccion',
            'alo_precio',
            'alo_url:url',
            'alo_fkubucacion',
            'capitalNombre',
            'nombrePais',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

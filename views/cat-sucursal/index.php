<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatSucursalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sucursales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-sucursal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nueva Sucursal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'suc_id',
            'suc_nombre',
            'suc_direccion',
            'suc_correo',
            'suc_telefono',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

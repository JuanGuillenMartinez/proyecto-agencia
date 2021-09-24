<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatSeguroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seguros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-seguro-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar seguro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'seg_id',
            'seg_nombre',
            'seg_precio',
            'nombreRegion',
            'nombreAseguradora',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

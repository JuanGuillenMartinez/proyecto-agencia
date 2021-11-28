<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatRegionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regiones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-region-index container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Añadir región', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'reg_region',
            [
                'attribute' => 'imagen',
                'format' => 'raw',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

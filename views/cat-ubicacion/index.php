<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatUbicacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cat Ubicacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-ubicacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cat Ubicacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ubi_id',
            'ubi_capital',
            'ubi_fkpais',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrasladoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Traslados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traslado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Traslado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tra_id',
            'tra_precio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

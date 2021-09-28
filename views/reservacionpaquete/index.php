<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReservacionpaqueteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservacionpaquetes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservacionpaquete-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Reservacionpaquete', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'recpaq_id',
            'recpaq_fkreservacion',
            'recpaq_fkpaquete',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

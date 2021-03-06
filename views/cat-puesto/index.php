<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatPuestoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Puestos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-puesto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear puesto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pue_id',
            'pue_puesto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatPaisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'País';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-pais-index container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Añadir País', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pai_id',
            'pai_pais',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

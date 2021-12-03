<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatAseguradoraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aseguradoras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-aseguradora-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Aseguradora', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /* 'ase_id', */
            'ase_nombre',
            'ase_telefono',
            'ase_correo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

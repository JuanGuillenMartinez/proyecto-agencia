<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PagoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cartera de Pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pago-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pag_id',
            'pag_direccion',
            'pag_tipo',
            'pag_entidad',
            'pag_tarjeta',
            'pag_expiracion',
            'pag_estatus',
            'pag_fkreservacion',
            'reservacionFolio',/* llamando folio */

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
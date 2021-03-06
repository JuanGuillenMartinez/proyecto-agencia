<?php


use app\models\Pago;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PagoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Metodo de Pago';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pago-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear pago', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Ver Historial', ['historial'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /* 'pag_id', */
            'pag_direccion',
            'pag_tipo',
            'pag_entidad',
            'pag_tarjeta',
            'pag_expiracion',
            'pag_estatus',
           /*  'pag_fkreservacion', */
            'reservacionFolio',/* llamando folio */
            'estatusReservacion', /* Campo extra */

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    


</div>

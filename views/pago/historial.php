<?php

use app\models\Pago;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PagoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historial de Pago';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pago-index">

    <h1><?= Html::encode('Historial de pagos') ?></h1>
    
    <?=ListView::widget([
        'dataProvider' => $dataProvider,    
        'options' => [
            'tag' => 'span',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'layout' => "{pager}\n<div class='row'>{items}</div>\n{summary}",
        'itemView' => 'historialCard',
    ]); ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
    <?php foreach (Pago::getHistorialPago1() as $key => $value) { ?>
        <div class="col-md-3" style="background-image: url(https://images.prismic.io/qonto/7db98057-7f0b-4f10-85ed-ca46faecf8e6_66be3bf9-f0a3-409c-9211-971dc706d151_Tarjetas%2BX.png?auto=compress,format); 
                background-position:center;
                background-repeat:no-repeat; 
                background-size:cover;
                
                height: 200px; margin: 10px;">
            <p style="color:white">Folio: <?=$value->reservacionFolio?></p> 
            <br><br><br><br>
            <h2 style="color:#e9a338;">
                <?=$value->pag_tarjeta?>
            </h2>
        </div>
    <?php } ?>
</div>
   


</div>

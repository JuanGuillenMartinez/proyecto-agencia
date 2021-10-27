<?php

use app\models\Paquete;
use yii\helpers\Html;

$paquetes = Paquete::find()->orderBy(['paq_descuento' => SORT_DESC])->limit(3)->all();

foreach ($paquetes as $paquete) {
    $urlImagen = '@web/img/paquete/' . $paquete->paq_url;
    echo '<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">';
    echo "<div>";
    echo Html::img($urlImagen, ['class' => 'img-responsive', 'width' => '125%']);
    echo "
    <div class='desc'>
            <span></span>
            <div class'ofertas-description'>
            <h3>{$paquete->paq_nombre}</h3>
            <span>{$paquete->paqFkvuelo->getVueloInfo()}</span>
            <span style='text-decoration-line: line-through;' class='price'>$ {$paquete->paq_subtotal}</span>
            <span class='descuento'>Hasta {$paquete->paq_descuento}%</span>
            <a class='btn btn-primary btn-outline' href='#'>Comprar ahora</a>
            </div>
    </div>
    ";
    echo "</div>";
    echo '</div>';
}
?>
<div class="col-md-12 text-center animate-box">
    <p><a class="btn btn-primary btn-outline btn-lg" href="/paquete">Ver todas las ofertas <i class="icon-arrow-right22"></i></a></p>
</div>
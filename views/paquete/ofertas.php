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
            <h3>{$paquete->paq_nombre}</h3>
            <span>{$paquete->paqFkvuelo->getVueloInfo()}</span>
            <span class='price'>$ {$paquete->paq_subtotal}</span>
            <span class='descuento'>Hasta {$paquete->paq_descuento}%</span>
            <a class='btn btn-primary btn-outline' href='#'>Comprar ahora</a>
    </div>
    ";
    echo "</div>";
    echo '</div>';
}
?>

<!-- <div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
    <div>
        <img src="/plantilla/images/place-1.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
        <div class="desc">
            <span></span>
            <h3>New York</h3>
            <span>3 nights + Flight 5*Hotel</span>
            <span class="price">$1,000</span>
            <a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
        </div>
    </div>
</div>
<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
    <div>
        <img src="/plantilla/images/place-2.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
        <div class="desc">
            <span></span>
            <h3>Philippines</h3>
            <span>4 nights + Flight 5*Hotel</span>
            <span class="price">$1,000</span>
            <a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
        </div>
    </div>
</div>
<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
    <div>
        <img src="/plantilla/images/place-3.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
        <div class="desc">
            <span></span>
            <h3>Hongkong</h3>
            <span>2 nights + Flight 4*Hotel</span>
            <span class="price">$1,000</span>
            <a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
        </div>
    </div>
</div> -->
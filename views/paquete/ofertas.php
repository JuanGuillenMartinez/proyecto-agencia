<?php

use app\models\Paquete;
use yii\helpers\Html;
?>
<div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8 text-center heading-section animate-box">
                <h3>Mejores ofertas</h3>
                <p>Encuentra las mejores ofertas con paquetes que incluyen los boletos de viaje, traslado del aeropuerto a tu hotel y seguro de viaje.</p>
            </div>
        </div>
        <div class="row">
            <?php
            $paquetes = Paquete::find()->orderBy(['paq_descuento' => SORT_DESC])->limit(3)->all();

            foreach ($paquetes as $paquete) {
                $urlImagen = '@web/img/paquete/' . $paquete->paq_url;
                echo '<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
                        <div>';
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
                                </div>";
                echo "  </div>
                    </div>";
            }
            ?>
        </div>
    </div>
    <div class="col-md-12 text-center animate-box">
        <p><a class="btn btn-primary btn-outline btn-lg" href="/paquete">Ver todas las ofertas</a></p>
    </div>
<?php

use yii\helpers\Html;
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8 text-center heading-section animate-box">
            <?= Html::tag('h3', 'Paquetes recientes', []); ?>
            <?= Html::tag('p', 'Ultimos paquetes añadidos a nuestro catalogo de ofertas con un gran precio. Disponible para todos.', []); ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row row-bottom-padded-md">
        <?php
            
        ?>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="fh5co-blog animate-box">
                <a href="#"><img class="img-responsive" src="/plantilla/images/place-1.jpg" alt=""></a>
                <div class="blog-text">
                    <div class="prod-title">
                        <h3><a href="#">30% Discount to Travel All Around the World</a></h3>
                        <p><a href="#">Learn More...</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="fh5co-blog animate-box">
                <a href="#"><img class="img-responsive" src="/plantilla/images/place-2.jpg" alt=""></a>
                <div class="blog-text">
                    <div class="prod-title">
                        <h3><a href="#">Planning for Vacation</a></h3>
                        <p><a href="#">Learn More...</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="fh5co-blog animate-box">
                <a href="#"><img class="img-responsive" src="/plantilla/images/place-3.jpg" alt=""></a>
                <div class="blog-text">
                    <div class="prod-title">
                        <h3><a href="#">Visit Tokyo Japan</a></h3>
                        <p><a href="#">Learn More...</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix visible-md-block"></div>
    </div>

    <div class="col-md-12 text-center animate-box">
        <p><a class="btn btn-primary btn-outline btn-lg" href="#">See All Post <i class="icon-arrow-right22"></i></a></p>
    </div>

</div>
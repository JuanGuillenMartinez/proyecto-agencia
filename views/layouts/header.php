<?php

use yii\bootstrap4\Html;
?>
<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
<!-- <div id="fh5co-logo"><img src="/web/img/logo.png" alt=""><a href="index.html"><i class="icon-airplane"></i>Travel</a></div> -->
<!-- START #fh5co-menu-wrap -->
<div class="row">
    <div class="col-md-6">
        <div id="fh5co-logo"><?= Html::img("/img/logo.png") ?> <a href="index.html">Travel</a> </div>
    </div>
    <div class="col-md-6">
        <nav id="fh5co-menu-wrap" role="navigation">
            <ul class="sf-menu" id="fh5co-primary-menu">
                <li class="active"><a href="index.html">Inicio</a></li>
                <li>
                    <a href="vacation.html" class="fh5co-sub-ddown">Paquetes</a>
                    <ul class="fh5co-sub-menu">
                        <li><a href="#">Family</a></li>
                        <li><a href="#">CSS3 &amp; HTML5</a></li>
                        <li><a href="#">Angular JS</a></li>
                        <li><a href="#">Node JS</a></li>
                        <li><a href="#">Django &amp; Python</a></li>
                    </ul>
                </li>
                <li><a href="flight.html">Vuelos</a></li>
                <li><a href="hotel.html">Hoteles</a></li>
                <li><a href="car.html">Traslados</a></li>
                <li><a href="blog.html">Seguros</a></li>
                <!-- <li><a href="contact.html">Iniciar sesion</a></li> -->
            </ul>
        </nav>
    </div>
</div>
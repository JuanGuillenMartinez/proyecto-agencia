<?php

use yii\bootstrap4\Nav;
use yii\bootstrap4\Html;
use yii\bootstrap4\NavBar;
use webvimark\modules\UserManagement\UserManagementModule;
?>
<?php
    NavBar::begin([
        'brandLabel' => Html::img("/img/globe.png",['style' => 'width:50px; height:50px']).' '.Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'collapseOptions' => ['class' => 'justify-content-end'],
        'options' => [
            'class' => 'navbar navbar-expand-md fixed-top',
            'id' => "fh5co-menu-wrap",
            'style' => 'width:90%;'
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav sf-menu', 'id' => "fh5co-primary-menu"],
        'encodeLabels' => false,
        'items' => [
            ['label' => 'Inicio', 'url' => ['/plantilla/index']],
            ['label' => 'Paquetes', 'url' => ['/plantilla/paquetes']],
            ['label' => 'Vuelos', 'url' => ['/plantilla/vuelos']],
            ['label' => 'Hoteles', 'url' => ['/plantilla/hoteles']],
            ['label' => 'Traslados', 'url' => ['/site/contact']],
            ['label' => 'Seguros', 'url' => ['/cat-seguro']],
            [
                'label' => 'Administrador', 
                'items'=>UserManagementModule::menuItems(), 
                'visible' => Yii::$app->user->isSuperAdmin
            ],
            ['label' => '<span id="btnLogin">Entrar</span>', 'url' => ['index#'], 'visible' => Yii::$app->user->isGuest],
			['label'=>'Salir', 'url'=>['/user-management/auth/logout'], 'visible' => !Yii::$app->user->isGuest],
            ['label'=>'<i class="fas fa-shopping-cart"></i>', 'url'=>['/plantilla/carrito'], 'visible' => !Yii::$app->user->isGuest],
            ['label'=>'<i class="fas fa-user"></i>', 'url'=>['/plantilla/perfil'], 'visible' => !Yii::$app->user->isGuest],
            
        ],
    ]);
    NavBar::end();
?>

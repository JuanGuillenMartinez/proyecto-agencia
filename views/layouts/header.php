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
            ['label' => 'Inicio', 'url' => ['/site/plantilla']],
            ['label' => 'Paquetes', 'url' => ['/site/contact']],
            ['label' => 'Vuelos', 'url' => ['/site/index']],
            ['label' => 'Hoteles', 'url' => ['/site/about']],
            ['label' => 'Traslados', 'url' => ['/site/contact']],
            ['label' => 'Seguros', 'url' => ['/site/contact']],
            [
                'label' => 'Administrador', 
                'items'=>UserManagementModule::menuItems(), 
                'visible' => Yii::$app->user->isSuperAdmin
            ],
            ['label'=>'Login', 'url'=>['/user-management/auth/login'], 'visible' => Yii::$app->user->isGuest],
			['label'=>'Logout', 'url'=>['/user-management/auth/logout'], 'visible' => !Yii::$app->user->isGuest],
        ],
    ]);
    NavBar::end();
?>

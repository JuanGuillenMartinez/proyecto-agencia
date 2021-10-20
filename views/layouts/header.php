<?php
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => 'Inicio', 'url' => ['/site/index']],
        ['label' => 'Acerca de', 'url' => ['/site/about']],
        ['label' => 'Contacto', 'url' => ['/site/contact']],
        Yii::$app->user->isGuest ? (['label' => 'Login', 'url' => ['/user-management/auth/login']]) : (['label' => 'Logout', 'url' => ['/user-management/auth/logout']])
    ],
]);
NavBar::end();
?>
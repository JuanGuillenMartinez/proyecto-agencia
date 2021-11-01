<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'plantilla/css/animate.css',
        'plantilla/css/icomoon.css',
        'plantilla/css/superfish.css',
        'plantilla/css/magnific-popup.css',
        'plantilla/css/bootstrap-datepicker.min.css',
        'plantilla/css/cs-select.css',
        'plantilla/css/cs-skin-border.css',
        'plantilla/css/style.css',
        'plantilla/css/style-card-paquetes.css'        
    ];
    public $js = [
        'plantilla/js/jquery.easing.1.3.js',
        'plantilla/js/jquery.waypoints.min.js',
        'plantilla/js/sticky.js',
        'plantilla/js/jquery.stellar.min.js',
        'plantilla/js/hoverIntent.js',
        'plantilla/js/superfish.js',
        'plantilla/js/jquery.magnific-popup.min.js',
        'plantilla/js/magnific-popup-options.js',
        'plantilla/js/bootstrap-datepicker.min.js',
        'plantilla/js/classie.js',
        'plantilla/js/selectFx.js',
        'plantilla/js/main.js',
        '/js/paquete.js',
        '/js/bs-init.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}

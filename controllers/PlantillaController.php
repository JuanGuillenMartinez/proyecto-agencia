<?php

namespace app\controllers;

use yii\helpers\Html;
use app\models\Paquete;

class PlantillaController extends \yii\web\Controller
{
    public function actionIndex()
    {        
        return $this->render('index');
    }
    
    public function actionPaquetes() {
        return $this->render("paquetes");
    }
}

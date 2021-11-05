<?php

namespace app\controllers;

use yii\helpers\Html;
use app\models\Paquete;
use app\models\Vuelo;
use app\models\Alojamiento;

class PlantillaController extends \yii\web\Controller
{
    public function actionIndex()
    {        
        return $this->render('index');
    }
    
    public function actionPaquetes() {
        return $this->render("paquetes");
    }

    public function actionVuelos() {
        return $this->render("vuelos");
    }

    public function actionHoteles() {
        return $this->render("hoteles");
    }
}

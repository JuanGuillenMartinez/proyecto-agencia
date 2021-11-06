<?php

namespace app\controllers;

use app\models\Paquete;
use app\models\Vuelo;
use app\models\Alojamiento;

class PlantillaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $paquetesRecientes = Paquete::find()->orderBy(['paq_id' => SORT_DESC])->limit(4)->all();
        $paquetesOfertas = Paquete::find()->orderBy(['paq_descuento' => SORT_DESC])->limit(3)->all();
        $paquete = Paquete::find()->orderBy(['paq_id' => SORT_DESC, 'paq_descuento' => SORT_DESC])->one();
        return $this->render('index', compact("paquete", "paquetesOfertas", "paquetesRecientes"));
    }

    public function actionModal() {
        return $this->render("/paquete/modal");
    }

    public function actionPaquetes()
    {
        $paquete = Paquete::find()->orderBy(['paq_id' => SORT_DESC, 'paq_descuento' => SORT_DESC])->one();
        return $this->render("paquetes", compact("paquete"));
    }

    public function actionVuelos() {
        $paquete = Paquete::find()->orderBy(['paq_id' => SORT_DESC, 'paq_descuento' => SORT_DESC])->one();
        return $this->render("vuelos", compact("paquete"));
    }

    public function actionHoteles() {
        return $this->render("hoteles");
    }
}

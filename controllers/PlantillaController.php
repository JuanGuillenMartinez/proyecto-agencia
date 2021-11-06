<?php

namespace app\controllers;

use app\models\Paquete;

class PlantillaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $paquete = Paquete::find()->orderBy(['paq_id' => SORT_DESC, 'paq_descuento' => SORT_DESC])->one();
        return $this->render('index', compact("paquete"));
    }

    public function actionPaquetes()
    {
        return $this->render("paquetes");
    }
    public function actionModal() {
        return $this->render("/paquete/modal");
    }
}

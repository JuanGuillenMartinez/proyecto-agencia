<?php

namespace app\controllers;

class PlantillaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}

<?php

namespace app\controllers;

use app\models\Vuelo;
use app\models\Paquete;
use app\models\Persona;
use app\models\Alojamiento;
use app\models\Reservacion;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\models\forms\LoginForm;

class PlantillaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $paquetesRecientes = Paquete::find()->orderBy(['paq_id' => SORT_DESC])->limit(4)->all();
        $paquetesOfertas = Paquete::find()->orderBy(['paq_descuento' => SORT_DESC])->limit(3)->all();
        $paquete = Paquete::find()->orderBy(['paq_id' => SORT_DESC, 'paq_descuento' => SORT_DESC])->one();
        $user = new User();
        $persona = new Persona();
        $login = new LoginForm();
        return $this->render('index', compact("paquete", "paquetesOfertas", "paquetesRecientes", "user", "persona", "login"));

        $paquete = Paquete::find()->orderBy(['paq_descuento' => SORT_DESC])->one();
        return $this->render('index', compact("paquete", "paquetesOfertas", "paquetesRecientes"));
    }

    public function actionModal()
    {
        return $this->render("/paquete/modal");
    }

    public function actionPaquetes()
    {
        $paquete = Paquete::find()->orderBy(['paq_id' => SORT_DESC, 'paq_descuento' => SORT_DESC])->one();
        return $this->render("paquetes", compact("paquete"));
    }

    public function actionVuelos()
    {
        $paquete = Paquete::find()->orderBy(['paq_id' => SORT_DESC, 'paq_descuento' => SORT_DESC])->one();
        $vuelos = Vuelo::find()->all();
        return $this->render("vuelos", compact("paquete", "vuelos"));
    }

    public function actionHoteles()
    {
        $paquete = Paquete::find()->orderBy(['paq_id' => SORT_DESC, 'paq_descuento' => SORT_DESC])->one();
        $hoteles = Alojamiento::find()->all();
        return $this->render("hoteles", compact("paquete", "hoteles"));
    }
    public function actionCarrito() {
        $persona = Persona::find()->where(['per_fkuser' => User::getCurrentUser()->id])->one() ;
        // $reservacion = $persona->reservacions[0];
        $reservacion = Reservacion::find()->where(['res_estatus' => 'En carrito', 'res_fkpersona' => $persona->per_id])->one();
        return $this->render('/reservacion/carrito', compact('reservacion'));
    }

    public function actionLogin() {
        return $this->render("login");
    }
}

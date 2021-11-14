<?php

namespace app\controllers;

use app\models\Vuelo;
use app\models\Paquete;
use app\models\Persona;
use app\models\Alojamiento;
use app\models\Reservacion;
use app\models\Reservacionpaquete;
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
<<<<<<< HEAD
        $login = new LoginForm();
        return $this->render('index', compact("paquete", "paquetesOfertas", "paquetesRecientes", "user", "persona", "login"));

        $paquete = Paquete::find()->orderBy(['paq_descuento' => SORT_DESC])->one();
        return $this->render('index', compact("paquete", "paquetesOfertas", "paquetesRecientes"));
=======
        return $this->render('index', compact("paquete", "paquetesOfertas", "paquetesRecientes", "user", "persona"));
>>>>>>> 779985d2c5e5b6db5c8bde4cd529fa4ecc693ef3
    }

    public function actionModal()
    {
        return $this->render("/paquete/modal");
    }

    public function actionPaquetes()
    {
        $paquetes = Paquete::find()->all();
        $paquete = Paquete::find()->orderBy(['paq_id' => SORT_DESC, 'paq_descuento' => SORT_DESC])->one();
        return $this->render("paquetes", compact("paquete", "paquetes"));
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
    public function actionCarrito()
    {
        $paquetesReservacion = null;
        $persona = Persona::find()->where(['per_fkuser' => User::getCurrentUser()->id])->one();
        $reservacion = Reservacion::find()->where(['res_estatus' => 'En carrito', 'res_fkpersona' => $persona->per_id])->one();
        if (isset($reservacion)) {
            $paquetesReservacion = Reservacionpaquete::find()->where(['recpaq_fkreservacion' => $reservacion->res_id, 'recpaq_estatus' => 'Seleccionado'])->all();
        }
        return $this->render('/reservacion/carrito', compact('paquetesReservacion'));
    }

    public function actionLogin()
    {
        return $this->render("login");
    }
}

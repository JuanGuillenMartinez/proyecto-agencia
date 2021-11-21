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
        $login = new LoginForm();
        return $this->render('index', compact("paquete", "paquetesOfertas", "paquetesRecientes", "user", "persona", "login"));
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
        $vuelos = Vuelo::find();
        $params = $this->request->queryParams;
        if (isset($params['Vuelo']['ciudadOrigen']) && trim($params['Vuelo']['ciudadOrigen']) != '') {
            $vuelos = $vuelos->leftJoin('cat_aeropuerto aeroori', 'aeroori.aero_id = vue_fkaeroorigen')-> leftJoin ('cat_ubicacion ori', 'ori.ubi_id = aeroori.aero_fkubicacion');
           // $vuelos = $vuelos->joinWith('vueFkciudadorigen');
            $vuelos = $vuelos->where(['like', 'ori.ubi_capital', trim($params['Vuelo']['ciudadOrigen'])]);
        }
        if (isset($params['Vuelo']['ciudadDestino']) && trim($params['Vuelo']['ciudadDestino']) != '') {
            $vuelos = $vuelos->leftJoin('cat_aeropuerto aerodes', 'aerodes.aero_id = vue_fkaerodestino')-> leftJoin ('cat_ubicacion des', 'des.ubi_id = aerodes.aero_fkubicacion');
           // $vuelos = $vuelos->joinWith('vueFkciudaddestino');
            $vuelos = $vuelos->andWhere(['like', 'des.ubi_capital', trim($params['Vuelo']['ciudadDestino'])]);
        }
        $vuelos = $vuelos->all();
        $model = new Vuelo();
        $model->ciudadOrigen = isset($params['Vuelo']['ciudadOrigen']) ? trim($params['Vuelo']['ciudadOrigen']) : '';
        $model->ciudadDestino = isset($params['Vuelo']['ciudadDestino']) ? trim($params['Vuelo']['ciudadDestino']) : '';
        return $this->render("vuelos", compact("paquete", "vuelos", "model"));
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
        return $this->render('/reservacion/carrito', compact('reservacion', 'paquetesReservacion'));
    }
    public function actionPaquete($id)
    {
        $paquete = Paquete::find()->where(['paq_id' => $id])->one();
        return $this->render("/paquete/mostrar", compact('paquete'));
    }

    public function actionLogin()
    {
        return $this->render("login");
    }
}

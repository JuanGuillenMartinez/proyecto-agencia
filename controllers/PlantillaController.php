<?php

namespace app\controllers;

use app\models\Vuelo;
use app\models\Paquete;
use app\models\Persona;
use app\models\Alojamiento;
use app\models\CatSeguro;
use app\models\Reservacion;
use app\models\Reservacionpaquete;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\models\forms\LoginForm;

class PlantillaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $paquetesRecientes = Paquete::getPaquetesRecientes();
        $paquetesOfertas = Paquete::getOfertas();
        $paquete = Paquete::getMejorOferta();
        $user = new User();
        $persona = new Persona();
        $login = new LoginForm();
        return $this->render('index', compact("paquete", "paquetesOfertas", "paquetesRecientes", "user", "persona", "login"));
    }

    public function actionModal()
    {
        return $this->render("/paquete/modal");
    }

    public function actionPaquetes()
    {
        $paquetes = Paquete::getPaquetes();
        $paquete = Paquete::getMejorOferta();
        return $this->render("paquetes", compact("paquete", "paquetes"));
    }

    public function actionVuelos()
    {
        $paquete = Paquete::getMejorOferta();
        $vuelos = Vuelo::find();
        $params = $this->request->queryParams;
        if (isset($params['Vuelo']['ciudadOrigen']) && trim($params['Vuelo']['ciudadOrigen']) != '') {
            $vuelos = $vuelos->leftJoin('cat_aeropuerto aeroori', 'aeroori.aero_id = vue_fkaeroorigen')->leftJoin('cat_ubicacion ori', 'ori.ubi_id = aeroori.aero_fkubicacion');
            // $vuelos = $vuelos->joinWith('vueFkciudadorigen');
            $vuelos = $vuelos->where(['like', 'ori.ubi_capital', trim($params['Vuelo']['ciudadOrigen'])]);
        }
        if (isset($params['Vuelo']['ciudadDestino']) && trim($params['Vuelo']['ciudadDestino']) != '') {
            $vuelos = $vuelos->leftJoin('cat_aeropuerto aerodes', 'aerodes.aero_id = vue_fkaerodestino')->leftJoin('cat_ubicacion des', 'des.ubi_id = aerodes.aero_fkubicacion');
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
        $paquete = Paquete::getMejorOferta();
        $hoteles = Alojamiento::find();
        $params = $this->request->queryParams;
        if (isset($params['Alojamiento']['aloDestino']) && trim($params['Alojamiento']['aloDestino']) != '') {
            $hoteles = $hoteles->leftJoin('cat_ubicacion ubides', 'ubides.ubi_id = alo_fkubucacion')->leftJoin('cat_pais des', 'des.pai_id = ubides.ubi_fkpais');
            $hoteles = $hoteles->Where(['like', 'des.pai_pais', trim($params['Alojamiento']['aloDestino'])]);
        }
        $hoteles = $hoteles->all();
        $model = new Alojamiento();
        $model->aloDestino = isset($params['Alojamiento']['aloDestino']) ? trim($params['Alojamiento']['aloDestino']) : '';
        return $this->render("hoteles", compact("paquete", "hoteles", "model"));
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
    public function actionPaquete($id) {
        $paquete = Paquete::find()->where(['paq_id' => $id])->one();
        return $this->render("/paquete/mostrar", compact('paquete'));
    }

    public function actionSeguros()
    {
        $paquetes = Paquete::getPaquetes();
        $paquete = Paquete::getMejorOferta();
        $seguros = CatSeguro::find()->all();
        return $this->render('seguros', compact('paquete', 'seguros', 'paquetes'));
    }
    
    public function actionLogin()
    {
        return $this->render("login");
    }

    public function actionPerfil()
    {
        $usuario = User::getCurrentUser();
        $persona = Persona::find()->where(['per_fkuser' => $usuario->id])->one();

        return $this->render("perfil", compact("usuario", "persona"));

    }

    public function actionEditar()
    {
        $usuario = User::getCurrentUser();
        $persona = Persona::find()->where(['per_fkuser' => $usuario->id])->one();

        return $this->render("editar", compact("usuario", "persona"));
    }
}
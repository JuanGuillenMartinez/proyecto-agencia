<?php

namespace app\controllers;

use app\models\Vuelo;
use app\models\Paquete;
use app\models\Persona;
use app\models\CatSeguro;
use app\models\Alojamiento;
use app\models\Reservacion;
use app\models\PaqueteSearch;
use app\models\CatSeguroSearch;
use app\models\AlojamientoSearch;
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
        $paquete = Paquete::getMejorOferta();
        $searchModel = new PaqueteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/paquete/paquetes', compact('paquete', 'searchModel', 'dataProvider'));
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

    /*public function actionHoteles()
    {
        $paquete = Paquete::getMejorOferta();
        $searchModel = new AlojamientoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/alojamiento/hoteles', compact('paquete', 'searchModel', 'dataProvider'));
    }*/

    public function actionCarrito()
    {
        $precioFinalReservacion = $numeroPaquetes = $ahorroTotal = 0;
        $paquetesReservacion = null;
        $user = User::getCurrentUser();
        $persona = isset($user) ? Persona::find()->where(['per_fkuser' => $user->id])->one() : null;
        if (isset($user) && isset($persona)) {
            $reservacion = Reservacion::find()->where(['res_estatus' => 'En carrito', 'res_fkpersona' => $persona->per_id])->one();
            $paquetesReservacion = isset($reservacion) ? Reservacionpaquete::find()->where(['recpaq_fkreservacion' => $reservacion->res_id, 'recpaq_estatus' => 'Seleccionado'])->all() : null;
            return $this->render('/reservacion/carrito', compact('reservacion', 'paquetesReservacion', 'precioFinalReservacion', 'numeroPaquetes', 'ahorroTotal'));
        }
        return $this->redirect('index');
    }
    public function actionPaquete($id)
    {
        $paquete = Paquete::find()->where(['paq_id' => $id])->one();
        return isset($paquete) ? $this->render("/paquete/mostrar", compact('paquete')) : $this->redirect('/plantilla/index');
    }

    public function actionSeguros()
    {
        $paquete = Paquete::getMejorOferta();
        $searchModel = new CatSeguroSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/cat-seguro/seguros', compact('paquete', 'searchModel', 'dataProvider'));
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

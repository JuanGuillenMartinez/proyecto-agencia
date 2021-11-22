<?php

namespace app\controllers;

use Yii;
use app\models\Persona;
use yii\web\Controller;
use app\models\Reservacion;
use yii\filters\VerbFilter;
use app\models\ReservacionSearch;
use app\models\Reservacionpaquete;
use yii\web\NotFoundHttpException;
use webvimark\modules\UserManagement\models\User;

/**
 * ReservacionController implements the CRUD actions for Reservacion model.
 */
class ReservacionController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Reservacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReservacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reservacion model.
     * @param int $res_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Reservacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reservacion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->res_creacion = date('Y-m-d h:i:s', time());
                $model->save();
                return $this->redirect(['view', 'id' => $model->res_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Reservacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $res_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->res_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Reservacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $res_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionAgregar()
    {
        $idPaquete = Yii::$app->request->post('idPaquete');
        $idPersona = (Persona::find()->where(['per_fkuser' => User::getCurrentUser()->id])->one())->per_id;
        if (isset($idPersona) && isset($idPaquete)) {
            $reservacion = Reservacion::find()->where(['res_estatus' => 'En carrito', 'res_fkpersona' => $idPersona])->one();
            if (isset($reservacion) && $reservacion != null) {
                $reservacionPaquete = $this->llenarPaqueteReservacion($reservacion, $idPaquete);
                return ($reservacionPaquete->save()) ? 'Producto agregado al carrito exitosamente' : 'Algo salio mal';
            } else if($reservacion == null) {
                $reservacion = new Reservacion();
                $reservacion->res_creacion = date("Y-m-d H:i:s");
                $reservacion->res_estatus = "En carrito";
                $reservacion->res_fkpersona = $idPersona;
                if ($reservacion->save()) {
                    $reservacion = Reservacion::find()->where(['res_estatus' => 'En carrito', 'res_fkpersona' => $idPersona])->one();
                    $reservacionPaquete = $this->llenarPaqueteReservacion($reservacion, $idPaquete);
                    return ($reservacionPaquete->save()) ? 'Producto agregado al carrito exitosamente' : 'Algo salio mal';
                }
            }
        }
    }

    public function actionEliminar()
    {
        $idPaqueteReservacion = Yii::$app->request->post('idPaqueteReservacion');
        $idPersona = (Persona::find()->where(['per_fkuser' => User::getCurrentUser()->id])->one())->per_id;
        if (isset($idPersona) && isset($idPaqueteReservacion)) {
            $reservacion = Reservacion::find()->where(['res_estatus' => 'En carrito', 'res_fkpersona' => $idPersona])->one();
            if (isset($reservacion) && $reservacion != null) {
                $paqueteReservacion = Reservacionpaquete::find()->where(['recpaq_fkreservacion' => $reservacion->res_id, 'recpaq_id' => $idPaqueteReservacion])->one();
                $paqueteReservacion->recpaq_estatus = "Descartado";
                return ($paqueteReservacion->save()) ? 'Producto eliminado del carrito exitosamente' : 'Algo salió mal';
            }
        }
    }

    protected function llenarPaqueteReservacion($reservacion, $idPaquete)
    {
        $reservacionPaquete = Reservacionpaquete::find()->where(["recpaq_fkreservacion" => $reservacion->res_id, "recpaq_fkpaquete" => $idPaquete])->one();
        if(!isset($reservacionPaquete)) {
            $reservacionPaquete = new Reservacionpaquete();
            $reservacionPaquete->recpaq_fkreservacion = $reservacion->res_id;
            $reservacionPaquete->recpaq_fkpaquete = $idPaquete;
            $reservacionPaquete->recpaq_cantidad = 1;
            $reservacionPaquete->recpaq_estatus = "Seleccionado";
        } else {
            $reservacionPaquete->recpaq_cantidad++;
        }
        
        return $reservacionPaquete;
    }

    public function actionPagado()
    {
        //estatus aceptados = 1: Pagado, 2: En cobro, 3: Cancelado, 4: En carrito
        $idReservacion = Yii::$app->request->post('idReservacion');
        $estatus = intval(Yii::$app->request->post('estatus'));
        $persona = Persona::find()->where(['per_fkuser' => User::getCurrentUser()->id])->one();
        if (isset($idReservacion) && $estatus != 4) {
            if ($estatus == 1) {
                $reservacion = Reservacion::find()->where(['res_estatus' => 'En carrito', 'res_fkpersona' => $persona->per_id])->one();
                $reservacion->res_estatus = 'Pagado';
                return ($reservacion->save()) ? 'Reservación pagada exitosamente' : 'Algo salió mal';
            } else if ($estatus == 2) {
            } else if ($estatus == 3) {
            }
        } else {
            return "No hay reservaciones para pagar";
        }
    }

    /**
     * Finds the Reservacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $res_id Id
     * @return Reservacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reservacion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

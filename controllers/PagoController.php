<?php

namespace app\controllers;

use Yii;
use app\models\Pago;
use app\models\Persona;
use yii\web\Controller;
use app\models\PagoSearch;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;


/**
 * PagoController implements the CRUD actions for Pago model.
 */
class PagoController extends Controller
{
    /**
     * @inheritDoc
     */
    /* public function behaviors()
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
    } */
    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Pago models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionHistorial(){
        /* $query= Persona::find()->where(['per_fkuser'=>Yii::$app->user->id, 'pag_estatus'=>'pagado'])->joinWith(['reservacions.pagos']);
         */$query= Pago::find()->where(['per_fkuser'=>Yii::$app->user->id, 'pag_estatus'=>'pagado'])->joinWith(['pagFkreservacion.resFkpersona']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            /* 'pagination' => [
                'pageSize' => 12,
            ], */
        ]);
        return $this->render('historial', ['dataProvider' => $dataProvider]);
        /* return $this->render('historial'); */


    }

    /**
     * Displays a single Pago model.
     * @param integer $id
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
     * Creates a new Pago model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pago();
        
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->pag_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        

        return $this->render('create', [
            'model' => $model,
            
        ]);
    }

    /**
     * Updates an existing Pago model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pag_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pago model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pago model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pago the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pago::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    

    
}

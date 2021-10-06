<?php

namespace app\controllers;

use app\models\CatPais;
use yii\web\Controller;
use app\models\Alojamiento;
use yii\filters\VerbFilter;
use app\models\CatUbicacion;
use yii\helpers\ArrayHelper;
use app\models\AlojamientoSearch;
use yii\web\NotFoundHttpException;


/**
 * AlojamientoController implements the CRUD actions for Alojamiento model.
 */
class AlojamientoController extends Controller
{
    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Alojamiento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlojamientoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alojamiento model.
     * @param int $alo_id Id
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
     * Creates a new Alojamiento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Alojamiento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->alo_id]);
            }
        } else {
            $model->loadDefaultValues();
        }
        $ubicaciones = ArrayHelper :: map(CatUbicacion::find()->all(), 'ubi_id', 'ubi_capital');

        return $this->render('create', [
            'model' => $model,
            'ubicaciones' => $ubicaciones,
    
        ]);
    }

    /**
     * Updates an existing Alojamiento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $alo_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->alo_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Alojamiento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $alo_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alojamiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $alo_id Id
     * @return Alojamiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Alojamiento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

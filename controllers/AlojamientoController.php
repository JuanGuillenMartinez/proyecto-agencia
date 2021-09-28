<?php

namespace app\controllers;

use app\models\Alojamiento;
use app\models\AlojamientoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlojamientoController implements the CRUD actions for Alojamiento model.
 */
class AlojamientoController extends Controller
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
    public function actionView($alo_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($alo_id),
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
                return $this->redirect(['view', 'alo_id' => $model->alo_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Alojamiento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $alo_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($alo_id)
    {
        $model = $this->findModel($alo_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'alo_id' => $model->alo_id]);
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
    public function actionDelete($alo_id)
    {
        $this->findModel($alo_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alojamiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $alo_id Id
     * @return Alojamiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($alo_id)
    {
        if (($model = Alojamiento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

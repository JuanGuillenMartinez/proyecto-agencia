<?php

namespace app\controllers;

use app\models\Reservacionpaquete;
use app\models\ReservacionpaqueteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReservacionpaqueteController implements the CRUD actions for Reservacionpaquete model.
 */
class ReservacionpaqueteController extends Controller
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
     * Lists all Reservacionpaquete models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReservacionpaqueteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reservacionpaquete model.
     * @param int $recpaq_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($recpaq_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($recpaq_id),
        ]);
    }

    /**
     * Creates a new Reservacionpaquete model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reservacionpaquete();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'recpaq_id' => $model->recpaq_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Reservacionpaquete model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $recpaq_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($recpaq_id)
    {
        $model = $this->findModel($recpaq_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'recpaq_id' => $model->recpaq_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Reservacionpaquete model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $recpaq_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($recpaq_id)
    {
        $this->findModel($recpaq_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reservacionpaquete model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $recpaq_id Id
     * @return Reservacionpaquete the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($recpaq_id)
    {
        if (($model = Reservacionpaquete::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

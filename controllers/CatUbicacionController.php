<?php

namespace app\controllers;

use app\models\CatUbicacion;
use app\models\CatUbicacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatUbicacionController implements the CRUD actions for CatUbicacion model.
 */
class CatUbicacionController extends Controller
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
     * Lists all CatUbicacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatUbicacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatUbicacion model.
     * @param int $ubi_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ubi_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ubi_id),
        ]);
    }

    /**
     * Creates a new CatUbicacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatUbicacion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ubi_id' => $model->ubi_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatUbicacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ubi_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ubi_id)
    {
        $model = $this->findModel($ubi_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ubi_id' => $model->ubi_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatUbicacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ubi_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ubi_id)
    {
        $this->findModel($ubi_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatUbicacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ubi_id Id
     * @return CatUbicacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ubi_id)
    {
        if (($model = CatUbicacion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

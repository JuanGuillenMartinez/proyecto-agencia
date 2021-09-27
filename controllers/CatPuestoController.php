<?php

namespace app\controllers;

use app\models\CatPuesto;
use app\models\CatPuestoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatPuestoController implements the CRUD actions for CatPuesto model.
 */
class CatPuestoController extends Controller
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
     * Lists all CatPuesto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatPuestoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatPuesto model.
     * @param int $pue_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pue_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pue_id),
        ]);
    }

    /**
     * Creates a new CatPuesto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatPuesto();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'pue_id' => $model->pue_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatPuesto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pue_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pue_id)
    {
        $model = $this->findModel($pue_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pue_id' => $model->pue_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatPuesto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pue_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pue_id)
    {
        $this->findModel($pue_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatPuesto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pue_id Id
     * @return CatPuesto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pue_id)
    {
        if (($model = CatPuesto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
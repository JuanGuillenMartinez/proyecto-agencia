<?php

namespace app\controllers;

use app\models\Vuelo;
use app\models\VueloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VueloController implements the CRUD actions for Vuelo model.
 */
class VueloController extends Controller
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
     * Lists all Vuelo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VueloSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vuelo model.
     * @param int $vue_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($vue_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($vue_id),
        ]);
    }

    /**
     * Creates a new Vuelo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vuelo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'vue_id' => $model->vue_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vuelo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $vue_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($vue_id)
    {
        $model = $this->findModel($vue_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'vue_id' => $model->vue_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vuelo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $vue_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($vue_id)
    {
        $this->findModel($vue_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vuelo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $vue_id Id
     * @return Vuelo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($vue_id)
    {
        if (($model = Vuelo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

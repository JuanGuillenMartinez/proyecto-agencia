<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\CatUbicacion;
use yii\helpers\ArrayHelper;
use app\models\CatAeropuerto;
use yii\web\NotFoundHttpException;
use app\models\CatAeropuertoSearch;

/**
 * CatAeropuertoController implements the CRUD actions for CatAeropuerto model.
 */
class CatAeropuertoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all CatAeropuerto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatAeropuertoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatAeropuerto model.
     * @param int $aero_id Id
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
     * Creates a new CatAeropuerto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatAeropuerto();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $image = UploadedFile::getInstance($model, 'img');
                if (!is_null($image)) {
                    $tmp = explode('.', $image->name);
                    $ext = end($tmp);
                    $model->aero_url = $model->aero_id . '_' . Yii::$app->security->generateRandomString() . ".{$ext}";
                    $path = Yii::$app->basePath . '/web/img/aeropuerto/' . $model->aero_url;
                    if ($image->saveAs($path) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->aero_id]);
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatAeropuerto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $aero_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->aero_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatAeropuerto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $aero_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatAeropuerto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $aero_id Id
     * @return CatAeropuerto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CatAeropuerto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

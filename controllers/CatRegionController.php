<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\CatRegion;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\CatRegionSearch;
use yii\web\NotFoundHttpException;

/**
 * CatRegionController implements the CRUD actions for CatRegion model.
 */
class CatRegionController extends Controller
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
     * Lists all CatRegion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatRegionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatRegion model.
     * @param int $reg_id Id
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
     * Creates a new CatRegion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatRegion();

        if ($this->request->isPost) {
            //Recibe parametros POST
            if ($model->load($this->request->post())) {
                //Obtiene la imagen traida desde el formulario
                $image = UploadedFile::getInstance($model, 'img');
                //Valida si la imagen no es nula
                if (!is_null($image)) {
                    //Obtiene la extension del archivo antes de renombrarla
                    $tmp = explode('.', $image->name);
                    $ext = end($tmp);
                    // $ext = end((explode(".", $image->name)));
                    //Genera el nuevo nombre del archivo
                    $model->reg_url = $model->reg_id . '_' . Yii::$app->security->generateRandomString() . ".{$ext}";
                    //Genera la ruta de la imagen
                    $path = Yii::$app->basePath . '/web/img/region/' . $model->reg_url;
                    //Valida si la imagen fue guardada y el model creado correctamente
                    if ($image->saveAs($path) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->reg_id]);
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
     * Updates an existing CatRegion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $reg_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $image = UploadedFile::getInstance($model, 'img');
            if (!is_null($image)) {
                // //Obtiene la extension del archivo antes de renombrarla
                // $tmp = explode('.', $image->name);
                // $ext = end($tmp);
                // // $ext = end((explode(".", $image->name)));
                // //Genera el nuevo nombre del archivo
                // $model->reg_url = $model->reg_id . '_' . Yii::$app->security->generateRandomString() . ".{$ext}";
                // //Genera la ruta de la imagen
                $path = Yii::$app->basePath . '/web/img/region/' . $model->reg_url;
                //Valida si la imagen fue guardada y el model creado correctamente
                if ($image->saveAs($path) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->reg_id]);
                }
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatRegion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $reg_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatRegion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $reg_id Id
     * @return CatRegion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CatRegion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace app\controllers;

use app\models\Alojamiento;
use app\models\CatSeguro;
use Yii;
use app\models\Vuelo;
use app\models\Paquete;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\PaqueteSearch;
use app\models\Traslado;
use yii\web\NotFoundHttpException;

/**
 * PaqueteController implements the CRUD actions for Paquete model.
 */
class PaqueteController extends Controller
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
     * Lists all Paquete models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaqueteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Paquete model.
     * @param int $paq_id Id
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
     * Creates a new Paquete model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Paquete();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $image = UploadedFile::getInstance($model, 'img');
                if (!is_null($image)) {
                    $tmp = explode('.', $image->name);
                    $ext = end($tmp);
                    $model->paq_url = $model->paq_id . '_' . Yii::$app->security->generateRandomString() . ".{$ext}";
                    $path = Yii::$app->basePath . '/web/img/paquete/' . $model->paq_url;
                    if ($image->saveAs($path) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->paq_id]);
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
     * Updates an existing Paquete model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $paq_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->paq_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Paquete model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $paq_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionSubtotal()
    {
        $vueloId = Yii::$app->request->post('vuelo');
        $segId = Yii::$app->request->post('seg');
        $aloId = Yii::$app->request->post('alo');
        $trasId = Yii::$app->request->post('tras');
        $subtotal = 0;
        if (isset($vueloId)) {
            $vuelo = Vuelo::findOne(['vue_id' => $vueloId]);
            if (isset($vuelo)) {
                $subtotal += $vuelo->vue_precio;
            }
        }
        if (isset($aloId)) {
            $alojamiento = Alojamiento::findOne(['alo_id' => $aloId]);
            if (isset($alojamiento)) {
                $subtotal += $alojamiento->alo_precio;
            }
        }
        if (isset($segId)) {
            $seguro = CatSeguro::findOne(['seg_id' => $segId]);
            if (isset($seguro)) {
                $subtotal += $seguro->seg_precio;
            }
        }
        if (isset($trasId)) {
            $traslado = Traslado::findOne(['tra_id' => $trasId]);
            if (isset($traslado)) {
                $subtotal += $traslado->tra_precio;
            }
        }
        return $subtotal;
    }

    public function actionSubtotal2()
    {
        $subtotal = Yii::$app->request->post('sub');
        $vueloId = Yii::$app->request->post('vuelo');
        $vueloAnteriorId = Yii::$app->request->post('idVueloAnterior');
        $segId = Yii::$app->request->post('seg');
        $seguroAnteriorId = Yii::$app->request->post('idSeguroAnterior');
        $aloId = Yii::$app->request->post('alo');
        $alojamientoAnteriorId = Yii::$app->request->post('idAlojamientoAnterior');
        $trasId = Yii::$app->request->post('tras');
        $trasladoAnteriorId = Yii::$app->request->post('idTrasladoAnterior');
        if (isset($vueloId)) {
            $vuelo = Vuelo::findOne(['vue_id' => $vueloId]);
            if (isset($vuelo)) {
                if ($vueloAnteriorId == 0) {
                    $subtotal = $subtotal + $vuelo->vue_precio;
                } else {
                    $vueloAnterior = Vuelo::findOne(['vue_id' => $vueloAnteriorId]);
                    $subtotal = $subtotal - $vueloAnterior->vue_precio + $vuelo->vue_precio;
                }
            }
        }
        if (isset($aloId)) {
            $alojamiento = Alojamiento::findOne(['alo_id' => $aloId]);
            if (isset($alojamiento)) {
                if ($alojamientoAnteriorId == 0) {
                    $subtotal = $subtotal + $alojamiento->alo_precio;
                } else {
                    $alojamientoAnterior = Alojamiento::findOne(['alo_id' => $alojamientoAnteriorId]);
                    $subtotal = $subtotal - $alojamientoAnterior->alo_precio + $alojamiento->alo_precio;
                }
            }
        }
        if (isset($segId)) {
            $seguro = CatSeguro::findOne(['seg_id' => $segId]);
            if (isset($seguro)) {
                if ($seguroAnteriorId == 0) {
                    $subtotal = $subtotal + $seguro->seg_precio;
                } else {
                    $seguroAnterior = CatSeguro::findOne(['seg_id' => $seguroAnteriorId]);
                    $subtotal = $subtotal - $seguroAnterior->seg_precio + $seguro->seg_precio;
                }
            }
        }
        if (isset($trasId)) {
            $traslado = Traslado::findOne(['tra_id' => $trasId]);
            if (isset($traslado)) {
                if ($trasladoAnteriorId == 0) {
                    $subtotal = $subtotal + $traslado->tra_precio;
                } else {
                    $trasladoAnterior = Traslado::findOne(['tra_id' => $trasladoAnteriorId]);
                    $subtotal = $subtotal - $trasladoAnterior->tra_precio + $traslado->tra_precio;
                }
            }
        }
        return $subtotal;
    }

    /**
     * Finds the Paquete model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $paq_id Id
     * @return Paquete the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Paquete::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

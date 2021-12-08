<?php

namespace app\controllers;

use Yii;
use app\models\Persona;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use app\models\PersonaSearch;
use yii\web\NotFoundHttpException;
use webvimark\modules\UserManagement\models\User;
  

/**
 * PersonaController implements the CRUD actions for Persona model.
 */
class PersonaController extends Controller
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
     * Lists all Persona models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Persona model.
     * @param int $per_id Id
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
     * Creates a new Persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Persona();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $image = UploadedFile::getInstance($model, 'img');
                if(!is_null($image)){
                    $ext = end((explode(".", $image->name)));
                    $model->per_url = $model->per_fkuser.'_'. Yii::$app->security->generateRandomString() . ".{$ext}";
                    $path = Yii::$app->basePath.'web/img/persona' . $model->per_url;
                    if($image->saveAs($path) && $model->save()){
                        return $this->redirect(['view', 'id' => $model->per_id]);
                    }
                }   
            }
        } else {
            $model->loadDefaultValues();
        }
        $users = ArrayHelper::map(User::find()->all(),'id', 'username');

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $per_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->per_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Persona model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $per_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $per_id Id
     * @return Persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Persona::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRegistrar(){
        $persona = new Persona();
        $user = new User();
        if ($this->request->isPost && $persona->load($this->request->post()) && $user->load($this->request->post())) {
            if($user->save(false)){
                User::assignRole($user->id, "Cliente");
                $persona->per_fkuser = $user->id;
                $persona->per_url = "user.png";
                $persona->per_correo = $user->email;
                if($persona->save()){
                    return $this->redirect(['/plantilla/index']);
                }
                
                
            }
           /*  $image = UploadedFile::getInstance($persona, 'img');
            if(!is_null($image)){
                $ext = end((explode('.', $image->name)));
                $persona->per_url = $persona->per_fkuser.'_'. Yii::$app->security->generateRandomString() . ".{$ext}";
                $path = Yii::$app->basePath.'/web/img/persona/' . $persona->per_url;
                
            } */
        }

        return $this->render('registrar', compact('persona', 'user'));      
    }

   /* public function actionRegistrarPersona(){
        $persona = new Persona();
        $user = new User();
        if ($this->request->isPost && $persona->load($this->request->post()) && $user->load($this->request->post())) {
            $image = UploadedFile::getInstance($persona, 'img');
            if(!is_null($image)){
                $ext = end((explode('.', $image->name)));
                $persona->per_url = $persona->per_fkuser.'_'. Yii::$app->security->generateRandomString() . ".{$ext}";
                $path = Yii::$app->basePath.'/web/img/persona/' . $persona->per_url;
                if($image->saveAs($path) && $user->save(false)){
                    User::assignRole($user->id, "Cliente");
                    $persona->per_fkuser = $user->id;
                    $persona->save();
                    return $this->redirect(['view', 'id' => $persona->per_id]);                }
            }
        }

        return $this->render('registrar', compact('persona', 'user'));      
    }*/

    public function actionActualizar()
    {
        $id = Yii::$app->request->post('id');
        $correo = Yii::$app->request->post('per_correo');
        $telefono = Yii::$app->request->post('per_telefono');
        $direccion = Yii::$app->request->post('per_direccion');
        $nacimiento = Yii::$app->request->post('per_nacimiento');
        
        $model = Persona::find()->where(["per_id"=>$id])->one();
        $model->per_correo = $correo;
        $model->per_telefono = $telefono;
        $model->per_direccion = $direccion;
        $model->per_nacimiento = $nacimiento;
        if ($model->save()) {
            return "Se actualizó correctamente";
        }
        else{
            return "Probelma";
        }
    }

}

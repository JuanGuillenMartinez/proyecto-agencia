<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paquete */

$this->title = 'Actualizar Paquete: ' . $model->paq_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Paquetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->paq_nombre, 'url' => ['view', 'paq_id' => $model->paq_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="paquete-update container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

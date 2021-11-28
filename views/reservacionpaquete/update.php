<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reservacionpaquete */

$this->title = 'Update Reservacionpaquete: ' . $model->recpaq_id;
$this->params['breadcrumbs'][] = ['label' => 'Reservacionpaquetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recpaq_id, 'url' => ['view', 'recpaq_id' => $model->recpaq_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reservacionpaquete-update container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatAeropuerto */

$this->title = 'Create Cat Aeropuerto';
$this->params['breadcrumbs'][] = ['label' => 'Cat Aeropuertos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-aeropuerto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

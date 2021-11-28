<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vuelo */

$this->title = 'Añadir Vuelo';
$this->params['breadcrumbs'][] = ['label' => 'Vuelos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vuelo-create container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

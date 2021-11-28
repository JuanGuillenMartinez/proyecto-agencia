<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatRegion */

$this->title = 'Añadir región';
$this->params['breadcrumbs'][] = ['label' => 'Regiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-region-create container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatUbicacion */

$this->title = 'Añadir Ubicacion';
$this->params['breadcrumbs'][] = ['label' => 'Cat Ubicacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-ubicacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

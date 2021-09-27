<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatAerolinea */

$this->title = 'Crear Aerolinea';
$this->params['breadcrumbs'][] = ['label' => 'Aerolineas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-aerolinea-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

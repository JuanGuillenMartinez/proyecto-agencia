<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Traslado */

$this->title = 'Crear Traslado';
$this->params['breadcrumbs'][] = ['label' => 'Traslados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traslado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

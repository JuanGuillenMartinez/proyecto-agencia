<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reservacionpaquete */

$this->title = 'Create Reservacionpaquete';
$this->params['breadcrumbs'][] = ['label' => 'Reservacionpaquetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservacionpaquete-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

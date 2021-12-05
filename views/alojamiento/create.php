<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Alojamiento */

$this->title = 'Añadir Alojamiento';
$this->params['breadcrumbs'][] = ['label' => 'Alojamientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alojamiento-create container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

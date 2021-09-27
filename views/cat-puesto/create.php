<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatPuesto */

$this->title = 'Create Cat Puesto';
$this->params['breadcrumbs'][] = ['label' => 'Cat Puestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-puesto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

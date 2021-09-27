<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatSucursal */

$this->title = 'Create Cat Sucursal';
$this->params['breadcrumbs'][] = ['label' => 'Cat Sucursals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-sucursal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatSeguro */

$this->title = 'Registrar seguro';
$this->params['breadcrumbs'][] = ['label' => 'Seguros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-seguro-create container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

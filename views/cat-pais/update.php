<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatPais */

$this->title = 'Editar País: ' . $model->pai_id;
$this->params['breadcrumbs'][] = ['label' => 'País', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pai_id, 'url' => ['view', 'pai_id' => $model->pai_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-pais-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

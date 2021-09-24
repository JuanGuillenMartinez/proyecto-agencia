<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatAseguradora */

$this->title = 'Create Cat Aseguradora';
$this->params['breadcrumbs'][] = ['label' => 'Cat Aseguradoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-aseguradora-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatPais */

$this->title = 'Añadir un país';
$this->params['breadcrumbs'][] = ['label' => 'País', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-pais-create container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CatUbicacion */

$this->title = $model->ubi_id;
$this->params['breadcrumbs'][] = ['label' => 'Ubicaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cat-ubicacion-view container-crud">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->ubi_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ubi_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de que quiere eliminar este artículo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ubi_id',
            'ubi_capital',
            //'ubi_fkpais',
            'paisNombre'
        ],
    ]) ?>

</div>

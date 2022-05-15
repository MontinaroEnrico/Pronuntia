<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Terapia */

$this->title = $model->idTerapia;
$this->params['breadcrumbs'][] = ['label' => 'Terapias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="terapia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idTerapia' => $model->idTerapia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idTerapia' => $model->idTerapia], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idTerapia',
        ],
    ]) ?>

</div>

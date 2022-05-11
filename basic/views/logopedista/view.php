<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Logopedista */

$this->title = $model->idLogopedista;
$this->params['breadcrumbs'][] = ['label' => 'Logopedistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="logopedista-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idLogopedista' => $model->idLogopedista], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idLogopedista' => $model->idLogopedista], [
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
            'idLogopedista',
        ],
    ]) ?>

</div>

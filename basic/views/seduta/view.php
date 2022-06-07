<?php

use yii\helpers\BaseHtmlPurifier;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Seduta */

$this->title = $model->idSeduta;
$this->params['breadcrumbs'][] = ['label' => 'Sedutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="seduta-view">

    <h1><?= BaseHtmlPurifier::process($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idSeduta' => $model->idSeduta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idSeduta' => $model->idSeduta], [
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
            'idSeduta',
            'idPaziente',
            'Logopedista_idLogopedista',
            'data',
            'ora',
            'stato',
        ],
    ]) ?>

</div>

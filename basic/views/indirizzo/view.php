<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Indirizzo */

$this->title = $model->idIndirizzo;
$this->params['breadcrumbs'][] = ['label' => 'Indirizzos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="indirizzo-view">

    <h1><?= \yii\helpers\BaseHtmlPurifier::process($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idIndirizzo' => $model->idIndirizzo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idIndirizzo' => $model->idIndirizzo], [
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
            'idIndirizzo',
            'citta',
            'provincia',
            'via',
            'numeroCivico',
            'cap',
        ],
    ]) ?>

</div>

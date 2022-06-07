<?php

use yii\bootstrap4\Progress;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TerapiaHasEsercizio */

$this->title = $model->Terapia_idTerapia;
$this->params['breadcrumbs'][] = ['label' => 'Terapia Has Esercizios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="terapia-has-esercizio-view">

    <h1><?= \yii\helpers\BaseHtmlPurifier::process($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Terapia_idTerapia' => $model->Terapia_idTerapia, 'Esercizio_idEsercizio' => $model->Esercizio_idEsercizio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Terapia_idTerapia' => $model->Terapia_idTerapia, 'Esercizio_idEsercizio' => $model->Esercizio_idEsercizio], [
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
            'Terapia_idTerapia',
            'Esercizio_idEsercizio',
        ],
    ]) ?>


</div>

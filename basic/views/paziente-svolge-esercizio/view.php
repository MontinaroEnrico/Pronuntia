<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PazienteSvolgeEsercizio */

$this->title = $model->Paziente_idPaziente;
$this->params['breadcrumbs'][] = ['label' => 'Paziente Svolge Esercizios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="paziente-svolge-esercizio-view">

    <h1><?= \yii\helpers\BaseHtmlPurifier::process($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Paziente_idPaziente' => $model->Paziente_idPaziente, 'Esercizio_idEsercizio' => $model->Esercizio_idEsercizio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Paziente_idPaziente' => $model->Paziente_idPaziente, 'Esercizio_idEsercizio' => $model->Esercizio_idEsercizio], [
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
            'Paziente_idPaziente',
            'Esercizio_idEsercizio',
            'risposta',
            'rating',
        ],
    ]) ?>

</div>

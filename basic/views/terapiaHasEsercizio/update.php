<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TerapiaHasEsercizio */

$this->title = 'Update Terapia Has Esercizio: ' . $model->Terapia_idTerapia;
$this->params['breadcrumbs'][] = ['label' => 'Terapia Has Esercizios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Terapia_idTerapia, 'url' => ['view', 'Terapia_idTerapia' => $model->Terapia_idTerapia, 'Esercizio_idEsercizio' => $model->Esercizio_idEsercizio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="terapia-has-esercizio-update">

    <h1><?= \yii\helpers\BaseHtmlPurifier::process($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

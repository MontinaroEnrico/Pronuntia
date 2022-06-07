<?php

use yii\helpers\BaseHtmlPurifier;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PazienteSvolgeEsercizio */

$this->title = 'Update Paziente Svolge Esercizio: ' . $model->Paziente_idPaziente;
$this->params['breadcrumbs'][] = ['label' => 'Paziente Svolge Esercizios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Paziente_idPaziente, 'url' => ['view', 'Paziente_idPaziente' => $model->Paziente_idPaziente, 'Esercizio_idEsercizio' => $model->Esercizio_idEsercizio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paziente-svolge-esercizio-update">

    <h1><?=BaseHtmlPurifier::process($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

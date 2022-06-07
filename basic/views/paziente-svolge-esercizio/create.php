<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PazienteSvolgeEsercizio */

$this->title = 'Create Paziente Svolge Esercizio';
$this->params['breadcrumbs'][] = ['label' => 'Paziente Svolge Esercizios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paziente-svolge-esercizio-create">

    <h1><?= \yii\helpers\BaseHtmlPurifier::process($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

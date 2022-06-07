<?php

use yii\helpers\BaseHtmlPurifier;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TerapiaHasEsercizio */
/* @var $esercizi*/
/* @var $pazienti*/


$this->title = 'Create Terapia Has Esercizio';
$this->params['breadcrumbs'][] = ['label' => 'Terapia Has Esercizios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-has-esercizio-create">

    <h1><?= BaseHtmlPurifier::process($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'esercizi'=>$esercizi,
        'pazienti'=>$pazienti
    ]) ?>

</div>

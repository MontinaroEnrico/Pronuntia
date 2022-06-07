<?php

use yii\helpers\BaseHtmlPurifier;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Classifica */

$this->title = 'Update Classifica: ' . $model->idClassifica;
$this->params['breadcrumbs'][] = ['label' => 'Classificas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idClassifica, 'url' => ['view', 'idClassifica' => $model->idClassifica]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="classifica-update">

    <h1><?= BaseHtmlPurifier::process($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

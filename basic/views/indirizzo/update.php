<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Indirizzo */

$this->title = 'Update Indirizzo: ' . $model->idIndirizzo;
$this->params['breadcrumbs'][] = ['label' => 'Indirizzos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idIndirizzo, 'url' => ['view', 'idIndirizzo' => $model->idIndirizzo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="indirizzo-update">

    <h1><?= \yii\helpers\BaseHtmlPurifier::process($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Utente */

$this->title = 'Update Utente: ' . $model->idUtente;
$this->params['breadcrumbs'][] = ['label' => 'Utentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUtente, 'url' => ['view', 'idUtente' => $model->idUtente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="utente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('/utente/_form', [
        'model' => $model,
    ]) ?>

</div>

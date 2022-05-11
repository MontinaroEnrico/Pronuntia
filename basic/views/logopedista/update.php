<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Logopedista */

$this->title = 'Update Logopedista: ' . $model->idLogopedista;
$this->params['breadcrumbs'][] = ['label' => 'Logopedistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLogopedista, 'url' => ['view', 'idLogopedista' => $model->idLogopedista]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="logopedista-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

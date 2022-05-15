<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Terapia */

$this->title = 'Update Terapia: ' . $model->idTerapia;
$this->params['breadcrumbs'][] = ['label' => 'Terapias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTerapia, 'url' => ['view', 'idTerapia' => $model->idTerapia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="terapia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

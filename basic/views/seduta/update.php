<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seduta */

$this->title = 'Update Seduta: ' . $model->idSeduta;
$this->params['breadcrumbs'][] = ['label' => 'Sedutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSeduta, 'url' => ['view', 'idSeduta' => $model->idSeduta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seduta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

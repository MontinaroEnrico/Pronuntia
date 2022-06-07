<?php

use yii\helpers\BaseHtmlPurifier;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Terapia */
/* @var $pazienti */

$this->title = 'Update Terapia: ' . $model->idTerapia;
$this->params['breadcrumbs'][] = ['label' => 'Terapias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTerapia, 'url' => ['view', 'idTerapia' => $model->idTerapia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="terapia-update">

    <h1><? BaseHtmlPurifier::process($this->title) ?></h1>

    <?= $this->render('_formUpdate', [
        'model' => $model,

    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Indirizzo */

$this->title = 'Create Indirizzo';
$this->params['breadcrumbs'][] = ['label' => 'Indirizzos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indirizzo-create">

    <h1><?= \yii\helpers\BaseHtmlPurifier::process($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

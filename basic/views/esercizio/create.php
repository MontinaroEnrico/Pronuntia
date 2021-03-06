<?php

use yii\helpers\BaseHtmlPurifier;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

$this->title = 'Create Esercizio';
$this->params['breadcrumbs'][] = ['label' => 'Esercizios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esercizio-create">

    <h1><?=BaseHtmlPurifier::process($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seduta */

$this->title = 'Create Seduta';
$this->params['breadcrumbs'][] = ['label' => 'Sedutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seduta-create">

    <h1><?= \yii\helpers\BaseHtmlPurifier::process($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

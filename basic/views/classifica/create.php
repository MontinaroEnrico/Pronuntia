<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Classifica */

$this->title = 'Create Classifica';
$this->params['breadcrumbs'][] = ['label' => 'Classificas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classifica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
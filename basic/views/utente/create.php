<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Utente */
/* @var $modelIndirizzo app\models\Indirizzo */

$this->title = 'Registrazione';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utente-create">

    <h1><?= \yii\helpers\BaseHtmlPurifier::process($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

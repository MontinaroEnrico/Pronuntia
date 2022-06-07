<?php

use yii\helpers\BaseHtmlPurifier;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Terapia */
/* @var $modelUtente app\models\Utente */
/* @var $pazienti */

$this->title = 'Create Terapia';
$this->params['breadcrumbs'][] = ['label' => 'Terapias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-create">

    <h1><?= BaseHtmlPurifier::process($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelUtente' => $modelUtente,
        'pazienti'=> $pazienti
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Utente */
/* @var $modelIndirizzo app\models\Indirizzo */

$this->title = 'Registrazione Logopedista';
$this->params['breadcrumbs'][] = ['label' => 'Utentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utente-createLogopedista">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Utente */

<<<<<<< Updated upstream
$this->title = 'Create Utente';
=======
$this->title = 'Registrazione';
>>>>>>> Stashed changes
$this->params['breadcrumbs'][] = ['label' => 'Utentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

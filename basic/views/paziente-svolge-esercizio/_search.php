<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PazienteSvolgeEsercizioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paziente-svolge-esercizio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Paziente_idPaziente') ?>

    <?= $form->field($model, 'Esercizio_idEsercizio') ?>

    <?= $form->field($model, 'risposta') ?>

    <?= $form->field($model, 'rating') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

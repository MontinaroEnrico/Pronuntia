<?php

use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\EsercizioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="esercizio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idEsercizio') ?>

    <?= $form->field($model, 'tipologia') ?>

    <?= $form->field($model, 'Logopedista_idLogopedista') ?>

    <?= $form->field($model, 'Domanda') ?>

    <?= $form->field($model, 'Risposta') ?>



    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

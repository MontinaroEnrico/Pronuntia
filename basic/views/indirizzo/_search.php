<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IndirizzoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indirizzo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idIndirizzo') ?>

    <?= $form->field($model, 'citta') ?>

    <?= $form->field($model, 'provincia') ?>

    <?= $form->field($model, 'via') ?>

    <?= $form->field($model, 'numeroCivico') ?>

    <?php // echo $form->field($model, 'cap') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

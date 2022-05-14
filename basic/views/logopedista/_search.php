<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UtenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['pazienti'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idUtente') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'cognome') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'dataDiNascita') ?>

    <?php // echo $form->field($model, 'luogoDiNascita') ?>

    <?php // echo $form->field($model, 'codiceFiscale') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'numeroTelefono') ?>

    <?php // echo $form->field($model, 'idIndirizzo') ?>

    <?php // echo $form->field($model, 'authKey') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

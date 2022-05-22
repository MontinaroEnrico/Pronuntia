<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SedutaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seduta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idSeduta') ?>

    <?= $form->field($model, 'idPaziente') ?>

    <?= $form->field($model, 'Logopedista_idLogopedista') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'ora') ?>

    <?php // echo $form->field($model, 'stato') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

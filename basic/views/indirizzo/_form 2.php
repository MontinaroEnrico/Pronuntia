<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Indirizzo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indirizzo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'citta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provincia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'via')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numeroCivico')->textInput() ?>

    <?= $form->field($model, 'cap')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

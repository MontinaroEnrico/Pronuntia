<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Classifica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classifica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPaziente')->textInput() ?>

    <?= $form->field($model, 'posizione')->textInput() ?>

    <?= $form->field($model, 'punti')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

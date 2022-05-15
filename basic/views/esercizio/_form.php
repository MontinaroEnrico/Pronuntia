<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */
/* @var $form yii\widgets\ActiveForm */
$logopedista=Yii::$app->user->id;
?>

<div class="esercizio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipologia')->dropDownList([
        'Storia' => 'Storia',
        'Domanda&Risposta' => 'Domanda&Risposta',
        'Risposta Vocale' => 'RispostaVocale',
        'Video' => 'Video'
    ],
    ['prompt'=>'Seleziona Tipologia']
); ?>

    <?= $form->field($model, 'Logopedista_idLogopedista')->textInput()->hiddenInput(array('value'=>Yii::$app->user->id))->label(false) ?>

    <?= $form->field($model, 'nomeEsercizio')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'Domanda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Risposta')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

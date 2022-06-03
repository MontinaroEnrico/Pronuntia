<?php

use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PazienteSvolgeEsercizio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paziente-svolge-esercizio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Paziente_idPaziente')->textInput() ?>

    <?= $form->field($model, 'Esercizio_idEsercizio')->textInput() ?>

    <?= $form->field($model, 'risposta')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'rating')->widget(StarRating::classname(), [
    'pluginOptions' => ['size'=>'lg']
    ]);
   $model->rating=is_float($model->rating)
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

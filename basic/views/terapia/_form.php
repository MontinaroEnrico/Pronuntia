<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Terapia */
/* @var $form yii\widgets\ActiveForm */
/* @var $modelUtente app\models\Utente*/
/* @var $pazienti */

?>

<div class="terapia-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $i=0?>
    <h3>A chi vuole assegnare la nuova terapia?</h3>
    <?= $form->field($model,'idLogopedista')->hiddenInput(array('value'=>Yii::$app->user->id))->label(false) ?>
    <?= $form->field($model, 'idPaziente')->dropDownList(
        ArrayHelper::map($pazienti, 'idUtente', 'email'),
        ['prompt'=>'Seleziona Paziente']
    );


    ?>
    <?= $form->field($model, 'dataInizio')->widget(DatePicker::classname(), ['dateFormat' => 'php:Y-m-d', 'options' => ['readonly' => true], 'clientOptions' => [ 'changeMonth' => true, 'changeYear' => true, 'yearRange' => '1980:'.date('Y'), 'maxDate' => '+0d']]) ?>
    <?= $form->field($model, 'dataFine')->widget(DatePicker::classname(), ['dateFormat' => 'php:Y-m-d', 'options' => ['readonly' => true], 'clientOptions' => [ 'changeMonth' => true, 'changeYear' => true, 'yearRange' => '1980:'.date('Y'), 'maxDate' => '+0d']]) ?>



    <?= $form->field($model, 'idTerapia')->hiddenInput(array(""))->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('CREA', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

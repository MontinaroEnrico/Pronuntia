<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Terapia */
/* @var $form yii\widgets\ActiveForm */
/* @var $modelUtente app\models\Utente*/


?>
<?php $modelUtente=\app\models\UtenteSearch::findIdentity($model->idPaziente) ?>
<div class="terapia-form">

    <?php $form = ActiveForm::begin(); ?>
    <h3>Modifica Terapia</h3>
    <?= $form->field($modelUtente, 'email')->hiddenInput(array($modelUtente->email))->textarea();


    ?>
    <?= $form->field($model, 'dataInizio')->widget(DatePicker::classname(), ['dateFormat' => 'php:Y-m-d', 'options' => ['readonly' => true], 'clientOptions' => [ 'changeMonth' => true, 'changeYear' => true, 'yearRange' => '2022:'.date('Y'), 'minDate' => '+0d']]) ?>
    <?= $form->field($model, 'dataFine')->widget(DatePicker::classname(), ['dateFormat' => 'php:Y-m-d', 'options' => ['readonly' => true], 'clientOptions' => [ 'changeMonth' => true, 'changeYear' => true, 'yearRange' => '1980:'.date('Y'), 'minDate' => '+0d']]) ?>



    <?= $form->field($model, 'idTerapia')->hiddenInput(array($model->idTerapia))->label(false); ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

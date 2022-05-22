<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Seduta */
/* @var $form yii\widgets\ActiveForm */
$logopedista=new \app\models\Logopedista();
$UserLog=Yii::$app->user->id;
$idLogopedista= $logopedista->getLogopedistaPazienteLogged();
$logopedistaLogged=$logopedista->logopedistaLogged();

?>

<div class="seduta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($logopedistaLogged){


    echo $form->field($model, 'Logopedista_idLogopedista')->hiddenInput(array('value'=>$UserLog))->label(false) ;

    echo $form->field($model, 'data')->widget(DatePicker::classname(), ['dateFormat' => 'php:Y-m-d', 'options' => ['readonly' => true], 'clientOptions' => [ 'changeMonth' => true, 'changeYear' => true, 'yearRange' => '2022:'.date('Y'), 'minDate' => '+0d']]);
         echo $form->field($model, 'ora')->textInput();
            echo $form->field($model, 'stato')->hiddenInput(array('value'=>"Prenotato"))->label(false);
    }
    else{
       echo $form->field($model, 'idPaziente')->hiddenInput(array('value'=>$UserLog))->label(false) ;

       echo $form->field($model, 'Logopedista_idLogopedista')->hiddenInput(array('value'=>$idLogopedista))->label(false) ;
        echo "<h3>Clicca su prenota per richiedere una seduta </h3>";
        echo $form->field($model, 'stato')->hiddenInput(array('value'=>"In attesa"))->label(false);
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton('Prenota', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

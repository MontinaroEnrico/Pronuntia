<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Utente */
/* @var $form yii\widgets\ActiveForm */
$Logopedista=new \app\models\Logopedista();
$idLogopedista=$Logopedista->logopedistaLogged();
?>


<div class="utente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dataDiNascita')->textInput() ?>

    <?= $form->field($model, 'luogoDiNascita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codiceFiscale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numeroTelefono')->textInput() ?>


    <?= $form->field($model, 'authKey')->hiddenInput((array('value'=>rand())))->label(false)?>
<?php if($idLogopedista>0){ ?>
    <?= $form->field($model, 'diagnosi')->textInput() ?>

<?php }?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

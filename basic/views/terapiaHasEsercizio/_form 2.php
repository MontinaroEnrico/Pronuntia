<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TerapiaHasEsercizio */

/* @var $form yii\widgets\ActiveForm */
/* @var $esercizi */
/* @var $pazienti*/

?>

<div class="terapia-has-esercizio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Terapia_idTerapia')->dropDownList(
        ArrayHelper::map($pazienti, 'idTerapia', 'email'),
        ['prompt'=>'Seleziona Paziente']
    );?>
<?=

$form->field($model, 'Esercizio_idEsercizio')->dropDownList(
    ArrayHelper::map($esercizi, 'idEsercizio', 'nomeEsercizio'),
    ['prompt'=>'Esercizio']
);


?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

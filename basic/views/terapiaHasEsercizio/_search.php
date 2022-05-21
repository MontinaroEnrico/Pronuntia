<?php

use yii\bootstrap4\Progress;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TerapiaHasEsercizioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="terapia-has-esercizio-search">
    <?php echo Progress::widget([
        'bars' => [
            ['percent' => 30, 'options' => ['class' => 'bg-danger']],
            ['percent' => 30, 'label' => 'test', 'options' => ['class' => 'bg-success']],
            ['percent' => 35, 'options' => ['class' => 'bg-warning']],
        ]
    ]);?>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'Terapia_idTerapia') ?>

    <?= $form->field($model, 'Esercizio_idEsercizio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

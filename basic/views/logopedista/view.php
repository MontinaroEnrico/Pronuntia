<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Utente */

$this->title = $model->idUtente;
$this->params['breadcrumbs'][] = ['label' => 'Paziente', 'url' => ['pazienti']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="logopedista-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idUtente' => $model->idUtente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idUtente' => $model->idUtente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idUtente',
            'nome',
            'cognome',
            'email:email',
            'dataDiNascita',
            'luogoDiNascita',
            'codiceFiscale',
            'password',
            'numeroTelefono',
            'authKey',
        ],
    ]) ?>

</div>

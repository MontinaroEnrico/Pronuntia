<?php

use app\models\Utente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UtenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utente-index">

    <h1><?= \yii\helpers\BaseHtmlPurifier::process($this->title) ?></h1>

    <p>
        <?= Html::a('Create Utente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idUtente',
            'nome',
            'cognome',
            'email:email',
            'dataDiNascita',
            //'luogoDiNascita',
            //'codiceFiscale',
            //'password',
            //'numeroTelefono',
            //'idIndirizzo',
            //'authKey',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Utente $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idUtente' => $model->idUtente]);
                 }
            ],
        ],
    ]); ?>


</div>

<?php

use app\models\Utente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UtenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pazienti';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="utente-index">

    <h1><?= \yii\helpers\BaseHtmlPurifier::process($this->title) ?></h1>


    <?php $url="/utente/view"// echo $this->render('_search', ['model' => $searchModel]); ?>

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
                'urlCreator' => function ($url, Utente $model, $key, $index, $column) {
                    return Url::toRoute(['/utente/view', 'idUtente' => $model->idUtente]);
                }
            ],
        ],
    ]); ?>


</div>
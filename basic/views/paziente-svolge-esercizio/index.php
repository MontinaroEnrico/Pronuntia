<?php

use app\models\PazienteSvolgeEsercizio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PazienteSvolgeEsercizioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paziente Svolge Esercizios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paziente-svolge-esercizio-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Paziente_idPaziente',
            'Esercizio_idEsercizio',
            'risposta',
            'rating',
            [
              'header' => 'Gioca',
                'content' => function (PazienteSvolgeEsercizio $model) {
                   return Html::a('Svolgi',['/esercizio/svolgiesercizio','idPaziente' => $model->Paziente_idPaziente , 'idEsercizio' => $model->Esercizio_idEsercizio]);
                 }
            ],
        ],
    ]); ?>


</div>

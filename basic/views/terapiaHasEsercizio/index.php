<?php

use app\models\TerapiaHasEsercizio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TerapiaHasEsercizioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Terapia Has Esercizios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-has-esercizio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Terapia Has Esercizio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Terapia_idTerapia',
            'Esercizio_idEsercizio',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TerapiaHasEsercizio $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Terapia_idTerapia' => $model->Terapia_idTerapia, 'Esercizio_idEsercizio' => $model->Esercizio_idEsercizio]);
                 }
            ],
        ],
    ]); ?>


</div>

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IndirizzoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indirizzos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indirizzo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Indirizzo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idIndirizzo',
            'citta',
            'provincia',
            'via',
            'numeroCivico',
            //'cap',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Indirizzo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idIndirizzo' => $model->idIndirizzo]);
                 }
            ],
        ],
    ]); ?>


</div>

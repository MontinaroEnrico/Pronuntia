<?php

use app\models\Classifica;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClassificaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Classificas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classifica-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Classifica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idClassifica',
            'idPaziente',
            'posizione',
            'punti',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Classifica $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idClassifica' => $model->idClassifica]);
                 }
            ],
        ],
    ]); ?>


</div>

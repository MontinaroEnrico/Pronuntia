<?php

use app\models\Terapia;
use yii\helpers\BaseHtmlPurifier;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TerapiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Terapias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-index">

    <h1><?= BaseHtmlPurifier::process($this->title) ?></h1>

    <p>
        <?= Html::a('Create Terapia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTerapia',
           // 'idPaziente',
            'dataInizio',
            'dataFine',
           // 'idLogopedista',
            'email',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Terapia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idTerapia' => $model->idTerapia]);
                 }
            ],
        ],
    ]); ?>


</div>

<?php

use app\models\Seduta;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SedutaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sedutas';
$this->params['breadcrumbs'][] = $this->title;
$logopedista=new \app\models\Logopedista();
$logopedistaLogged=$logopedista->logopedistaLogged();
?>
<div class="seduta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(!$logopedistaLogged){
        echo Html::a('Richiedi Seduta', ['create'], ['class' => 'btn btn-success']);} ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idSeduta',
            //'idPaziente',
           // 'Logopedista_idLogopedista',
            'data',
            'ora',
            'stato',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Seduta $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idSeduta' => $model->idSeduta]);
                 }
            ],
        ],
    ]); ?>


</div>

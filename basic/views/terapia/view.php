<?php

use yii\bootstrap4\Progress;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Terapia */

$this->title = $model->idTerapia;
$this->params['breadcrumbs'][] = ['label' => 'Terapias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$modelUtente=new \app\models\UtenteSearch();
$datiPaziente=$modelUtente::findIdentity($model->idPaziente);
$model->email=$datiPaziente->email;
?>
<div class="terapia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idTerapia' => $model->idTerapia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idTerapia' => $model->idTerapia], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    $tot = Yii::$app->db->createCommand('SELECT count(*) as tot FROM Terapia_has_Esercizio where Terapia_idTerapia= "'.$model->idTerapia.'"')->queryScalar();
    $completati = Yii::$app->db->createCommand('SELECT count(*) as tot FROM Terapia_has_Esercizio where Terapia_idTerapia= "'.$model->idTerapia.'" AND stato="Completato"')->queryScalar();
if($tot==0){
    $tot=1;
}
    ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idTerapia',
            'email',
            'dataInizio',
            'dataFine'
        ],
    ]) ?>
    <?php echo Progress::widget([
        'percent' => ($completati/$tot)*100,
        'barOptions' => ['class' => ['bg-success', 'progress-bar-animated', 'progress-bar-striped']]
    ]);?>

</div>

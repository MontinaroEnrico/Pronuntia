<?php

use yii\bootstrap4\Progress;
use yii\helpers\BaseHtmlPurifier;
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

    <h1><?= BaseHtmlPurifier::process($this->title) ?></h1>

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
    $completati = Yii::$app->db->createCommand('SELECT count(*) as tot FROM Paziente_svolge_Esercizio where idTerapia= "'.$model->idTerapia.'" AND svolgimento="Bene"')->queryScalar();
    $male = Yii::$app->db->createCommand('SELECT count(*) as tot FROM Paziente_svolge_Esercizio where idTerapia= "'.$model->idTerapia.'" AND svolgimento="Male"')->queryScalar();
    if($tot==0){
        $tot=1;
    }
    $daSvolgere=$tot-$completati-$male
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
    ]);
    ?>
    <?php echo "<p>Gli esercizi svolti bene sono: $completati</p>";
    echo "<p>Gli esercizi svolti male sono: $male</p>";
    echo "<p>Gli esercizi da svolgere sono: $daSvolgere</p>";
    ?>

</div>

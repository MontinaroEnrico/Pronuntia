<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Utente */

$paziente=new \app\models\Paziente();
$logopedista=new \app\models\Logopedista();

$this->title = 'Visualizza Profilo';

$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$request = Yii::$app->request;
$idPaziente= $paziente->getPazienteForView($request->get('idUtente'))
?>
    <div class="utente-view">

    <h1><?= \yii\helpers\BaseHtmlPurifier::process($this->title) ?></h1>
<?php if($idPaziente || Yii::$app->user->id==$request->get('idUtente')){
    ?>

    <p>
        <?= Html::a('Update', ['update', 'idUtente' => $model->idUtente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idUtente' => $model->idUtente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'idUtente',
        'nome',
        'cognome',
        'email:email',
        'dataDiNascita',
        'luogoDiNascita',
        'codiceFiscale',
        'password',
        'numeroTelefono',
        'authKey',
    ],
]) ?>

    </div>
<?php }else{?>
    <h1>EH VOLEVI</h1>
    <img src="<?= \Yii::getAlias('@web/ehvolevi.jpg') ?>" height="60%" width="90%">
<?php }?>
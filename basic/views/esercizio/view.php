<?php

use denar90\waveSurferAudio\WaveSurferAudioWidget;
use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

$this->title = $model->idEsercizio;
$this->params['breadcrumbs'][] = ['label' => 'Esercizios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="esercizio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idEsercizio' => $model->idEsercizio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idEsercizio' => $model->idEsercizio], [
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
            'idEsercizio',
            'tipologia',
            'Logopedista_idLogopedista',
            'Domanda',
            'Risposta',

        ],
    ]);
    ?>
    <div>
    <audio controls>
        <source src="<?= \Yii::getAlias('@web/CanzoneDelBus.mp3') ?>"  type="audio/ogg">

    </audio>
</div>
<?php

    echo StarRating::widget([
        'name' => 'rating',
        'value' => $model->rating,
        'pluginOptions' => ['disabled'=>true, 'showClear'=>false]
    ]);?>




</div>

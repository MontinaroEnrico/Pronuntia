<?php

use denar90\waveSurferAudio\WaveSurferAudioWidget;
use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

$this->title = $model->idEsercizio;
$request = Yii::$app->request;
$idPaziente=$request->get('idPaziente');

\yii\web\YiiAsset::register($this);
?>
<div class="esercizio-view">



    <div>
        <iframe id="frame" style="border:0px;width:100%;height:500px" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
        <script>
            let frame = document.getElementById("frame");
            let $var = <?php echo json_encode($model->link, JSON_HEX_TAG); ?>; // Don't forget the extra semicolon!
            frame.src = $var;
        </script>
        <!--   <audio controls>
        <source src="<?= \Yii::getAlias('@web/CanzoneDelBus.mp3') ?>"  type="audio/ogg">

    </audio>-->
    </div>

    <?php

    echo StarRating::widget([
        'name' => 'rating',
        'value' => $model->rating,
        'pluginOptions' => ['disabled'=>true, 'showClear'=>false]
    ]);?>


  <?= Html::a('Esercizio svolto bene',['/paziente-svolge-esercizio/index','idPaziente' => $idPaziente , 'idEsercizio' => $model->idEsercizio,'stato'=>'1']);?>
    <?= Html::a('Esercizio svolto male',['/paziente-svolge-esercizio/index','idPaziente' => $idPaziente , 'idEsercizio' => $model->idEsercizio,'stato'=>'2']);?>

</div>

<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\models\Logopedista;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\BaseHtmlPurifier;

AppAsset::register($this);
$modelLogopedista=new Logopedista();
$idLogopedista= $modelLogopedista->logopedistaLogged();
$modelPaziente=new \app\models\Paziente();
$idPaziente=$modelPaziente->pazienteLogged();
?>
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }
/* Hide default HTML checkbox */
.switch input {
opacity: 0;
width: 0;
height: 0;
}

/* The slider */
.slider {
position: absolute;
cursor: pointer;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: #ccc;
-webkit-transition: .4s;
transition: .4s;
}

.slider:before {
position: absolute;
content: "";
height: 26px;
width: 26px;
left: 4px;
bottom: 4px;
background-color: white;
-webkit-transition: .4s;
transition: .4s;
}

input:checked + .slider {
background-color: #2196F3;
}

input:focus + .slider {
box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
-webkit-transform: translateX(26px);
-ms-transform: translateX(26px);
transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
border-radius: 34px;
}

.slider.round:before {
border-radius: 50%;
}</style>'
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Pronuntia</title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
            /*
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,*/
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-success fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->email . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
            Yii::$app->user->isGuest ? (
            ['label' => 'Registrazione Logopedista', 'url' => ['/utente/create']]
            ) : (
                '<li>'

                . '</li>'
            ),
            $idPaziente>0 ||$idLogopedista>0 ? (

                ['label' => 'Visualizza Profilo', 'url' => ['/utente/view','idUtente'=>Yii::$app->user->id]]


            ):(
                '<li>'

                . '</li>'
           ),
           $idLogopedista>0 ? (
            ['label' => 'Gestione Pazienti', 'url' => ['#'], 'items' => [

            ['label' => 'Registrazione Paziente', 'url' => ['/utente/create']],
            ['label' => 'Visualizza Pazienti', 'url' => ['/logopedista/index']]]]


            ):(
                '<li>'

                . '</li>'
            ),
            $idLogopedista>0 ? (
            ['label' => 'Gestione Terapia', 'url' => ['#'], 'items' => [
            ['label' => 'Crea Terapia', 'url' => ['/terapia/create']],
                ['label' => 'Visualizza Terapie', 'url' => ['/terapia/index']],
                ['label' => 'Assegna esercizi a terapia', 'url' => ['/terapia-has-esercizio/create']]]]
            ):(
                '<li>'

                . '</li>'
            ),

            $idLogopedista>0 ? (
                ['label' => 'Gestione Esercizi', 'url' => ['#'], 'items' => [
                ['label' => 'Crea esercizio', 'url' => ['/esercizio/create']],
                ['label' => 'Visualizza Esercizi Disponibili', 'url' => ['/esercizio/index']]]]
            ):(
                '<li>'

                . '</li>'
            ),
            $idPaziente>0 ? (
                ['label' => 'Visualizza Terapie', 'url' => ['/terapia/index']]

            ):(
                '<li>'

                . '</li>'
            ),
            $idPaziente>0 || $idLogopedista>0 ? (
            ['label' => 'Gestisci Sedute', 'url' => ['/seduta/index']]

            ):(
                '<li>'

                . '</li>'
            ),
            $idPaziente>0 ? (
            ['label' => 'Svolgi Esercizio', 'url' => ['/paziente-svolge-esercizio/index']]

            ):(
                '<li>'

                . '</li>'
            ),
            $idPaziente>0 ? (
            ['label' => 'Classifica', 'url' => ['/classifica/view']]

            ):(
                '<li>'

                . '</li>'
            ),

            $idPaziente>0 ? (


            '<label class="switch">
              <input type="checkbox">
              <span class="slider"></span>
            </label><p style="color:white">Blocca Pagina</p>'


            ):(
                '<li>'

                . '</li>'
            ),


        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

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
AppAsset::register($this);
$modelLogopedista=new Logopedista();
$idLogopedista= $modelLogopedista->logopedistaLogged();
$modelPaziente=new \app\models\Paziente();
$idPaziente=$modelPaziente->pazienteLogged();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
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
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            


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
           $idLogopedista>0 ? (

                ['label' => 'Visualizza Profilo', 'url' => ['/utente/view','idUtente'=>$idLogopedista]]


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
/*
            $idLogopedista>0 ? (
                ['label' => 'Gestione Esercizi', 'url' => ['#'], 'items' => [
                ['label' => 'Crea esercizio', 'url' => ['/esercizio/create']],
                ['label' => 'Visualizza Esercizi Disponibili', 'url' => ['/esercizio/index']]]]
            ):(
                '<li>'

                . '</li>'
            ),
*/
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

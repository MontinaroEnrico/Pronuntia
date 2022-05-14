<?php

namespace app\controllers;

use app\models\Logopedista;
use app\models\LogopedistaSearch;
use app\models\Paziente;
use app\models\Utente;
use app\models\UtenteSearch;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/* @var $this yii\web\View */

/**
 * LogopedistaController implements the CRUD actions for Logopedista model.
 */
class LogopedistaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Logopedista models.
     *
     * @return string
     */
    //CREAZIONE FUNZIONE PER PAGINA "Index" DOVE VENGONO VISUALIZZATI TUTTI I PAZIENTI ASSOCIATI AL LOGOPEDISTA LOGGATO
    public function actionIndex()
    {
        $searchModel = new UtenteSearch();
        //RICHIAMO FUNZIONE searchpazienti DA UTENTESEARCH
        $dataProvider = $searchModel->searchPazienti($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays a single Logopedista model.
     * @param int $idUtente Id Logopedista
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idUtente)
    {
        return $this->render('/utente/view', [
            'model' => $this->findModel($idUtente),
        ]);
    }

    /**
     * Creates a new Logopedista model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Logopedista();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idLogopedista' => $model->idLogopedista]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Logopedista model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idLogopedista Id Logopedista
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idLogopedista)
    {
        $model = $this->findModel($idLogopedista);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idLogopedista' => $model->idLogopedista]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Logopedista model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idLogopedista Id Logopedista
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idLogopedista)
    {
        $this->findModel($idLogopedista)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Logopedista model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idLogopedista Id Logopedista
     * @return Logopedista the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idLogopedista)
    {
        if (($model = Logopedista::findOne(['idLogopedista' => $idLogopedista])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



}
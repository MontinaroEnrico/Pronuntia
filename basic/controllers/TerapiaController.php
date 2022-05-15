<?php

namespace app\controllers;

use app\models\Paziente;
use app\models\Terapia;
use app\models\TerapiaSearch;
use app\models\Utente;
use app\models\UtenteSearch;
use yii\debug\models\timeline\DataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TerapiaController implements the CRUD actions for Terapia model.
 */
class TerapiaController extends Controller
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
     * Lists all Terapia models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TerapiaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Terapia model.
     * @param int $idTerapia Id Terapia
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idTerapia)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTerapia),
        ]);
    }

    /**
     * Creates a new Terapia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Terapia();
        $paziente=new Paziente();
        $pazienti=$paziente->getPazientiLogopedistalogged();
        $modelUtente=new Utente();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['/terapia-has-esercizio/create', 'Terapia_idTerapia' => $model->idTerapia]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelUtente'=>$modelUtente,
            'pazienti' =>$pazienti
        ]);
    }

    /**
     * Updates an existing Terapia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idTerapia Id Terapia
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idTerapia)
    {
        $model = $this->findModel($idTerapia);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTerapia' => $model->idTerapia]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Terapia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idTerapia Id Terapia
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idTerapia)
    {
        $this->findModel($idTerapia)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Terapia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idTerapia Id Terapia
     * @return Terapia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTerapia)
    {
        if (($model = Terapia::findOne(['idTerapia' => $idTerapia])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

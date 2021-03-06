<?php

namespace app\controllers;

use app\models\Logopedista;
use app\models\Utente;
use app\models\UtenteSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UtenteController implements the CRUD actions for Utente model.
 */
class UtenteController extends Controller
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
     * Lists all Utente models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UtenteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Utente model.
     * @param int $idUtente Id Utente
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idUtente)
    {
        return $this->render('view', [
            'model' => $this->findModel($idUtente),
        ]);
    }

    /**
     * Creates a new Utente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Utente();
        $idLogopedista=Yii::$app->user->id;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                if(Yii::$app->user->getIsGuest()){
                    Yii::$app->db->createCommand("INSERT INTO Logopedista (idLogopedista) VALUES ($model->idUtente)")
                        ->queryAll();
                }elseif ( (new Logopedista())->logopedistaLogged()){
                    Yii::$app->db->createCommand("INSERT INTO Paziente (idPaziente,idLogopedista) VALUES ($model->idUtente,$idLogopedista)")
                        ->queryAll();
                    Yii::$app->db->createCommand("INSERT INTO Classifica (idPaziente,posizione,punti) VALUES ($model->idUtente,2,10)")
                        ->queryAll();

                }
                return $this->redirect(['view', 'idUtente' => $model->idUtente]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Utente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idUtente Id Utente
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idUtente)
    {
        $model = $this->findModel($idUtente);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idUtente' => $model->idUtente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Utente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idUtente Id Utente
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idUtente)
    {
        $this->findModel($idUtente)->delete();

        return $this->redirect(['logopedista/index']);
    }

    /**
     * Finds the Utente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idUtente Id Utente
     * @return Utente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idUtente)
    {
        if (($model = Utente::findOne(['idUtente' => $idUtente])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}

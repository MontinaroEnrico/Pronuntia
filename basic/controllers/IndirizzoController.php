<?php

namespace app\controllers;

use app\models\Indirizzo;
use app\models\IndirizzoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IndirizzoController implements the CRUD actions for Indirizzo model.
 */
class IndirizzoController extends Controller
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
     * Lists all Indirizzo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new IndirizzoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Indirizzo model.
     * @param int $idIndirizzo Id Indirizzo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idIndirizzo)
    {
        return $this->render('view', [
            'model' => $this->findModel($idIndirizzo),
        ]);
    }

    /**
     * Creates a new Indirizzo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Indirizzo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idIndirizzo' => $model->idIndirizzo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Indirizzo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idIndirizzo Id Indirizzo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idIndirizzo)
    {
        $model = $this->findModel($idIndirizzo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idIndirizzo' => $model->idIndirizzo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Indirizzo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idIndirizzo Id Indirizzo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idIndirizzo)
    {
        $this->findModel($idIndirizzo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Indirizzo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idIndirizzo Id Indirizzo
     * @return Indirizzo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idIndirizzo)
    {
        if (($model = Indirizzo::findOne(['idIndirizzo' => $idIndirizzo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

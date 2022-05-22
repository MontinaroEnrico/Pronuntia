<?php

namespace app\controllers;

use app\models\Seduta;
use app\models\SedutaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SedutaController implements the CRUD actions for Seduta model.
 */
class SedutaController extends Controller
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
     * Lists all Seduta models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SedutaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Seduta model.
     * @param int $idSeduta Id Seduta
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idSeduta)
    {
        return $this->render('view', [
            'model' => $this->findModel($idSeduta),
        ]);
    }

    /**
     * Creates a new Seduta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Seduta();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idSeduta' => $model->idSeduta]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Seduta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idSeduta Id Seduta
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idSeduta)
    {
        $model = $this->findModel($idSeduta);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idSeduta' => $model->idSeduta]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Seduta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idSeduta Id Seduta
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idSeduta)
    {
        $this->findModel($idSeduta)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Seduta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idSeduta Id Seduta
     * @return Seduta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idSeduta)
    {
        if (($model = Seduta::findOne(['idSeduta' => $idSeduta])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

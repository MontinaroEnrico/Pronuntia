<?php

namespace app\controllers;

use app\models\Classifica;
use app\models\ClassificaSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClassificaController implements the CRUD actions for Classifica model.
 */
class ClassificaController extends Controller
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
     * Lists all Classifica models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ClassificaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Classifica model.
     * @param int $idClassifica Id Classifica
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {$idPaziente=Yii::$app->user->id;
        return $this->render('view', [
            'model' => $this->findModel($idPaziente),
        ]);
    }

    /**
     * Creates a new Classifica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Classifica();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idClassifica' => $model->idClassifica]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Classifica model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idClassifica Id Classifica
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idClassifica)
    {
        $model = $this->findModel($idClassifica);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idClassifica' => $model->idClassifica]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Classifica model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idClassifica Id Classifica
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idClassifica)
    {
        $this->findModel($idClassifica)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Classifica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idClassifica Id Classifica
     * @return Classifica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPaziente)
    {
        if (($model = Classifica::findOne(['idPaziente' => $idPaziente])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

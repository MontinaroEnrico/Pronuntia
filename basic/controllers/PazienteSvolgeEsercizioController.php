<?php

namespace app\controllers;

use app\models\PazienteSvolgeEsercizio;
use app\models\PazienteSvolgeEsercizioSearch;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PazienteSvolgeEsercizioController implements the CRUD actions for PazienteSvolgeEsercizio model.
 */
class PazienteSvolgeEsercizioController extends Controller
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
     * Lists all PazienteSvolgeEsercizio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $idPaziente=$request->get('idPaziente');
        $stato=$request->get('stato');
        $idEsercizio=$request->get('idEsercizio');
        if($stato==1){
            Yii::$app->db->createCommand("UPDATE Paziente_svolge_Esercizio
            SET stato='Completato',
                svolgimento='Bene'
                WHERE Paziente_idPaziente=$idPaziente AND Esercizio_idEsercizio=$idEsercizio AND stato='Da svolgere'")
                ->queryAll();
        }else if($stato==2){
            Yii::$app->db->createCommand("UPDATE Paziente_svolge_Esercizio
            SET stato='Completato',
                svolgimento='Male'
                WHERE Paziente_idPaziente='$idPaziente' AND Esercizio_idEsercizio='$idEsercizio' AND stato='Da svolgere'")
                ->queryAll();

        }

        $searchModel = new PazienteSvolgeEsercizioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PazienteSvolgeEsercizio model.
     * @param int $Paziente_idPaziente Paziente Id Paziente
     * @param int $Esercizio_idEsercizio Esercizio Id Esercizio
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Paziente_idPaziente, $Esercizio_idEsercizio)
    {
        return $this->render('view', [
            'model' => $this->findModel($Paziente_idPaziente, $Esercizio_idEsercizio),
        ]);
    }

    /**
     * Creates a new PazienteSvolgeEsercizio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PazienteSvolgeEsercizio();
        $query= new Query();
        if ($this->request->isPost) {


            if ($model->load($this->request->post()) && $model->save()) {
                $tot= $query->select('*')->from('Paziente_svolge_Esercizio')->where("Paziente_svolge_Esercizio.Esercizio_idEsercizio ='$model->Esercizio_idEsercizio'")->createCommand()->query()->count();
                $rating= $query->select('rating')->from('Paziente_svolge_Esercizio')->where("Paziente_svolge_Esercizio.Esercizio_idEsercizio='$model->Esercizio_idEsercizio'")->sum('rating');
                Yii::$app->db->createCommand()->update("Esercizio",["rating"=>($rating/$tot)],"idEsercizio='$model->Esercizio_idEsercizio'")->execute();

                return $this->redirect(['view', 'Paziente_idPaziente' => $model->Paziente_idPaziente, 'Esercizio_idEsercizio' => $model->Esercizio_idEsercizio]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PazienteSvolgeEsercizio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Paziente_idPaziente Paziente Id Paziente
     * @param int $Esercizio_idEsercizio Esercizio Id Esercizio
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Paziente_idPaziente, $Esercizio_idEsercizio)
    {
        $model = $this->findModel($Paziente_idPaziente, $Esercizio_idEsercizio);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Paziente_idPaziente' => $model->Paziente_idPaziente, 'Esercizio_idEsercizio' => $model->Esercizio_idEsercizio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PazienteSvolgeEsercizio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Paziente_idPaziente Paziente Id Paziente
     * @param int $Esercizio_idEsercizio Esercizio Id Esercizio
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Paziente_idPaziente, $Esercizio_idEsercizio)
    {
        $this->findModel($Paziente_idPaziente, $Esercizio_idEsercizio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PazienteSvolgeEsercizio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Paziente_idPaziente Paziente Id Paziente
     * @param int $Esercizio_idEsercizio Esercizio Id Esercizio
     * @return PazienteSvolgeEsercizio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Paziente_idPaziente, $Esercizio_idEsercizio)
    {
        if (($model = PazienteSvolgeEsercizio::findOne(['Paziente_idPaziente' => $Paziente_idPaziente, 'Esercizio_idEsercizio' => $Esercizio_idEsercizio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

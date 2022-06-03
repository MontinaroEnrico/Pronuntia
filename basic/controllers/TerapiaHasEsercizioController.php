<?php

namespace app\controllers;

use app\models\Esercizio;
use app\models\Paziente;
use app\models\PazienteSvolgeEsercizio;
use app\models\Terapia;
use app\models\TerapiaHasEsercizio;
use app\models\TerapiaHasEsercizioSearch;
use app\models\TerapiaSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TerapiaHasEsercizioController implements the CRUD actions for TerapiaHasEsercizio model.
 */
class TerapiaHasEsercizioController extends Controller
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
     * Lists all TerapiaHasEsercizio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TerapiaHasEsercizioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/terapiaHasEsercizio/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TerapiaHasEsercizio model.
     * @param int $Terapia_idTerapia Terapia Id Terapia
     * @param int $Esercizio_idEsercizio Esercizio Id Esercizio
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Terapia_idTerapia, $Esercizio_idEsercizio)
    {
        return $this->render('/terapiaHasEsercizio/view', [
            'model' => $this->findModel($Terapia_idTerapia, $Esercizio_idEsercizio),
        ]);
    }

    /**
     * Creates a new TerapiaHasEsercizio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TerapiaHasEsercizio();
        $modelesercizo=new Esercizio();
        $esercizi=$modelesercizo->getEserciziDisponibili();
        $paziente=new Paziente();
        $pazienti=$paziente->getPazientiAssegnaEsercizi();
        $modelPazienteSvolgeEsercizio=new PazienteSvolgeEsercizio();

        $query= new Query();

        if ($this->request->isPost) {

            if ($model->load($this->request->post()) && $model->save()) {
                $modelPazienteSvolgeEsercizio->Esercizio_idEsercizio=$model->Esercizio_idEsercizio;
               $modelTerapia= $query->select('*')->from("Terapia")->where("idTerapia='$model->Terapia_idTerapia'")->all();
               $modelPazienteSvolgeEsercizio->Paziente_idPaziente=$modelTerapia[0]['idPaziente'];
               $modelPazienteSvolgeEsercizio->idTerapia=$model->Terapia_idTerapia;
               $modelPazienteSvolgeEsercizio->stato ="Da svolgere";
               $modelPazienteSvolgeEsercizio->save();

                return $this->redirect(['/terapia-has-esercizio/create', 'Terapia_idTerapia' => $model->Terapia_idTerapia, 'Esercizio_idEsercizio' => $model->Esercizio_idEsercizio]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('/terapiaHasEsercizio/create', [
            'model' => $model,
            'esercizi'=> $esercizi,
            'pazienti'=>$pazienti

        ]);
    }

    /**
     * Updates an existing TerapiaHasEsercizio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Terapia_idTerapia Terapia Id Terapia
     * @param int $Esercizio_idEsercizio Esercizio Id Esercizio
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Terapia_idTerapia, $Esercizio_idEsercizio)
    {
        $model = $this->findModel($Terapia_idTerapia, $Esercizio_idEsercizio);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Terapia_idTerapia' => $model->Terapia_idTerapia, 'Esercizio_idEsercizio' => $model->Esercizio_idEsercizio]);
        }

        return $this->render('/terapiaHasEsercizio/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TerapiaHasEsercizio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Terapia_idTerapia Terapia Id Terapia
     * @param int $Esercizio_idEsercizio Esercizio Id Esercizio
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Terapia_idTerapia, $Esercizio_idEsercizio)
    {
        $this->findModel($Terapia_idTerapia, $Esercizio_idEsercizio)->delete();

        return $this->redirect(['/terapiaHasEsercizio/index']);
    }

    /**
     * Finds the TerapiaHasEsercizio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Terapia_idTerapia Terapia Id Terapia
     * @param int $Esercizio_idEsercizio Esercizio Id Esercizio
     * @return TerapiaHasEsercizio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Terapia_idTerapia, $Esercizio_idEsercizio)
    {
        if (($model = TerapiaHasEsercizio::findOne(['Terapia_idTerapia' => $Terapia_idTerapia, 'Esercizio_idEsercizio' => $Esercizio_idEsercizio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

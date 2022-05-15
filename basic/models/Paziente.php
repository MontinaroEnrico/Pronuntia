<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "Paziente".
 *
 * @property int $idPaziente
 * @property int|null $idCaregiver
 * @property int $idLogopedista
 * @property int|null $idQuestionario
 *
 * @property Classifica[] $classificas
 * @property Esercizio[] $esercizioIdEsercizios
 * @property Caregiver $idCaregiver0
 * @property Logopedista $idLogopedista0
 * @property Utente $idPaziente0
 * @property Questionario $idQuestionario0
 * @property PazienteSvolgeEsercizio[] $pazienteSvolgeEsercizios
 */
class Paziente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Paziente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPaziente', 'idLogopedista'], 'required'],
            [['idPaziente', 'idCaregiver', 'idLogopedista', 'idQuestionario'], 'integer'],
            [['idPaziente'], 'unique'],
            [['idCaregiver'], 'exist', 'skipOnError' => true, 'targetClass' => Caregiver::className(), 'targetAttribute' => ['idCaregiver' => 'idCaregiver']],
            [['idLogopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedista::className(), 'targetAttribute' => ['idLogopedista' => 'idLogopedista']],
            [['idQuestionario'], 'exist', 'skipOnError' => true, 'targetClass' => Questionario::className(), 'targetAttribute' => ['idQuestionario' => 'idQuestionario']],
            [['idPaziente'], 'exist', 'skipOnError' => true, 'targetClass' => Utente::className(), 'targetAttribute' => ['idPaziente' => 'idUtente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPaziente' => 'Id Paziente',
            'idCaregiver' => 'Id Caregiver',
            'idLogopedista' => 'Id Logopedista',
            'idQuestionario' => 'Id Questionario',
        ];
    }

    /**
     * Gets query for [[Classificas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClassificas()
    {
        return $this->hasMany(Classifica::className(), ['idPaziente' => 'idPaziente']);
    }

    /**
     * Gets query for [[EsercizioIdEsercizios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEsercizioIdEsercizios()
    {
        return $this->hasMany(Esercizio::className(), ['idEsercizio' => 'Esercizio_idEsercizio'])->viaTable('Paziente_svolge_Esercizio', ['Paziente_idPaziente' => 'idPaziente']);
    }

    /**
     * Gets query for [[IdCaregiver0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCaregiver0()
    {
        return $this->hasOne(Caregiver::className(), ['idCaregiver' => 'idCaregiver']);
    }

    /**
     * Gets query for [[IdLogopedista0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdLogopedista0()
    {
        return $this->hasOne(Logopedista::className(), ['idLogopedista' => 'idLogopedista']);
    }

    /**
     * Gets query for [[IdPaziente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdPaziente0()
    {
        return $this->hasOne(Utente::className(), ['idUtente' => 'idPaziente']);
    }

    /**
     * Gets query for [[IdQuestionario0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdQuestionario0()
    {
        return $this->hasOne(Questionario::className(), ['idQuestionario' => 'idQuestionario']);
    }

    /**
     * Gets query for [[PazienteSvolgeEsercizios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPazienteSvolgeEsercizios()
    {
        return $this->hasMany(PazienteSvolgeEsercizio::className(), ['Paziente_idPaziente' => 'idPaziente']);
    }


    public function pazienteLogged()
    {
        $query = new Query;
        $idPazienti = $query->select('idPaziente')
            ->from('Paziente')
            ->all();

        foreach ($idPazienti as $id) {
            if ($id['idPaziente'] == Yii::$app->user->id) {
                return true;
            }
        }
    }

    public function getPazientiLogopedistalogged(){
        $query = new Query;

        $pazienti = $query->select('*')
            ->from('Paziente')
            ->join('Join','Utente','Paziente.idPaziente=Utente.idUtente')
            ->where(['idLogopedista' => Yii::$app->user->id])
            ->all();
        /*
        $logopedista=Yii::$app->user->id;
       $pazienti= $query->select('email,idTerapia')->from('Paziente')
           ->join("join","Terapia","Paziente.idPaziente=Terapia.idPaziente")
           ->join(" join","Utente","Utente.idUtente=Paziente.idPaziente")
           ->where("Paziente.idLogopedista='$logopedista'")->groupBy('email,idTerapia')->all();
*/
        return $pazienti;
    }
    public function getPazientiAssegnaEsercizi(){
        $query = new Query;
        $logopedista=Yii::$app->user->id;
       $pazienti= $query->select('email,idTerapia')->from('Paziente')
           ->join("join","Terapia","Paziente.idPaziente=Terapia.idPaziente")
           ->join(" join","Utente","Utente.idUtente=Paziente.idPaziente")
           ->where("Paziente.idLogopedista='$logopedista'")->all();

        return $pazienti;
    }

}

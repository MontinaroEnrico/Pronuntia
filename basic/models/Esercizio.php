<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "Esercizio".
 *
 * @property int $idEsercizio
 * @property string|null $tipologia
 * @property int $Logopedista_idLogopedista
 * @property string|null $nomeEsercizio
 * @property string|null $Domanda
 * @property string|null $Risposta
 * @property float|null $rating
 * @property string $file
 * @property string $link
 * @property Logopedista $logopedistaIdLogopedista
 * @property Paziente[] $pazienteIdPazientes
 * @property PazienteSvolgeEsercizio[] $pazienteSvolgeEsercizios
 * @property TerapiaHasEsercizio[] $terapiaHasEsercizios
 * @property Terapia[] $terapiaIdTerapias

 */
class Esercizio extends \yii\db\ActiveRecord
{
    /**
     * @var mixed|string|null
     */
    public $nomeFile;

    /**
     * {@inheritdoc}
     */


    public static function tableName()
    {
        return 'Esercizio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Logopedista_idLogopedista'], 'required'],
            [['nomeEsercizio'], 'required'],
            [['Logopedista_idLogopedista'], 'integer'],
            [['tipologia', 'Risposta','nomeEsercizio'], 'string', 'max' => 45],
            [['Domanda'], 'string', 'max' => 300],
            [['Logopedista_idLogopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedista::className(), 'targetAttribute' => ['Logopedista_idLogopedista' => 'idLogopedista']],
            [['file'], 'file'],
            [['rating','link'],'string'],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idEsercizio' => 'Id Esercizio',
            'tipologia' => 'Tipologia',
            'Logopedista_idLogopedista' => 'Logopedista Id Logopedista',
            'Domanda' => 'Domanda',
            'Risposta' => 'Risposta',
            'nomeEsercizio'=>'Nome Esercizio',
            'file'=>'File',
            'rating'=>'Rating',
            'link'=>'Esercizio',
        ];
    }

    /**
     * Gets query for [[LogopedistaIdLogopedista]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogopedistaIdLogopedista()
    {
        return $this->hasOne(Logopedista::className(), ['idLogopedista' => 'Logopedista_idLogopedista']);
    }

    /**
     * Gets query for [[PazienteIdPazientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPazienteIdPazientes()
    {
        return $this->hasMany(Paziente::className(), ['idPaziente' => 'Paziente_idPaziente'])->viaTable('Paziente_svolge_Esercizio', ['Esercizio_idEsercizio' => 'idEsercizio']);
    }

    /**
     * Gets query for [[PazienteSvolgeEsercizios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPazienteSvolgeEsercizios()
    {
        return $this->hasMany(PazienteSvolgeEsercizio::className(), ['Esercizio_idEsercizio' => 'idEsercizio']);
    }

    /**
     * Gets query for [[TerapiaHasEsercizios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTerapiaHasEsercizios()
    {
        return $this->hasMany(TerapiaHasEsercizio::className(), ['Esercizio_idEsercizio' => 'idEsercizio']);
    }

    /**
     * Gets query for [[TerapiaIdTerapias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTerapiaIdTerapias()
    {
        return $this->hasMany(Terapia::className(), ['idTerapia' => 'Terapia_idTerapia'])->viaTable('Terapia_has_Esercizio', ['Esercizio_idEsercizio' => 'idEsercizio']);
    }
    public function getEserciziDisponibili(){
        $query = new Query;

        $logopedista=Yii::$app->user->id;
        $esercizi= $query->select('idEsercizio,nomeEsercizio')->from('Esercizio')
            ->where("Esercizio.Logopedista_idLogopedista='$logopedista'")
            ->orWhere(['Esercizio.Logopedista_idLogopedista' => null])->all();
        return $esercizi;
    }
    public function upload()
    {
            $this->file->saveAs($this->file->baseName .'.' . $this->file->extension);
            return true;


    }
}

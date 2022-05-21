<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "Terapia".
 *
 * @property int $idTerapia
 * @property int $idPaziente
 * @property int $idLogopedista
 * @property string $dataInizio
 * @property string $dataFine
 * @property Esercizio[] $esercizioIdEsercizios
 * @property TerapiaHasEsercizio[] $terapiaHasEsercizios
 * @property string $email
 */
class Terapia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Terapia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTerapia'], 'integer'],
            [['idTerapia'], 'unique'],
            [['idPaziente'], 'integer'],
            [['idLogopedista'], 'integer'],
            [['email'], 'string'],
            [['dataInizio'], 'safe'],
            [['dataFine'], 'safe'],


        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTerapia' => 'Id Terapia',
            'idPaziente'=> 'Paziente',
            'idLogopedista'=>'Logopedista',
            'dataInizio' => 'Data Inizio',
            'dataFine' => 'Data Fine',
            'email' => 'Email'
        ];
    }

    /**
     * Gets query for [[EsercizioIdEsercizios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEsercizioIdEsercizios()
    {
        return $this->hasMany(Esercizio::className(), ['idEsercizio' => 'Esercizio_idEsercizio'])->viaTable('Terapia_has_Esercizio', ['Terapia_idTerapia' => 'idTerapia']);
    }

    /**
     * Gets query for [[TerapiaHasEsercizios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTerapiaHasEsercizios()
    {
        return $this->hasMany(TerapiaHasEsercizio::className(), ['Terapia_idTerapia' => 'idTerapia']);
    }

}

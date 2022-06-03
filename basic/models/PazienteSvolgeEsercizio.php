<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Paziente_svolge_Esercizio".
 *
 * @property int $idSvolgimento
 * @property int $idTerapia
 * @property int $Paziente_idPaziente
 * @property int $Esercizio_idEsercizio
 * @property string|null $risposta
 * @property string|null $rating
 * @property string|null $stato
 * @property string|null $svolgimento
 * @property Esercizio $esercizioIdEsercizio
 * @property Paziente $pazienteIdPaziente
 */
class PazienteSvolgeEsercizio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Paziente_svolge_Esercizio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Paziente_idPaziente', 'Esercizio_idEsercizio'], 'required'],
            [['Paziente_idPaziente', 'Esercizio_idEsercizio'], 'integer'],
            [['risposta', 'rating','stato'], 'string', 'max' => 45],
            [['Esercizio_idEsercizio'], 'exist', 'skipOnError' => true, 'targetClass' => Esercizio::className(), 'targetAttribute' => ['Esercizio_idEsercizio' => 'idEsercizio']],
            [['Paziente_idPaziente'], 'exist', 'skipOnError' => true, 'targetClass' => Paziente::className(), 'targetAttribute' => ['Paziente_idPaziente' => 'idPaziente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSvolgimento'=>'idSvolgimento',
            'Paziente_idPaziente' => 'Paziente Id Paziente',
            'Esercizio_idEsercizio' => 'Esercizio Id Esercizio',
            'risposta' => 'Risposta',
            'rating' => 'Rating',
            'stato'=>'Stato',
            'svolgimento'=>'Come è stato svolto?',
        ];
    }

    /**
     * Gets query for [[EsercizioIdEsercizio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEsercizioIdEsercizio()
    {
        return $this->hasOne(Esercizio::className(), ['idEsercizio' => 'Esercizio_idEsercizio']);
    }

    /**
     * Gets query for [[PazienteIdPaziente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPazienteIdPaziente()
    {
        return $this->hasOne(Paziente::className(), ['idPaziente' => 'Paziente_idPaziente']);
    }
}

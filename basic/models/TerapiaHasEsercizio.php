<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Terapia_has_Esercizio".
 *
 * @property String $Terapia_idTerapia
 * @property String[] $Esercizio_idEsercizio
 *
 * @property Esercizio $esercizioIdEsercizio
 * @property Terapia $terapiaIdTerapia
 */
class TerapiaHasEsercizio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Terapia_has_Esercizio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Terapia_idTerapia', 'Esercizio_idEsercizio'], 'required'],
            [['Terapia_idTerapia'], 'string'],
            [['Esercizio_idEsercizio'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Terapia_idTerapia' => 'Paziente',
            'Esercizio_idEsercizio' => 'Nome Esercizio',
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
     * Gets query for [[TerapiaIdTerapia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTerapiaIdTerapia()
    {
        return $this->hasOne(Terapia::className(), ['idTerapia' => 'Terapia_idTerapia']);
    }
}

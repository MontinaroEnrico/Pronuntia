<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Esercizio".
 *
 * @property int $idEsercizio
 * @property string|null $tipologia
 * @property int $Logopedista_idLogopedista
 * @property string|null $Domanda
 * @property string|null $Risposta
 *
 * @property Logopedista $logopedistaIdLogopedista
 * @property Paziente[] $pazienteIdPazientes
 * @property PazienteSvolgeEsercizio[] $pazienteSvolgeEsercizios
 */
class Esercizio extends \yii\db\ActiveRecord
{
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
            [['Logopedista_idLogopedista'], 'integer'],
            [['tipologia', 'Risposta'], 'string', 'max' => 45],
            [['Domanda'], 'string', 'max' => 300],
            [['Logopedista_idLogopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedista::className(), 'targetAttribute' => ['Logopedista_idLogopedista' => 'idLogopedista']],
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
}

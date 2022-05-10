<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Indirizzo".
 *
 * @property int $idIndirizzo
 * @property string $citta
 * @property string $provincia
 * @property string $via
 * @property int $numeroCivico
 * @property int $cap
 *
 * @property Utente[] $utentes
 */
class Indirizzo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Indirizzo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['citta', 'provincia', 'via', 'numeroCivico', 'cap'], 'required'],
            [['numeroCivico', 'cap'], 'integer'],
            [['citta', 'provincia', 'via'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idIndirizzo' => 'Id Indirizzo',
            'citta' => 'Citta',
            'provincia' => 'Provincia',
            'via' => 'Via',
            'numeroCivico' => 'Numero Civico',
            'cap' => 'Cap',
        ];
    }

    /**
     * Gets query for [[Utentes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUtentes()
    {
        return $this->hasMany(Utente::className(), ['idIndirizzo' => 'idIndirizzo']);
    }
}

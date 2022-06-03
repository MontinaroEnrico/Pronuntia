<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Classifica".
 *
 * @property int $idClassifica
 * @property int $idPaziente
 * @property int|null $posizione
 * @property string|null $punti
 *
 * @property Paziente $idPaziente0
 */
class Classifica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Classifica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPaziente'], 'required'],
            [['idPaziente', 'posizione'], 'integer'],
            [['punti'], 'string', 'max' => 45],
            [['idPaziente'], 'exist', 'skipOnError' => true, 'targetClass' => Paziente::className(), 'targetAttribute' => ['idPaziente' => 'idPaziente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idClassifica' => 'Id Classifica',
            'idPaziente' => 'Id Paziente',
            'posizione' => 'Posizione',
            'punti' => 'Punti',
        ];
    }

    /**
     * Gets query for [[IdPaziente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdPaziente0()
    {
        return $this->hasOne(Paziente::className(), ['idPaziente' => 'idPaziente']);
    }
}

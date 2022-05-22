<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Seduta".
 *
 * @property int $idSeduta
 * @property int $idPaziente
 * @property int $Logopedista_idLogopedista
 * @property string $data
 * @property string $ora
 * @property string $stato
 *
 * @property Paziente $idPaziente0
 * @property Logopedista $logopedistaIdLogopedista
 */
class Seduta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Seduta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPaziente', 'Logopedista_idLogopedista', 'stato'], 'required'],
            [['idPaziente', 'Logopedista_idLogopedista'], 'integer'],
            [['ora'], 'safe'],
            [['data'], 'string', 'max' => 11],
            [['stato'], 'string', 'max' => 45],
            [['Logopedista_idLogopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedista::className(), 'targetAttribute' => ['Logopedista_idLogopedista' => 'idLogopedista']],
            [['idPaziente'], 'exist', 'skipOnError' => true, 'targetClass' => Paziente::className(), 'targetAttribute' => ['idPaziente' => 'idPaziente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSeduta' => 'Id Seduta',
            'idPaziente' => 'Id Paziente',
            'Logopedista_idLogopedista' => 'Logopedista Id Logopedista',
            'data' => 'Data',
            'ora' => 'Ora',
            'stato' => 'Stato',
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

    /**
     * Gets query for [[LogopedistaIdLogopedista]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogopedistaIdLogopedista()
    {
        return $this->hasOne(Logopedista::className(), ['idLogopedista' => 'Logopedista_idLogopedista']);
    }
}

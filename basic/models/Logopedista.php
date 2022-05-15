<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "Logopedista".
 *
 * @property int $idLogopedista
 *
 * @property Esercizio[] $esercizios
 * @property Utente $idLogopedista0
 * @property Paziente[] $pazientes
 * @property Questionario[] $questionarios
 * @property Seduta[] $sedutas
 */
class Logopedista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Logopedista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLogopedista'], 'required'],
            [['idLogopedista'], 'integer'],
            [['idLogopedista'], 'unique'],
            [['idLogopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Utente::className(), 'targetAttribute' => ['idLogopedista' => 'idUtente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLogopedista' => 'Id Logopedista',
        ];
    }

    /**
     * Gets query for [[Esercizios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEsercizios()
    {
        return $this->hasMany(Esercizio::className(), ['Logopedista_idLogopedista' => 'idLogopedista']);
    }

    /**
     * Gets query for [[IdLogopedista0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdLogopedista0()
    {
        return $this->hasOne(Utente::className(), ['idUtente' => 'idLogopedista']);
    }

    /**
     * Gets query for [[Pazientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPazientes()
    {
        return $this->hasMany(Paziente::className(), ['idLogopedista' => 'idLogopedista']);
    }

    /**
     * Gets query for [[Questionarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionarios()
    {
        return $this->hasMany(Questionario::className(), ['idLogopedista' => 'idLogopedista']);
    }

    /**
     * Gets query for [[Sedutas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSedutas()
    {
        return $this->hasMany(Seduta::className(), ['Logopedista_idLogopedista' => 'idLogopedista']);
    }

    public function logopedistaLogged()
    {
        $query = new Query;
        $idLogopedisti = $query->select('idLogopedista')
            ->from('Logopedista')
            ->all();

        foreach ($idLogopedisti as $id) {
            if ($id['idLogopedista'] == Yii::$app->user->id) {
                return true;
            }
        }
    }


}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Utente".
 *
 * @property int $idUtente
 * @property string $nome
 * @property string $cognome
 * @property string $email
 * @property string $dataDiNascita
 * @property string $luogoDiNascita
 * @property string $codiceFiscale
 * @property string $password
 * @property int $numeroTelefono
 * @property int $idIndirizzo
 * @property int $authKey
 *
 * @property Caregiver $caregiver
 * @property Indirizzo $idIndirizzo0
 * @property Logopedista $logopedista
 * @property Paziente $paziente
 */

class Utente extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const WEAK = 0;
    const STRONG = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Utente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cognome', 'email', 'dataDiNascita', 'luogoDiNascita', 'codiceFiscale', 'password', 'numeroTelefono', 'idIndirizzo', 'authKey'], 'required'],
            [['dataDiNascita'], 'safe'],
            [['numeroTelefono', 'idIndirizzo', 'authKey'], 'integer'],
            [['nome', 'cognome', 'email', 'luogoDiNascita', 'codiceFiscale', 'password'], 'string', 'max' => 45],
            [['idIndirizzo'], 'exist', 'skipOnError' => true, 'targetClass' => Indirizzo::className(), 'targetAttribute' => ['idIndirizzo' => 'idIndirizzo']],
            [['password'], 'match', 'pattern' => '$\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', 'message' => 'Password must have atleast 1 uppercase and 1 number '],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUtente' => 'Id Utente',
            'nome' => 'Nome',
            'cognome' => 'Cognome',
            'email' => 'Email',
            'dataDiNascita' => 'Data Di Nascita',
            'luogoDiNascita' => 'Luogo Di Nascita',
            'codiceFiscale' => 'Codice Fiscale',
            'password' => 'Password',
            'numeroTelefono' => 'Numero Telefono',
            'idIndirizzo' => 'Id Indirizzo',
            'authKey' => 'Auth Key',
        ];
    }

    /**
     * Gets query for [[Caregiver]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaregiver()
    {
        return $this->hasOne(Caregiver::className(), ['idCaregiver' => 'idUtente']);
    }

    /**
     * Gets query for [[IdIndirizzo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdIndirizzo0()
    {
        return $this->hasOne(Indirizzo::className(), ['idIndirizzo' => 'idIndirizzo']);
    }

    /**
     * Gets query for [[Logopedista]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogopedista()
    {
        return $this->hasOne(Logopedista::className(), ['idLogopedista' => 'idUtente']);
    }

    /**
     * Gets query for [[Paziente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaziente()
    {
        return $this->hasOne(Paziente::className(), ['idPaziente' => 'idUtente']);
    }
    public function getAuthKey() {
        return $this->authKey;
    }

    public function getId() {
        return $this->idUtente;
    }

    public function validateAuthKey($authKey) {
        return $this->authKey = $authKey;
    }

    public static function findIdentity($id) {

        return self::findOne($id);

    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return self::findOne(['access_token'=>$token]);      }

    public static function findByUsername($email){
        return self::findOne(['email'=>$email]);
    }

    public function validatePassword($password){
        return $this->password === $password;
    }
}

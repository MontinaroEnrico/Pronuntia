<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Utente;
use yii\db\Query;

/**
 * UtenteSearch represents the model behind the search form of `app\models\Utente`.
 */
class UtenteSearch extends Utente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUtente', 'numeroTelefono', 'idIndirizzo', 'authKey'], 'integer'],
            [['nome', 'cognome', 'email', 'dataDiNascita', 'luogoDiNascita', 'codiceFiscale', 'password'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Utente::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idUtente' => $this->idUtente,
            'dataDiNascita' => $this->dataDiNascita,
            'numeroTelefono' => $this->numeroTelefono,
            'idIndirizzo' => $this->idIndirizzo,
            'authKey' => $this->authKey,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cognome', $this->cognome])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'luogoDiNascita', $this->luogoDiNascita])
            ->andFilterWhere(['like', 'codiceFiscale', $this->codiceFiscale])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }





    //CREAZIONE FUNZIONE PER PAGINA "Pazienti" DOVE VENGONO RICERCATI TUTTI I PAZIENTI ASSOCIATI AL LOGOPEDISTA LOGGATO
    public function searchPazienti($params)
    {  $logopedista=Yii::$app->user->id;

       $query = Utente::find()->select('*')->from('Utente')->join("JOIN","Paziente","Utente.idUtente=Paziente.idPaziente")
           ->where("Paziente.idLogopedista='$logopedista'");

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idUtente' => $this->idUtente,
            'dataDiNascita' => $this->dataDiNascita,
            'numeroTelefono' => $this->numeroTelefono,
            'idIndirizzo' => $this->idIndirizzo,
            'authKey' => $this->authKey,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cognome', $this->cognome])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'luogoDiNascita', $this->luogoDiNascita])
            ->andFilterWhere(['like', 'codiceFiscale', $this->codiceFiscale])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }

}

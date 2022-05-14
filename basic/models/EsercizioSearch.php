<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Esercizio;

/**
 * EsercizioSearch represents the model behind the search form of `app\models\Esercizio`.
 */
class EsercizioSearch extends Esercizio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idEsercizio', 'Logopedista_idLogopedista'], 'integer'],
            [['tipologia', 'Domanda', 'Risposta'], 'safe'],
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
        $query = Esercizio::find();

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
            'idEsercizio' => $this->idEsercizio,
            'Logopedista_idLogopedista' => $this->Logopedista_idLogopedista,
        ]);

        $query->andFilterWhere(['like', 'tipologia', $this->tipologia])
            ->andFilterWhere(['like', 'Domanda', $this->Domanda])
            ->andFilterWhere(['like', 'Risposta', $this->Risposta]);

        return $dataProvider;
    }
}

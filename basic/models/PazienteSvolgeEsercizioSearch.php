<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PazienteSvolgeEsercizio;

/**
 * PazienteSvolgeEsercizioSearch represents the model behind the search form of `app\models\PazienteSvolgeEsercizio`.
 */
class PazienteSvolgeEsercizioSearch extends PazienteSvolgeEsercizio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Paziente_idPaziente', 'Esercizio_idEsercizio'], 'integer'],
            [['risposta', 'rating'], 'safe'],
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
    {      $utenteLog=Yii::$app->user->id;
        $query = PazienteSvolgeEsercizio::find()->select('*')->from('Paziente_svolge_Esercizio')
        ->where("Paziente_svolge_Esercizio.Paziente_idPaziente='$utenteLog' AND Paziente_svolge_Esercizio.stato='Da svolgere'");;

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
            'Paziente_idPaziente' => $this->Paziente_idPaziente,
            'Esercizio_idEsercizio' => $this->Esercizio_idEsercizio,
        ]);

        $query->andFilterWhere(['like', 'risposta', $this->risposta])
            ->andFilterWhere(['like', 'rating', $this->rating]);

        return $dataProvider;
    }
}

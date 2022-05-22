<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Seduta;

/**
 * SedutaSearch represents the model behind the search form of `app\models\Seduta`.
 */
class SedutaSearch extends Seduta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idSeduta', 'idPaziente', 'Logopedista_idLogopedista'], 'integer'],
            [['data', 'ora', 'stato'], 'safe'],
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
    {   $userLog=Yii::$app->user->id;
        $query = Seduta::find()->select('*')->from('Seduta')

                ->where("Logopedista_idLogopedista='$userLog' OR idPaziente='$userLog'");
        ;

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
            'idSeduta' => $this->idSeduta,
            'idPaziente' => $this->idPaziente,
            'Logopedista_idLogopedista' => $this->Logopedista_idLogopedista,
            'ora' => $this->ora,
        ]);

        $query->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'stato', $this->stato]);

        return $dataProvider;
    }
}

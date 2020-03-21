<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Uomo;

/**
 * UomoSearch represents the model behind the search form of `app\models\Uomo`.
 */
class UomoSearch extends Uomo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
            [['id', 'congregazione_id', 'pioniere', 'oratore'], 'integer'],
            [['cognome', 'nome','nomina', 'telefono1', 'telefono2', 'email', 'email_jw'], 'safe'],
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
        $query = Uomo::find()
        	->with('account');

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
            'congregazione_id' => $this->congregazione_id,
            'pioniere' => $this->pioniere,
            'oratore' => $this->oratore,
        ]);

        $query->andFilterWhere(['like', 'nomina', $this->nomina])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cognome', $this->cognome])
            ->andFilterWhere(['like', 'telefono1', $this->telefono1])
            ->andFilterWhere(['like', 'telefono2', $this->telefono2])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'email_jw', $this->email_jw]);

        return $dataProvider;
    }
}

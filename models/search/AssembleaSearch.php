<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Assemblea;

/**
 * AssembleaSearch represents the model behind the search form of `app\models\Assemblea`.
 */
class AssembleaSearch extends Assemblea
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'n_presenti', 'n_battezzati'], 'integer'],
            [['tema', 'tema_ro', 'data', 'luogo', 'tipologia'], 'safe'],
            [['contribuzioni'], 'number'],
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
        $query = Assemblea::find()
                    ->with('rapporti');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['data'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'data' => $this->data,
            'n_presenti' => $this->n_presenti,
            'n_battezzati' => $this->n_battezzati,
            'contribuzioni' => $this->contribuzioni,
        ]);

        $query->andFilterWhere(['like', 'tema', $this->tema])
            ->andFilterWhere(['like', 'tema_ro', $this->tema_ro])
            ->andFilterWhere(['like', 'luogo', $this->luogo])
            ->andFilterWhere(['like', 'tipologia', $this->tipologia]);

        return $dataProvider;
    }
}

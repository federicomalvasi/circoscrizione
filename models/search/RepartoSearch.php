<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reparto;

/**
 * RepartoSearch represents the model behind the search form of `app\models\Reparto`.
 */
class RepartoSearch extends Reparto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'stima_n_uomini'], 'integer'],
            [['nome', 'nome_ro'], 'safe'],
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
        $query = Reparto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['is_hide'=>SORT_DESC, 'nome' => SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->andFilterWhere(['is_hide' => 0]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'stima_n_uomini' => $this->stima_n_uomini,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'nome_ro', $this->nome_ro]);

        return $dataProvider;
    }
}

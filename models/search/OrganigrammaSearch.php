<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Organigramma;

/**
 * OrganigrammaSearch represents the model behind the search form of `app\models\Organigramma`.
 */
class OrganigrammaSearch extends Organigramma
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'uomo_id', 'reparto_id'], 'integer'],
            [['ruolo', 'reparto'], 'safe'],
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
        $query = Organigramma::find()
        		->joinWith(['reparto', 'uomo'])
        	;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['reparto' => SORT_ASC,'ruolo' => SORT_DESC]]
        ]);
        
        $dataProvider->sort->attributes['reparto'] = [
            'asc' => ['reparti.nome' => SORT_ASC],
            'desc' => ['reparti.nome' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'uomo_id' => $this->uomo_id,
            'reparto_id' => $this->reparto_id,
        ]);

        $query->andFilterWhere(['like', 'ruolo', $this->ruolo]);

        return $dataProvider;
    }
}

<?php

namespace app\models\search;

use app\models\Oratore;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * OratoreSearch represents the model behind the search form of `app\models\Oratore`.
 */
class OratoreSearch extends Oratore
{

    public $schema_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['congregazione_id', 'pioniere', 'oratore'], 'integer'],
            [['cognome', 'nome'], 'string'],
        	[['nomina', 'telefono1', 'telefono2', 'email', 'email_jw', 'schema_id'], 'safe'],
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
        $this->load($params);

        $query = null;
        if ($this->schema_id) {
            $query = Oratore::find()
                ->joinWith('congregazione')
                ->innerJoin('oratori_schemi', "oratori_schemi.oratore_id = uomini.id")
                ->innerJoin('schemi', "oratori_schemi.schema_id = schemi.id")
                ->with('schemi')
                ->orderBy('congregazioni.nome,uomini.cognome,uomini.nome')
            ;
        }else {
            $query = Oratore::find()
                ->joinWith('congregazione')
                ->with('schemi')
                ->orderBy('congregazioni.nome,uomini.cognome,uomini.nome')
            ;

        }

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 50],
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        if ($this->schema_id) {
            $query->andFilterWhere([
                'id' => $this->id,
                'congregazione_id' => $this->congregazione_id,
                'pioniere' => $this->pioniere,
                'oratore' => $this->oratore,
                'schemi.id' => $this->schema_id,
            ]);
        }else {
            $query->andFilterWhere([
                'id' => $this->id,
                'congregazione_id' => $this->congregazione_id,
                'pioniere' => $this->pioniere,
                'oratore' => $this->oratore,
            ]);
        }

        $query->andFilterWhere(['like', 'nomina', $this->nomina])
            ->andFilterWhere(['like', 'uomini.cognome', $this->cognome])
            ->andFilterWhere(['like', 'uomini.nome', $this->nome])
            ;
            /*->andFilterWhere(['like', 'telefono1', $this->telefono1])
            ->andFilterWhere(['like', 'telefono2', $this->telefono2])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'email_jw', $this->email_jw])*/

        return $dataProvider;
    }
}

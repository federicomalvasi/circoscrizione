<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Oratore;

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

        /*$query = Oratore::find()
            ->joinWith('congregazione')
            ->with('schemi')
            ->orderBy('congregazioni.nome,uomini.cognome,uomini.nome')
        ;*/

        $query = Oratore::find()
            ->joinWith('congregazione')
            ->innerJoin('oratori_schemi', "oratori_schemi.oratore_id = uomini.id")
            ->innerJoin('schemi', "oratori_schemi.schema_id = schemi.id")
            ->with('schemi')
            ->orderBy('congregazioni.nome,uomini.cognome,uomini.nome')
        ;


        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /*
        $dataProvider->sort->attributes['congregazione'] = [
        		// The tables are the ones our relation are configured to
        		// in my case they are prefixed with "tbl_"
        		'asc' => ['congregazioni.nome' => SORT_ASC],
        		'desc' => ['congregazioni.name' => SORT_DESC],
        ];
        */
        
        //$dataProvider->sort->defaultOrder = ['congregazioni.nome' => SORT_ASC];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'congregazione_id' => $this->congregazione_id,
            'pioniere' => $this->pioniere,
            'oratore' => $this->oratore,
            'schemi.id' => $this->schema_id,
        ]);

        $query->andFilterWhere(['like', 'nomina', $this->nomina])
            ->andFilterWhere(['like', 'cognome', $this->cognome])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'telefono1', $this->telefono1])
            ->andFilterWhere(['like', 'telefono2', $this->telefono2])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'email_jw', $this->email_jw]);

        return $dataProvider;
    }
}

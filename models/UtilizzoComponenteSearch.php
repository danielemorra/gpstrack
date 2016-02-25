<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UtilizzoComponente;

/**
 * UtilizzoComponenteSearch represents the model behind the search form about `app\models\UtilizzoComponente`.
 */
class UtilizzoComponenteSearch extends UtilizzoComponente
{
	public $utcComponente; /*dm9*/
	public $utcMezzo; /*dm9*/
	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['utc_id', 'utc_componente_id', 'utc_qta_utilizzo', 'utc_mezzo_id'], 'integer'],
            [['utc_data_montaggio', 'utc_data_smontaggio', 'utcComponente', 'utcMezzo'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = UtilizzoComponente::find();

        $query->joinWith(['utcComponente', 'utcMezzo']);	/*dm9*/
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /*dm9*inizio*/
        $dataProvider->sort->attributes['utcComponente'] = [
        		'asc' => ['utcComponente.cmp_componente' => SORT_ASC],
        		'desc' => ['utcComponente.cmp_componente' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['utcMezzo'] = [
        		'asc' => ['utcMezzo.cmp_componente' => SORT_ASC],
        		'desc' => ['utcMezzo.cmp_componente' => SORT_DESC],
        ];
        /*dm9*fine*/
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'utc_id' => $this->utc_id,
//*dm9*     'utc_componente_id' => $this->utc_componente_id,
//*dm9*    	'utc_mezzo_id' => $this->utc_mezzo_id,
            'utc_qta_utilizzo' => $this->utc_qta_utilizzo,
            'utc_data_montaggio' => $this->utc_data_montaggio,
            'utc_data_smontaggio' => $this->utc_data_smontaggio,
        ]);
        $query->andFilterWhere(['like', 'componenti.cmp_componente', $this->utcComponente]);		/*dm9*/
        $query->andFilterWhere(['like', 'mezzo_trasporto.mzt_mezzo_trasporto', $this->utcMezzo]);		/*dm9*/
        
        return $dataProvider;
    }
}

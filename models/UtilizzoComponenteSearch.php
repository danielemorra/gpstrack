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
	public $utcComponente;      /*model property*/
	public $utcMezzo;           /*model property*/
	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'utc_id', 
                    'utc_componente_id', 
                    'utc_qta_utilizzo', 
                    'utc_mezzo_id'
                ], 'integer'],
            [
                [
                    'utc_data_montaggio', 
                    'utc_data_smontaggio', 
                    'utcComponente', 
                    'utcMezzo',
                    'utc_note'
                ], 'safe'],
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

        $query->joinWith(['utcComponente', 'utcMezzo']);	/*nome relazione*/
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['utcComponente'] = [                /*model property*/
        		'asc' => ['componenti.cmp_componente' => SORT_ASC],         /*nome tabella.nome campo*/
        		'desc' => ['componenti.cmp_componente' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['utcMezzo'] = [                         /*model property*/
                'asc' => ['mezzo_trasporto.mzt_mezzo_trasporto' => SORT_ASC],    /*nome tabella.nome campo*/
        		'desc' => ['mezzo_trasporto.mzt_mezzo_trasporto' => SORT_DESC],
        ];
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'utc_id' => $this->utc_id,
            'utc_qta_utilizzo' => $this->utc_qta_utilizzo,
            'utc_data_montaggio' => $this->utc_data_montaggio,
            'utc_data_smontaggio' => $this->utc_data_smontaggio,
        ]);
        $query->andFilterWhere(['like', 'componenti.cmp_componente', $this->utcComponente]);		/*nome tabella.nome campo , model property*/
        $query->andFilterWhere(['like', 'mezzo_trasporto.mzt_mezzo_trasporto', $this->utcMezzo]);

        $query->andFilterWhere(['like', 'utc_note', $this->utc_note]);
        
        return $dataProvider;
    }
}

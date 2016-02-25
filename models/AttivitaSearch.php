<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Attivita;

/**
 * AttivitaSearch represents the model behind the search form about `app\models\Attivita`.
 */
class AttivitaSearch extends Attivita
{
	public $atsMezzoTrasporto; /*dm9*/
	
	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ats_id', 'ats_mezzo_trasporto_id', 'ats_dislivello', 'ats_utente_id'], 'integer'],
            [['ats_data', 'ats_tempo', 'ats_percorso', 'atsMezzoTrasporto'], 'safe'],
            [['ats_distanza_km'], 'number'],
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
        $query = Attivita::find();

        $query->joinWith(['atsMezzoTrasporto']);	/*dm9*/
        $query->orderBy(['ats_data' => SORT_DESC]);		/*dm9-160220*/
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /*dm9*inizio*/
        $dataProvider->sort->attributes['atsMezzoTrasporto'] = [
        		'asc' => ['mezzo_trasporto.mzt_mezzo_trasporto' => SORT_ASC],
        		'desc' => ['mezzo_trasporto.mzt_mezzo_trasporto' => SORT_DESC],
        ];
        /*dm9*fine*/
        /*dm9-160220*inizio*****************/
//         $dataProvider->setSort([
//         		'attributes' => [
//         				'ats_id',
//         				'atsMezzoTrasporto' => [
//         						'asc' => ['mezzo_trasporto.mzt_mezzo_trasporto' => SORT_ASC],
//         						'desc' => ['mezzo_trasporto.mzt_mezzo_trasporto' => SORT_DESC],
//         						'label' => 'Attrezzatura'
//         				]
//         		]
//         ]);
        /*dm9-160220*fine*****************/
        
        
        /*dm9-160220*inizio*****************/
//         $this->load($params);

        //         if (!$this->validate()) {
//             // uncomment the following line if you do not want to any records when validation fails
//             // $query->where('0=1');
//             return $dataProvider;
//         }
        /*dm9-160220*fine*****************/
        
        if (!($this->load($params) && $this->validate())) {
        	/**
        	 * The following line will allow eager loading with country data
        	 * to enable sorting by country on initial loading of the grid.
        	 */
//         	$query->joinWith(['atsMezzoTrasporto']);		/*dm9-160220*/
        	return $dataProvider;
        }
        	
//         $this->addCondition($query, 'ats_id');
//         $this->addCondition($query, 'mzt_id');
        	
        /* Add your filtering criteria */
        	
        // filter by country name
//         $query->joinWith(['atsMezzoTrasporto' => function ($q) {
//         	$q->where('mezzo_trasporto.mzt_mezzo_trasporto LIKE "%' . $this->atsMezzoTrasporto . '%"');
//         }]);
        	
        
        $query->andFilterWhere([
            'ats_id' => $this->ats_id,
            'ats_data' => $this->ats_data,
//*dm9*     'ats_mezzo_trasporto_id' => $this->ats_mezzo_trasporto_id,
            'ats_tempo' => $this->ats_tempo,
            'ats_distanza_km' => $this->ats_distanza_km,
            'ats_dislivello' => $this->ats_dislivello,
            'ats_utente_id' => $this->ats_utente_id,
        ]);

        $query->andFilterWhere(['like', 'ats_percorso', $this->ats_percorso]);

        $query->andFilterWhere(['like', 'mezzo_trasporto.mzt_mezzo_trasporto', $this->atsMezzoTrasporto]);		/*dm9*/
        
        return $dataProvider;
    }
}

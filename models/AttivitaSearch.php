<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AttivitaSearch represents the model behind the search form about `app\models\Attivita`.
 */
class AttivitaSearch extends Attivita
{
	public $atsMezzoTrasporto;      /*model property*/
    //this is attribute of filter input:
    public $dateAttivita;

	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'ats_id',
                    'ats_mezzo_trasporto_id',
                    'ats_dislivello',
                    'ats_utente_id'
                ],
                'integer'],
            [
                [
                    'ats_data',
                    'ats_tempo',
                    'ats_percorso',
                    'atsMezzoTrasporto',     /*model property*/
//                    'dataFineAttivita'
                ]
                ,
                'safe'],
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

        $query = Attivita::find()->where('ats_utente_id = ' .Yii::$app->user->id);

        $query->joinWith(['atsMezzoTrasporto']);	    /*nome relazione*/
//        $query->orderBy(['ats_data' => SORT_DESC]);	se attivata' non funziona il sort da web cliccando su qualsiasi colonna
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['ats_data'=>SORT_DESC]]
        ]);

        /*dm9*inizio*/
        $dataProvider->sort->attributes['atsMezzoTrasporto'] = [                    /*model property*/
        		'asc' => ['mezzo_trasporto.mzt_mezzo_trasporto' => SORT_ASC],       /*nome tabella.nome campo*/
        		'desc' => ['mezzo_trasporto.mzt_mezzo_trasporto' => SORT_DESC],
        ];
        /*dm9*fine*/

        if (!($this->load($params) && $this->validate())) {
        	/**
        	 * The following line will allow eager loading with country data
        	 * to enable sorting by country on initial loading of the grid.
        	 */
        	return $dataProvider;
        }

//        foreach (AttivitaSearch::getSearchColumns() as $columnname){
//            $operator = $this->getOperator($this->$columnname);
//            $operand = str_replace($operator,'',$this->$columnname);
//            $query->andFilterWhere([$operator, $columnname, $operand]);
//        }


//        $query->andFilterWhere(['>=', 'ats_data', $this->ats_data]);
//        $query->andFilterWhere(['<=', 'ats_data', $this->dataFineAttivita]);
        if (!is_null($this->dateAttivita) &&
            strpos($this->dateAttivita, ' - ') !== false ) {
            list($start_date, $end_date) = explode(' - ', $this->dateAttivita);
            $query->andFilterWhere(['between', 'date(ats_data.date)', $start_date, $end_date]);
        }

        $query->andFilterWhere(['like', 'ats_percorso', $this->ats_percorso]);

        $query->andFilterWhere(['like', 'mezzo_trasporto.mzt_mezzo_trasporto', $this->atsMezzoTrasporto]);		/*nome tabella.nome campo , model property*/
        
        return $dataProvider;
    }
}

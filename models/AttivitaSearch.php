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
	public $atsMezzoTrasporto;      /*model property*/
	
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
                    'atsMezzoTrasporto'     /*model property*/
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
        	
        $query->andFilterWhere([
            'ats_id' => $this->ats_id,
            'ats_data' => $this->ats_data,
            'ats_tempo' => $this->ats_tempo,
            'ats_distanza_km' => $this->ats_distanza_km,
            'ats_dislivello' => $this->ats_dislivello,
            'ats_utente_id' => $this->ats_utente_id,
        ]);

        $query->andFilterWhere(['like', 'ats_percorso', $this->ats_percorso]);

        $query->andFilterWhere(['like', 'mezzo_trasporto.mzt_mezzo_trasporto', $this->atsMezzoTrasporto]);		/*nome tabella.nome campo , model property*/
        
        return $dataProvider;
    }
}

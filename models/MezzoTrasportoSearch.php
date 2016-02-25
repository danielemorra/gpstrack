<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MezzoTrasporto;

/**
 * MezzoTrasportoSearch represents the model behind the search form about `app\models\MezzoTrasporto`.
 */
class MezzoTrasportoSearch extends MezzoTrasporto
{
	//*dm9* passi per impostare nel form di ricerca la decrizione della FK al posto dell'ID
	//*dm9* -------------------------------------------------------------------------------
	//*dm9* da Models\MezzoTrasporto.php :
	//*dm9* 1) prendere nota del nome della relazione esterna nel Model della tabella con la FK (in questo caso:  getMztTipologia a mztTipologia)
	//*dm9* da Models\MezzoTrasportoSearch.php :
	//*dm9* 2) dichiarare una variabile public con il nome della relazione ($mztTipologia)
	//*dm9* 3) aggiungere nel metodo rules la proprietà "safe" per la relazione (in questo caso mztTipologia)
	//*dm9* 4) aggiungere nel metodo search la join con la tabella esterna ($query->joinWith(['mztTipologia']);)
	//*dm9* 4) aggiungere, sempre nel metodo search, l'istrizione per il sort del campo descrittivo:
	//*dm9* 				($dataProvider->sort->attributes['mztTipologia'] = [
	//*dm9*      			 'asc' => ['mztTipologia.tmz_tipologia' => SORT_ASC],)
	//*dm9*      			 'desc' => ['mztTipologia.tmz_tipologia' => SORT_DESC],
    //*dm9*      			  ];
	//*dm9* 5) aggiungere, sempre nel metodo search, la condizione di where per filtrare con la like sul campo descrizione :
	//*dm9* 				$query->andFilterWhere(['like', 'tipologia_mzt.tmz_tipologia', $this->mztTipologia]);
	//*dm9* da views\mezzo-trasporto\index.php : 
	//*dm9* 6) aggiungere il campo descrittivo nella lista dei campi dichiarati nella gridView:
	//*dm9*					[
    //*dm9*					'attribute' => 'mztTipologia',
    //*dm9*					'value' => 'mztTipologia.tmz_tipologia'
    //*dm9*					],
	
	public $mztTipologia; /*dm9*/
	
	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mzt_id', 'mzt_tipologia_id', 'mzt_utente_id'], 'integer'],
            [['mzt_mezzo_trasporto', 'mzt_data_inizio_utilizzo', 'mzt_data_fine_utilizzo', 'mztTipologia'], 'safe'],
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
        $query = MezzoTrasporto::find();

        $query->joinWith(['mztTipologia']);	/*dm9*/
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /*dm9*inizio*/
        $dataProvider->sort->attributes['mztTipologia'] = [
        		'asc' => ['mztTipologia.tmz_tipologia' => SORT_ASC],
        		'desc' => ['mztTipologia.tmz_tipologia' => SORT_DESC],
        ];
        /*dm9*fine*/
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'mzt_id' => $this->mzt_id,
            'mzt_data_inizio_utilizzo' => $this->mzt_data_inizio_utilizzo,
            'mzt_data_fine_utilizzo' => $this->mzt_data_fine_utilizzo,
//*dm9*     'mzt_tipologia_id' => $this->mzt_tipologia_id,
            'mzt_utente_id' => $this->mzt_utente_id,
        ]);

        $query->andFilterWhere(['like', 'mzt_mezzo_trasporto', $this->mzt_mezzo_trasporto]);

        $query->andFilterWhere(['like', 'tipologia_mzt.tmz_tipologia', $this->mztTipologia]);		/*dm9*/
        
        return $dataProvider;
    }
}

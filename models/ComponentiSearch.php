<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Componenti;

/**
 * ComponentiSearch represents the model behind the search form about `app\models\Componenti`.
 */
class ComponentiSearch extends Componenti
{
	public $cmpIdFrn; /*model property*/
	public $cmpIdCat; /*model property*/
	public $cmpIdUbc; /*model property*/
	
	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'cmp_id',
                    'cmp_qta_acq',
                    'cmp_id_frn',       /*model property*/
                    'cmp_id_cat',       /*model property*/
                    'cmp_id_ubc',        /*model property*/
                    'cmp_utente_id'
                ], 
                'integer'],
            [
                [
                    'cmp_marca', 
                    'cmp_modello', 
                    'cmp_componente', 
                    'cmp_data_acquisto', 
                    'cmp_data_dismissione',
                    'cmp_mystuff2',
                    'cmp_mostra_in_home',
                    'cmp_note', 
                    'cmpIdFrn',         /*model property*/
                    'cmpIdCat',         /*model property*/
                    'cmpIdUbc'          /*model property*/
                ], 
                'safe'],
            [['cmp_prz_acq_unit'], 'number'],
            [['cmp_mystuff2','cmp_mostra_in_home'], 'in', 'range' => ['S', 's', 'N', 'n'], 'message' => 'Digita S o N'],
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
        $query = Componenti::find()->where('cmp_utente_id = ' .Yii::$app->user->id);

        $query->joinWith(['cmpIdFrn']);	/*nome relazione*/
        $query->joinWith(['cmpIdCat']);	/*nome relazione*/
        $query->joinWith(['cmpIdUbc']);	/*nome relazione*/

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['cmp_componente'=>SORT_ASC]]
        ]);

        /*dm9*inizio*/
        $dataProvider->sort->attributes['cmpIdFrn'] = [
        		'asc' => ['fornitori.frn_nome' => SORT_ASC],         /*nome tabella.nome campo*/
        		'desc' => ['fornitori.frn_nome' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['cmpIdCat'] = [
        		'asc' => ['categoria.cat_categoria' => SORT_ASC],        /*nome tabella.nome campo*/
        		'desc' => ['categoria.cat_categoria' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['cmpIdUbc'] = [
        		'asc' => ['ubicazione_componente.ubc_contenitore' => SORT_ASC],      /*nome tabella.nome campo*/
        		'desc' => ['ubicazione_componente.ubc_contenitore' => SORT_DESC],
        ];
		/*dm9*fine*/
	        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'cmp_id' => $this->cmp_id,
            'cmp_qta_acq' => $this->cmp_qta_acq,
            'cmp_qta_util' => $this->cmp_qta_util,
        	'cmp_prz_acq_unit' => $this->cmp_prz_acq_unit,
            'cmp_data_acquisto' => $this->cmp_data_acquisto,
            'cmp_data_dismissione' => $this->cmp_data_dismissione,
//            'cmp_mystuff2' => strtoupper($this->cmp_mystuff2) == 'NO' ? 0 : 1,
//            'cmp_mostra_in_home' => strtoupper($this->cmp_mostra_in_home) == 'NO' ? 0 : 1,
            'cmp_id_frn' => $this->cmp_id_frn,
            'cmp_id_cat' => $this->cmp_id_cat,
            'cmp_id_ubc' => $this->cmp_id_ubc,
            'cmp_utente_id' => $this->cmp_utente_id,
        ]);

        if (!empty($this->cmp_mystuff2))
            $query->andFilterWhere([
                'cmp_mystuff2' => strtoupper($this->cmp_mystuff2) == 'NO' ? 0 : 1,
            ]);

        if (!empty($this->cmp_mostra_in_home))
            $query->andFilterWhere([
                'cmp_mostra_in_home' => strtoupper($this->cmp_mostra_in_home) == 'NO' ? 0 : 1,
            ]);

        $query->andFilterWhere(['like', 'cmp_marca', $this->cmp_marca])
            ->andFilterWhere(['like', 'cmp_modello', $this->cmp_modello])
            ->andFilterWhere(['like', 'cmp_componente', $this->cmp_componente])
            ->andFilterWhere(['like', 'cmp_note', $this->cmp_note]);

        $query->andFilterWhere(['like', 'fornitori.frn_nome', $this->cmpIdFrn]);		/*nome tabella.nome campo , model property*/
        $query->andFilterWhere(['like', 'categoria.cat_categoria', $this->cmpIdCat]);		/*dm9*/
        $query->andFilterWhere(['like', 'ubicazione_componente.ubc_contenitore', $this->cmpIdUbc]);		/*dm9*/
        
        return $dataProvider;
    }
}

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
	public $cmpIdFrn; /*dm9*/
	public $cmpIdCat; /*dm9*/
	public $cmpIdUbc; /*dm9*/
	
	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cmp_id', 'cmp_qta_acq', 'cmp_mystuff2', 'cmp_id_frn', 'cmp_id_cat', 'cmp_id_ubc'], 'integer'],
            [['cmp_marca', 'cmp_modello', 'cmp_componente', 'cmp_data_acquisto', 'cmp_data_dismissione', 'cmp_note', 'cmpIdFrn', 'cmpIdCat', 'cmpIdUbc'], 'safe'],
            [['cmp_prz_acq_unit'], 'number'],
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
        $query = Componenti::find();

        $query->joinWith(['cmpIdFrn']);	/*dm9*/
        $query->joinWith(['cmpIdCat']);	/*dm9*/
        $query->joinWith(['cmpIdUbc']);	/*dm9*/

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /*dm9*inizio*/
        $dataProvider->sort->attributes['cmpIdFrn'] = [
        		'asc' => ['cmpIdFrn.frn_nome' => SORT_ASC],
        		'desc' => ['cmpIdFrn.frn_nome' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['cmpIdCat'] = [
        		'asc' => ['cmpIdCat.cat_categoria' => SORT_ASC],
        		'desc' => ['cmpIdCat.cat_categoria' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['cmpIdUbc'] = [
        		'asc' => ['cmpIdUbc.ubc_contenitore' => SORT_ASC],
        		'desc' => ['cmpIdUbc.ubc_contenitore' => SORT_DESC],
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
            'cmp_mystuff2' => $this->cmp_mystuff2,
            'cmp_id_frn' => $this->cmp_id_frn,
            'cmp_id_cat' => $this->cmp_id_cat,
            'cmp_id_ubc' => $this->cmp_id_ubc,
        ]);

        $query->andFilterWhere(['like', 'cmp_marca', $this->cmp_marca])
            ->andFilterWhere(['like', 'cmp_modello', $this->cmp_modello])
            ->andFilterWhere(['like', 'cmp_componente', $this->cmp_componente])
            ->andFilterWhere(['like', 'cmp_note', $this->cmp_note]);

        $query->andFilterWhere(['like', 'fornitori.frn_nome', $this->cmpIdFrn]);		/*dm9*/
        $query->andFilterWhere(['like', 'categoria.cat_categoria', $this->cmpIdCat]);		/*dm9*/
        $query->andFilterWhere(['like', 'ubicazione_componente.ubc_contenitore', $this->cmpIdUbc]);		/*dm9*/
        
        return $dataProvider;
    }
}

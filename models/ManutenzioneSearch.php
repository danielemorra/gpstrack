<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Manutenzione;

/**
 * ManutenzioneSearch represents the model behind the search form about `app\models\Manutenzione`.
 */
class ManutenzioneSearch extends Manutenzione
{
	public $mtzComponente;      /*model property*/
	
	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'mtz_id',
                    'mtz_componente_id'
                ], 'integer'],
            [
                [
                    'mtz_data_interv',
                    'mtz_descrizione',
                    'mtz_data_inizio_tracking',
                    'mtz_data_fine_tracking',
                    'mtzComponente'
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
        $query = Manutenzione::find();

        $query->joinWith(['mtzComponente']);	/*nome relazione*/
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['mtz_data_interv'=>SORT_DESC]]
        ]);

        $dataProvider->sort->attributes['mtzComponente'] = [                /*model property*/
        		'asc' => ['componenti.cmp_componente' => SORT_ASC],         /*nome tabella.nome campo*/
        		'desc' => ['componenti.cmp_componente' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'mtz_id' => $this->mtz_id,
            'mtz_data_interv' => $this->mtz_data_interv,
            'mtz_data_inizio_tracking' => $this->mtz_data_inizio_tracking,
            'mtz_data_fine_tracking' => $this->mtz_data_fine_tracking,
        ]);

        $query->andFilterWhere(['like', 'mtz_descrizione', $this->mtz_descrizione]);

        $query->andFilterWhere(['like', 'componenti.cmp_componente', $this->mtzComponente]);		/*nome tabella.nome campo , model property*/

        $query->andFilterWhere(['like', 'componenti.cmp_utente_id', Yii::$app->user->id]);

        return $dataProvider;
    }
}

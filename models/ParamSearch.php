<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Param;

/**
 * ParamSearch represents the model behind the search form about `app\models\Param`.
 */
class ParamSearch extends Param
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['par_id', 'par_leggi_campo'], 'integer'],
            [['par_parametro', 'par_campo_str', 'par_campo_date'], 'safe'],
            [['par_campo_num'], 'number'],
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
        $query = Param::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'par_id' => $this->par_id,
            'par_leggi_campo' => $this->par_leggi_campo,
            'par_campo_num' => $this->par_campo_num,
            'par_campo_date' => $this->par_campo_date,
        ]);

        $query->andFilterWhere(['like', 'par_parametro', $this->par_parametro])
            ->andFilterWhere(['like', 'par_campo_str', $this->par_campo_str]);

        return $dataProvider;
    }
    
    /**
     * Estrae da Param l'obiettivo Km da fare annui per la BDC  
     * @param unknown $parParametro
     */
//    public function estraiParametro($parParametro)
//    {
//    	return Param::findOne(['par_parametro' => $parParametro,]);
//    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipologiaMzt;

/**
 * TipologiaMztSearch represents the model behind the search form about `app\models\TipologiaMzt`.
 */
class TipologiaMztSearch extends TipologiaMzt
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tmz_id'], 'integer'],
            [['tmz_tipologia'], 'safe'],
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
        $query = TipologiaMzt::find();

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
            'tmz_id' => $this->tmz_id,
        ]);

        $query->andFilterWhere(['like', 'tmz_tipologia', $this->tmz_tipologia]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fornitori;

/**
 * FornitoriSearch represents the model behind the search form about `app\models\Fornitori`.
 */
class FornitoriSearch extends Fornitori
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['frn_id'], 'integer'],
            [['frn_nome', 'frn_sito_web'], 'safe'],
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
        $query = Fornitori::find();

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
            'frn_id' => $this->frn_id,
        ]);

        $query->andFilterWhere(['like', 'frn_nome', $this->frn_nome])
            ->andFilterWhere(['like', 'frn_sito_web', $this->frn_sito_web]);

        return $dataProvider;
    }
}

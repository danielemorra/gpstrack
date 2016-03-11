<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SfidaSpecialita;

/**
 * SfidaSpecialitaSearch represents the model behind the search form about `app\models\SfidaSpecialita`.
 */
class SfidaSpecialitaSearch extends SfidaSpecialita
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sfs_id'], 'integer'],
            [['sfs_specialita', 'sfs_um'], 'safe'],
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
        $query = SfidaSpecialita::find();

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
            'sfs_id' => $this->sfs_id,
        ]);

        $query->andFilterWhere(['like', 'sfs_specialita', $this->sfs_specialita])
            ->andFilterWhere(['like', 'sfs_um', $this->sfs_um]);

        return $dataProvider;
    }
}

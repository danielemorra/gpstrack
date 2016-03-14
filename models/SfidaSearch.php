<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sfida;

/**
 * SfidaSearch represents the model behind the search form about `app\models\Sfida`.
 */
class SfidaSearch extends Sfida
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sfd_id', 'sfd_specialita_id', 'sfd_tipologia_id'], 'integer'],
            [['sfd_titolo', 'sfd_sotto_titolo', 'sfd_descrizione', 'sfd_data_pubblicaz', 'sfd_data_inizio', 'sfd_data_fine', 'sfd_image_url'], 'safe'],
            [['sfd_obiettivo'], 'number'],
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
        $query = Sfida::find();

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
            'sfd_id' => $this->sfd_id,
            'sfd_data_pubblicaz' => $this->sfd_data_pubblicaz,
            'sfd_data_inizio' => $this->sfd_data_inizio,
            'sfd_data_fine' => $this->sfd_data_fine,
            'sfd_specialita_id' => $this->sfd_specialita_id,
            'sfd_tipologia_id' => $this->sfd_tipologia_id,
            'sfd_obiettivo' => $this->sfd_obiettivo,
        ]);

        $query->andFilterWhere(['like', 'sfd_titolo', $this->sfd_titolo])
            ->andFilterWhere(['like', 'sfd_sotto_titolo', $this->sfd_sotto_titolo])
            ->andFilterWhere(['like', 'sfd_descrizione', $this->sfd_descrizione])
            ->andFilterWhere(['like', 'sfd_image_url', $this->sfd_image_url]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SfidaUtente;

/**
 * SfidaUtenteSearch represents the model behind the search form about `app\models\SfidaUtente`.
 */
class SfidaUtenteSearch extends SfidaUtente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sfu_id', 'sfu_utente_id', 'sfu_sfida_id', 'sfu_flag_obiettivo_centrato'], 'integer'],
            [['sfu_obiettivo_raggiunto'], 'number'],
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
        $query = SfidaUtente::find();

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
            'sfu_id' => $this->sfu_id,
            'sfu_obiettivo_raggiunto' => $this->sfu_obiettivo_raggiunto,
            'sfu_utente_id' => $this->sfu_utente_id,
            'sfu_sfida_id' => $this->sfu_sfida_id,
            'sfu_flag_obiettivo_centrato' => $this->sfu_flag_obiettivo_centrato,
        ]);

        return $dataProvider;
    }
}

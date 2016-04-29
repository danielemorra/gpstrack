<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Utente;

/**
 * UtenteSearch represents the model behind the search form about `app\models\Utente`.
 */
class UtenteSearch extends Utente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ute_id'], 'integer'],
            [['ute_username', 'ute_password_hash', 'ute_auth_key', 'ute_access_token', 'ute_email'], 'safe'],
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
        $query = Utente::find();

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
            'ute_id' => $this->ute_id,
        ]);

        $query->andFilterWhere(['like', 'ute_username', $this->ute_username])
            ->andFilterWhere(['like', 'ute_auth_key', $this->ute_auth_key])
            ->andFilterWhere(['like', 'ute_access_token', $this->ute_access_token])
            ->andFilterWhere(['like', 'ute_email', $this->ute_email]);

        return $dataProvider;
    }
}

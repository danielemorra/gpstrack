<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UbicazioneComponente;

/**
 * UbicazioneComponenteSearch represents the model behind the search form about `app\models\UbicazioneComponente`.
 */
class UbicazioneComponenteSearch extends UbicazioneComponente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ubc_id', 'ubc_utente_id'], 'integer'],
            [['ubc_contenitore', 'ubc_ubicazione', 'ubc_note'], 'safe'],
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
        $query = UbicazioneComponente::find()->where('ubc_utente_id = ' .Yii::$app->user->id);

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
            'ubc_id' => $this->ubc_id,
            'ubc_utente_id' => $this->ubc_utente_id,
        ]);

        $query->andFilterWhere(['like', 'ubc_contenitore', $this->ubc_contenitore])
            ->andFilterWhere(['like', 'ubc_ubicazione', $this->ubc_ubicazione])
            ->andFilterWhere(['like', 'ubc_note', $this->ubc_note]);

        return $dataProvider;
    }
}

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
    public $specialita;     /*model property*/
    public $tipologia;      /*model property*/
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sfd_id', 'sfd_specialita_id', 'sfd_tipologia_id'], 'integer'],
            [
                [
                    'sfd_sfida_obiet',
                    'sfd_titolo',
                    'sfd_sotto_titolo',
                    'sfd_descrizione',
                    'sfd_data_pubblicaz',
                    'sfd_data_inizio',
                    'sfd_data_fine',
                    'sfd_image_url',
                    'specialita',       /*model property*/
                    'tipologia',        /*model property*/
                ],
                'safe'],
//            [['sfd_obiettivo'], 'number'],
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

        // Include i join con le tabelle correlate sfida_specialita e tipologia_mzt (tramite il
        // nome del metodo che crea la relazione (es: getSfdTipologia, togliengo il get e con
        // la prima lettera minuscola)
        $query->joinWith(['sfdSpecialita', 'sfdTipologia']);    /*nome relazione*/

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['sfd_data_inizio'=>SORT_DESC]]
        ]);

        $dataProvider->sort->attributes['specialita'] = [       /*model property*/
            // in questo caso si usa il nome vero della tabella
            'asc' => ['sfida_specialita.sfs_specialita' => SORT_ASC],       /*nome tabella.nome campo*/
            'desc' => ['sfida_specialita.sfs_specialita' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['tipologia'] = [        /*model property*/
            // in questo caso si usa il nome vero della tabella
            'asc' => ['tipologia_mzt.tmz_tipologia' => SORT_ASC],           /*nome tabella.nome campo*/
            'desc' => ['tipologia_mzt.tmz_tipologia' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        switch (strtoupper($this->sfd_sfida_obiet)) {
            case 'SFIDA':
                $query->andFilterWhere(['sfd_sfida_obiet' => 1]);
                break;
            case 'OBIETTIVO':
                $query->andFilterWhere(['sfd_sfida_obiet' => 2]);
                break;
        }

        $query->andFilterWhere([
            'sfd_id' => $this->sfd_id,
//            'sfd_sfida_obiet' => strtoupper($this->sfd_sfida_obiet) == 'SFIDA' ? 1 : 2,
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

        $query->andFilterWhere(['like', 'sfida_specialita.sfs_specialita', $this->specialita]);     /*nome tabella.nome campo , model property*/

        $query->andFilterWhere(['like', 'tipologia_mzt.tmz_tipologia', $this->tipologia]);      /*nome tabella.nome campo , model property*/

        return $dataProvider;
    }

    public Static function getSfide($parStatoSfida, $parSpecialita, $parTipologia)
    {
        $sfidaModel = (new \yii\db\Query())->select('*');
        $sfidaModel->from('sfida');
        if ($parStatoSfida != "0") {
            switch ($parStatoSfida) {
                case "1":   // sfide in corso/imminenti
                case null:   // sfide in corso/imminenti
                    $sfidaModel->where('sfd_data_pubblicaz > NOW()');   // sfide che ancora non sono iniziate
                    $sfidaModel->orWhere('sfd_data_inizio <= NOW()');
                    $sfidaModel->andWhere('sfd_data_fine >= NOW()');
//                    $sfidaModel->where('sfd_data_pubblicaz >= :dtPubb');
//                    $sfidaModel->addParams([':dtPubb' => NOW()]);
                    break;
                case "2":   // sfide in corso
                    $sfidaModel->where('sfd_data_inizio <= NOW()');
                    $sfidaModel->andWhere('sfd_data_fine >= NOW()');
                    break;
                case "3":   // sfide imminenti
                    $sfidaModel->where('sfd_data_pubblicaz > NOW()');   // sfide che ancora non sono iniziate
                    break;
                case "4":   // sfide terminate
                    $sfidaModel->where('sfd_data_fine < NOW()');
                    break;
//                default:
            }
            $sfidaModel->all();
        }

        return $sfidaModel;
    }
}

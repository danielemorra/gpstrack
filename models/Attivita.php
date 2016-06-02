<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attivita".
 *
 * @property string $ats_id
 * @property string $ats_data
 * @property string $ats_mezzo_trasporto_id
 * @property string $ats_tempo
 * @property string $ats_distanza_km
 * @property integer $ats_dislivello
 * @property string $ats_percorso
 * @property string $ats_utente_id
 *
 * @property MezzoTrasporto $atsMezzoTrasporto
 * @property Utente $atsUtente
 */
class Attivita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attivita';
    }

//    public function behaviors()
//    {
//        return [
//            [
//                'class' => 'Attivita',
//                'attributes' => [
//                    attivita::EVENT_BEFORE_INSERT => ['ats_data'], // update 1 attribute 'created' OR multiple attribute ['created','updated']
//                    attivita::EVENT_BEFORE_UPDATE => 'ats_data', // update 1 attribute 'created' OR multiple attribute ['created','updated']
//                ],
//                'value' => function ($event) {
//                    return date('Y-m-d H:i:s', strtotime($this->ats_data));
//                },
//            ],
//        ];
//    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'ats_data',
                    'ats_mezzo_trasporto_id',
                    'ats_distanza_km',
                    'ats_dislivello',
                    'ats_utente_id']
                , 'required'],
            [
                [
                    'ats_data',
                    'ats_tempo']
                , 'safe'],
            [
                [
                    'ats_mezzo_trasporto_id',
                    'ats_dislivello',
                    'ats_utente_id'
                ], 'integer'
            ],
            [
                [
                    'ats_distanza_km'
                ], 'number'],
            [
                [
                    'ats_percorso'
                ], 'string', 'max' => 100
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ats_id' => 'Id',
            'ats_data' => 'Data (g/m/a)',
            'ats_mezzo_trasporto_id' => 'Attrezzatura',
            'ats_tempo' => 'Tempo',
            'ats_distanza_km' => 'Distanza (Km)',
            'ats_dislivello' => 'Dislivello (Mt)',
            'ats_percorso' => 'Percorso',
            'ats_utente_id' => 'Utente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtsMezzoTrasporto()
    {
        return $this->hasOne(MezzoTrasporto::className(), ['mzt_id' => 'ats_mezzo_trasporto_id']);
    }
    
    /* Getter for mezzo trasporto */
    /*dm9-260220*inizio********************/
    public function getMezzoTrasporto() {
    	return $this->mezzo_trasporto->mzt_mezzo_trasporto;
    }
    /*dm9-260220*fine********************/
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtsUtente()
    {
        return $this->hasOne(Utente::className(), ['ute_id' => 'ats_utente_id']);
    }

    public function beforeSave($insert = true) {
        $date = $this->ats_data;
        $date = str_replace('/', '-', $date);
        $this->ats_data = date('Y-m-d', strtotime($date));

        return parent::beforeSave($insert);
    }

//    private function getOperator($qryString){
//        switch ($qryString){
//            case strpos($qryString,'>=') === 0:
//                $operator = '>=';
//                break;
//            case strpos($qryString,'>') === 0:
//                $operator = '>';
//                break;
//            case strpos($qryString,'<=') === 0:
//                $operator = '<=';
//                break;
//            case strpos($qryString,'<') === 0:
//                $operator = '<';
//                break;
//            default:
//                $operator =  'like';
//                break;
//        }
//        return $operator;
//    }
}

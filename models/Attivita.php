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
            'ats_data' => 'Data',
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
}

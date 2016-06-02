<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utilizzo_componente".
 *
 * @property string $utc_id
 * @property string $utc_componente_id
 * @property integer $utc_qta_utilizzo
 * @property string $utc_mezzo_id
 * @property string $utc_data_montaggio
 * @property string $utc_data_smontaggio
 * @property string $utc_note
 *
 * @property Componenti $utcComponente
 * @property MezzoTrasporto $utcMezzo
 */
class UtilizzoComponente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'utilizzo_componente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'utc_componente_id',
                    'utc_qta_utilizzo',
                    'utc_mezzo_id',
                    'utc_data_montaggio'
                ], 'required'],
            [
                [
                    'utc_componente_id',
                    'utc_qta_utilizzo',
                    'utc_mezzo_id'
                ], 'integer'],
            [
                [
                    'utc_data_montaggio',
                    'utc_data_smontaggio',
                    'utc_note'
                ], 'safe'],
            [['utc_note'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'utc_id' => 'Id',
            'utc_componente_id' => 'Componente',
        	'utc_qta_utilizzo' => 'Qta Util',
        	'utc_mezzo_id' => 'Attrezzatura',
            'utc_data_montaggio' => 'Dt Montag',
            'utc_data_smontaggio' => 'Dt Smontag',
            'utc_note' => 'Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtcComponente()
    {
        return $this->hasOne(Componenti::className(), ['cmp_id' => 'utc_componente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtcMezzo()
    {
        return $this->hasOne(MezzoTrasporto::className(), ['mzt_id' => 'utc_mezzo_id']);
    }

    public function beforeSave($insert = true) {
        $date = $this->utc_data_montaggio;
        $date = str_replace('/', '-', $date);
        $this->utc_data_montaggio = date('Y-m-d', strtotime($date));

        $date = $this->utc_data_smontaggio;
        $date = str_replace('/', '-', $date);
//        $this->utc_data_smontaggio = date('Y-m-d', strtotime($date));
        $date = $date .'T23:59:59.999-06:00';
        $this->utc_data_smontaggio = date_format(  date_create($date ) , 'Y-m-d H:i:s');

        return parent::beforeSave($insert);
    }

    /**
     * Restituisce la data dismissione in formato text per bypassare il nnn
     * riconoscimento della data valida a 31/12/9999
     */
    public function getDataSmontaggio(){
        if($this->utc_data_smontaggio == '9999-12-31') {
            return '31/12/9999';
        }
        else {
            return date( 'd/m/Y', strtotime($this->utc_data_smontaggio));
        }
    }
}

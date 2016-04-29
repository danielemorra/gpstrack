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
                    'utc_data_smontaggio'
                ], 'safe']
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
        	'utc_qta_utilizzo' => 'Qta Utilizzo',
        	'utc_mezzo_id' => 'Attrezzatura',
            'utc_data_montaggio' => 'Dt Montaggio',
            'utc_data_smontaggio' => 'Dt Smontaggio',
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
}

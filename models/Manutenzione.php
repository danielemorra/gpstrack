<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manutenzione".
 *
 * @property string $mtz_id
 * @property string $mtz_data_interv
 * @property string $mtz_descrizione
 * @property string $mtz_componente_id
 * @property string $mtz_data_inizio_tracking
 * @property string $mtz_data_fine_tracking
 *
 * @property Componenti $mtzComponente
 */
class Manutenzione extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manutenzione';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mtz_data_interv', 'mtz_descrizione', 'mtz_componente_id', 'mtz_data_inizio_tracking', 'mtz_data_fine_tracking'], 'required'],
            [['mtz_data_interv', 'mtz_data_inizio_tracking', 'mtz_data_fine_tracking'], 'safe'],
            [['mtz_componente_id'], 'integer'],
            [['mtz_descrizione'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mtz_id' => 'Mtz ID',
            'mtz_data_interv' => 'Mtz Data Interv',
            'mtz_descrizione' => 'Mtz Descrizione',
            'mtz_componente_id' => 'Mtz Componente ID',
            'mtz_data_inizio_tracking' => 'Mtz Data Inizio Tracking',
            'mtz_data_fine_tracking' => 'Mtz Data Fine Tracking',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMtzComponente()
    {
        return $this->hasOne(Componenti::className(), ['cmp_id' => 'mtz_componente_id']);
    }
}

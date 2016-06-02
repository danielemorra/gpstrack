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
            [
                [
                    'mtz_data_interv',
                    'mtz_descrizione',
                    'mtz_componente_id',
                    'mtz_data_inizio_tracking',
                    'mtz_data_fine_tracking'
                ], 'required'],
            [
                [
                    'mtz_data_interv',
                    'mtz_data_inizio_tracking',
                    'mtz_data_fine_tracking'
                ], 'safe'],
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
            'mtz_id' => 'Id',
            'mtz_data_interv' => 'Data',
            'mtz_descrizione' => 'Descrizione',
            'mtz_componente_id' => 'Componente',
            'mtz_data_inizio_tracking' => 'Dt Inizio Tracking',
            'mtz_data_fine_tracking' => 'Dt Fine Tracking',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMtzComponente()
    {
        return $this->hasOne(Componenti::className(), ['cmp_id' => 'mtz_componente_id']);
    }

    public function beforeSave($insert = true) {
        $date = $this->mtz_data_interv;
        $date = str_replace('/', '-', $date);
        $this->mtz_data_interv = date('Y-m-d', strtotime($date));

        $date = $this->mtz_data_inizio_tracking;
        $date = str_replace('/', '-', $date);
        $this->mtz_data_inizio_tracking = date('Y-m-d', strtotime($date));

//        $this->mtz_data_fine_tracking = $date == "31-12-9999" ? "9999-12-31" : date('Y-m-d', strtotime($date));
//        $this->mtz_data_fine_tracking = date('Y-m-d H:i:s', strtotime($date));
        $date = $this->mtz_data_fine_tracking;
        $date = str_replace('/', '-', $date);
        $date = $date .'T23:59:59.999-06:00';
        $this->mtz_data_fine_tracking = date_format(  date_create($date ) , 'Y-m-d H:i:s');

        return parent::beforeSave($insert);
    }

    /**
     * Restituisce la data dismissione in formato text per bypassare il nnn
     * riconoscimento della data valida a 31/12/9999
     */
//    public function getDataFineTracking(){
//        if($this->mtz_data_fine_tracking == '9999-12-31') {
//            return '31/12/9999';
//        }
//        else {
//            return date( 'd/m/Y', strtotime($this->mtz_data_fine_tracking));
//        }
//    }

//    public function getDataFineTracking(){
//        if($this->mtz_data_fine_tracking == '2035-12-31' || $this->mtz_data_fine_tracking == '9999-12-31') {
//            return '31/12/9999';
//        }
//        else {
//            return date( 'd/m/Y', strtotime($this->mtz_data_fine_tracking));
//        }
//    }
}

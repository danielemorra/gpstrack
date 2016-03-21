<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utili_mesi".
 *
 * @property integer $ume_id
 * @property integer $ume_mese_num
 * @property string $ume_mese_desc
 */
class UtiliMesi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'utili_mesi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ume_mese_num', 'ume_mese_desc'], 'required'],
            [['ume_mese_num'], 'integer'],
            [['ume_mese_desc'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ume_id' => 'Ume ID',
            'ume_mese_num' => 'Ume Mese Num',
            'ume_mese_desc' => 'Ume Mese Desc',
        ];
    }
}

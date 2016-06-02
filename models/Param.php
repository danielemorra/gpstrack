<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "param".
 *
 * @property string $par_id
 * @property string $par_parametro
 * @property integer $par_leggi_campo
 * @property string $par_campo_num
 * @property string $par_campo_str
 *
 * @property string $par_campo_date
 */
class Param extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'param';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['par_leggi_campo'], 'integer'],
            [['par_campo_num'], 'number'],
            [['par_campo_date'], 'safe'],
            [['par_parametro'], 'string', 'max' => 50],
            [['par_campo_str'], 'string', 'max' => 100],
            [['par_parametro'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'par_id' => 'Id',
            'par_parametro' => 'Chiave Parametro',
            'par_leggi_campo' => 'Campo da leggere',
            'par_campo_num' => 'Campo Numerico',
            'par_campo_str' => 'Campo Stringa',
            'par_campo_date' => 'Campo Data',
        ];
    }

    public static function estraiParametro($parParametro)
    {
        return Param::findOne(['par_parametro' => $parParametro,]);
    }
}

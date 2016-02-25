<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipologia_mzt".
 *
 * @property string $tmz_id
 * @property string $tmz_tipologia
 *
 * @property MezzoTrasporto[] $mezzoTrasportos
 */
class TipologiaMzt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipologia_mzt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tmz_tipologia'], 'required'],
            [['tmz_tipologia'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tmz_id' => 'Tmz ID',
            'tmz_tipologia' => 'Tmz Tipologia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMezzoTrasportos()
    {
        return $this->hasMany(MezzoTrasporto::className(), ['mzt_tipologia_id' => 'tmz_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sfida_utente".
 *
 * @property string $sfu_id
 * @property string $sfu_obiettivo_raggiunto
 * @property string $sfu_utente_id
 * @property string $sfu_sfida_id
 * @property integer $sfu_flag_obiettivo_centrato
 *
 * @property Sfida $sfuSfida
 * @property User $user
 */
class SfidaUtente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sfida_utente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sfu_obiettivo_raggiunto'], 'number'],
            [['sfu_utente_id', 'sfu_sfida_id'], 'required'],
            [['sfu_utente_id', 'sfu_sfida_id', 'sfu_flag_obiettivo_centrato'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sfu_id' => 'Sfu ID',
            'sfu_obiettivo_raggiunto' => 'Obiettivo Raggiunto',
            'sfu_utente_id' => 'Utente',
            'sfu_sfida_id' => 'Sfida',
            'sfu_flag_obiettivo_centrato' => 'Obiettivo Centrato',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSfuSfida()
    {
        return $this->hasOne(Sfida::className(), ['sfd_id' => 'sfu_sfida_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'sfu_utente_id']);
    }
}

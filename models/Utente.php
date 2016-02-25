<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utente".
 *
 * @property string $ute_id
 * @property string $ute_username
 * @property string $ute_password
 * @property string $ute_email
 *
 * @property Attivita[] $attivitas
 * @property MezzoTrasporto[] $mezzoTrasportos
 */
class Utente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'utente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ute_username', 'ute_password', 'ute_email'], 'required'],
            [['ute_username', 'ute_password', 'ute_email'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ute_id' => 'Ute ID',
            'ute_username' => 'Ute Username',
            'ute_password' => 'Ute Password',
            'ute_email' => 'Ute Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttivitas()
    {
        return $this->hasMany(Attivita::className(), ['ats_utente_id' => 'ute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMezzoTrasportos()
    {
        return $this->hasMany(MezzoTrasporto::className(), ['mzt_utente_id' => 'ute_id']);
    }
}

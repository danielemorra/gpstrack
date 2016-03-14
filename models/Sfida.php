<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sfida".
 *
 * @property string $sfd_id
 * @property string $sfd_titolo
 * @property string $sfd_sotto_titolo
 * @property string $sfd_descrizione
 * @property string $sfd_data_pubblicaz
 * @property string $sfd_data_inizio
 * @property string $sfd_data_fine
 * @property string $sfd_specialita_id
 * @property string $sfd_tipologia_id
 * @property string $sfd_obiettivo
 * @property string $sfd_image_url
 *
 * @property TipologiaMzt $sfdTipologia
 * @property SfidaSpecialita $sfdSpecialita
 * @property SfidaUtente[] $sfidaUtentes
 */
class Sfida extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sfida';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sfd_sotto_titolo', 'sfd_specialita_id', 'sfd_tipologia_id'], 'required'],
            [['sfd_data_pubblicaz', 'sfd_data_inizio', 'sfd_data_fine'], 'safe'],
            [['sfd_specialita_id', 'sfd_tipologia_id'], 'integer'],
            [['sfd_obiettivo'], 'number'],
            [['sfd_titolo'], 'string', 'max' => 50],
            [['sfd_sotto_titolo'], 'string', 'max' => 100],
            [['sfd_descrizione'], 'string', 'max' => 500],
            [['sfd_image_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sfd_id' => 'Sfd ID',
            'sfd_titolo' => 'Sfd Titolo',
            'sfd_sotto_titolo' => 'Sfd Sotto Titolo',
            'sfd_descrizione' => 'Sfd Descrizione',
            'sfd_data_pubblicaz' => 'Sfd Data Pubblicaz',
            'sfd_data_inizio' => 'Sfd Data Inizio',
            'sfd_data_fine' => 'Sfd Data Fine',
            'sfd_specialita_id' => 'Sfd Specialita ID',
            'sfd_tipologia_id' => 'Sfd Tipologia ID',
            'sfd_obiettivo' => 'Sfd Obiettivo',
            'sfd_image_url' => 'Sfd Image Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSfdTipologia()
    {
        return $this->hasOne(TipologiaMzt::className(), ['tmz_id' => 'sfd_tipologia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSfdSpecialita()
    {
        return $this->hasOne(SfidaSpecialita::className(), ['sfs_id' => 'sfd_specialita_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSfidaUtentes()
    {
        return $this->hasMany(SfidaUtente::className(), ['sfu_sfida_id' => 'sfd_id']);
    }
}

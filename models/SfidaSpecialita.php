<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sfida_specialita".
 *
 * @property string $sfs_id
 * @property string $sfs_specialita
 * @property string $sfs_um
 *
 * @property Sfida[] $sfidas
 */
class SfidaSpecialita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sfida_specialita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sfs_specialita', 'sfs_um'], 'required'],
            [['sfs_specialita'], 'string', 'max' => 100],
            [['sfs_um'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sfs_id' => 'Sfs ID',
            'sfs_specialita' => 'Sfs Specialita',
            'sfs_um' => 'Sfs Um',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSfidas()
    {
        return $this->hasMany(Sfida::className(), ['sfd_specialita_id' => 'sfs_id']);
    }
}

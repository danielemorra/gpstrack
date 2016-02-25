<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ubicazione_componente".
 *
 * @property string $ubc_id
 * @property string $ubc_contenitore
 * @property string $ubc_ubicazione
 * @property string $ubc_note
 *
 * @property Componenti[] $componentis
 */
class UbicazioneComponente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ubicazione_componente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ubc_contenitore'], 'required'],
            [['ubc_ubicazione', 'ubc_note'], 'safe'],
        	[['ubc_contenitore', 'ubc_ubicazione', 'ubc_note'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ubc_id' => 'Ubc ID',
            'ubc_contenitore' => 'Ubc Contenitore',
            'ubc_ubicazione' => 'Ubc Ubicazione',
            'ubc_note' => 'Ubc Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComponentis()
    {
        return $this->hasMany(Componenti::className(), ['cmp_id_ubc' => 'ubc_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ubicazione_componente".
 *
 * @property string $ubc_id
 * @property string $ubc_contenitore
 * @property string $ubc_ubicazione
 * @property string $ubc_utente_id
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
            [['ubc_contenitore', 'ubc_utente_id'], 'required'],
            [['ubc_utente_id'], 'integer'],
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
            'ubc_id' => 'Id',
            'ubc_contenitore' => 'Contenitore',
            'ubc_ubicazione' => 'Ubicazione',
            'ubc_note' => 'Note',
            'ubc_utente_id' => 'Utente Id',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComponentis()
    {
        return $this->hasMany(Componenti::className(), ['cmp_id_ubc' => 'ubc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUbcUtente()
    {
        return $this->hasOne(Utente::className(), ['ute_id' => 'ubc_utente_id']);
    }
}

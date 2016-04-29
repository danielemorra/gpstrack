<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fornitori".
 *
 * @property string $frn_id
 * @property string $frn_nome
 * @property string $frn_sito_web
 *
 * @property Componenti[] $componentis
 */
class Fornitori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fornitori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['frn_nome', 'frn_utente_id'], 'required'],
            [['frn_nome', 'frn_sito_web'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'frn_id' => 'Id',
            'frn_nome' => 'Negozio',
            'frn_sito_web' => 'Sito Web',
            'frn_utente_id' => 'Utente Id',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComponentis()
    {
        return $this->hasMany(Componenti::className(), ['cmp_id_frn' => 'frn_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrnUtente()
    {
        return $this->hasOne(Utente::className(), ['ute_id' => 'frn_utente_id']);
    }
}

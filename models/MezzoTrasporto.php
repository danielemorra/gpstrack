<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mezzo_trasporto".
 *
 * @property string $mzt_id
 * @property string $mzt_mezzo_trasporto
 * @property string $mzt_data_inizio_utilizzo
 * @property string $mzt_data_fine_utilizzo
 * @property string $mzt_tipologia_id
 * @property string $mzt_utente_id
 *
 * @property Attivita[] $attivitas
 * @property Manutenzione[] $manutenziones
 * @property Utente $mztUtente
 * @property TipologiaMzt $mztTipologia
 * @property UtilizzoComponente[] $utilizzoComponentes
 */
class MezzoTrasporto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mezzo_trasporto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mzt_mezzo_trasporto', 'mzt_data_inizio_utilizzo', 'mzt_tipologia_id', 'mzt_utente_id'], 'required'],
            [['mzt_data_inizio_utilizzo', 'mzt_data_fine_utilizzo'], 'safe'],
            [['mzt_tipologia_id', 'mzt_utente_id'], 'integer'],
            [['mzt_mezzo_trasporto'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mzt_id' => 'Mzt ID',
            'mzt_mezzo_trasporto' => 'Mzt Mezzo Trasporto',
            'mzt_data_inizio_utilizzo' => 'Mzt Data Inizio Utilizzo',
            'mzt_data_fine_utilizzo' => 'Mzt Data Fine Utilizzo',
            'mzt_tipologia_id' => 'Mzt Tipologia ID',
            'mzt_utente_id' => 'Mzt Utente ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttivitas()
    {
        return $this->hasMany(Attivita::className(), ['ats_mezzo_trasporto_id' => 'mzt_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManutenziones()
    {
        return $this->hasMany(Manutenzione::className(), ['mtz_mezzo_trasporto_id' => 'mzt_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMztUtente()
    {
        return $this->hasOne(Utente::className(), ['ute_id' => 'mzt_utente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMztTipologia()
    {
        return $this->hasOne(TipologiaMzt::className(), ['tmz_id' => 'mzt_tipologia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizzoComponentes()
    {
        return $this->hasMany(UtilizzoComponente::className(), ['utc_mezzo_id' => 'mzt_id']);
    }
}

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
            'mzt_id' => 'Id',
            'mzt_mezzo_trasporto' => 'Attrezzatura',
            'mzt_data_inizio_utilizzo' => 'Dt Inizio Util.',
            'mzt_data_fine_utilizzo' => 'Dt Fine Util.',
            'mzt_tipologia_id' => 'Tipologia',
            'mzt_utente_id' => 'Utente',
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

    public function beforeSave($insert = true) {
        $date = $this->mzt_data_inizio_utilizzo;
        $date = str_replace('/', '-', $date);
        $this->mzt_data_inizio_utilizzo = date('Y-m-d', strtotime($date));

        $date = $this->mzt_data_fine_utilizzo;
        $date = str_replace('/', '-', $date);
        $date = $date .'T23:59:59.999-06:00';
        $this->mzt_data_fine_utilizzo = date_format(  date_create($date ) , 'Y-m-d H:i:s');

        return parent::beforeSave($insert);
    }
}

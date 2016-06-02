<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "componenti".
 *
 * @property string $cmp_id
 * @property string $cmp_marca
 * @property string $cmp_modello
 * @property string $cmp_componente
 * @property integer $cmp_qta_acq
 * @property string $cmp_prz_acq_unit
 * @property string $cmp_data_acquisto
 * @property string $cmp_data_dismissione
 * @property integer $cmp_qta_util
 * @property integer $cmp_mystuff2
 * @property integer $cmp_mostra_in_home
 * @property string $cmp_id_frn
 * @property string $cmp_id_cat
 * @property string $cmp_id_ubc
 * @property string $cmp_utente_id
 * @property string $cmp_note
 *
 * @property Utente $cmpUtente
 * @property Fornitori $cmpIdFrn
 * @property UbicazioneComponente $cmpIdUbc
 * @property Categoria $cmpIdCat
 * @property Manutenzione[] $manutenziones
 * @property UtilizzoComponente[] $utilizzoComponentes
 */
class Componenti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'componenti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cmp_componente', 'cmp_qta_acq', 'cmp_id_frn', 'cmp_id_cat', 'cmp_id_ubc'], 'required'],
            [['cmp_qta_acq', 'cmp_qta_util', 'cmp_mystuff2', 'cmp_id_frn', 'cmp_id_cat', 'cmp_id_ubc', 'cmp_utente_id'], 'integer'],
            [['cmp_prz_acq_unit'], 'number'],
            [['cmp_data_acquisto', 'cmp_data_dismissione', 'cmp_note', 'cmp_mostra_in_home'], 'safe'],
            [['cmp_marca', 'cmp_modello'], 'string', 'max' => 50],
            [['cmp_componente', 'cmp_note'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
       		'cmp_id' => 'ID',
       		'cmp_marca' => 'Marca',
       		'cmp_modello' => 'Modello',
       		'cmp_componente' => 'Descrizione Componente',
       		'cmp_qta_acq' => 'Qta Acq',
       		'cmp_prz_acq_unit' => 'Prz Uni',
       		'cmp_data_acquisto' => 'Data Acq',
       		'cmp_data_dismissione' => 'Data Dism',
            'cmp_qta_util' => 'Qta Util',
            'cmp_mostra_in_home' => 'Mostra in Home',
        	'cmp_mystuff2' => 'Mystuff2',
       		'cmp_id_frn' => 'Negozio',
       		'cmp_id_cat' => 'Categoria',
        	'cmp_id_ubc' => 'Ubicazione',
            'cmp_utente_id' => 'Utente Id',
        	'cmp_note' => 'Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmpUtente()
    {
        return $this->hasOne(Utente::className(), ['ute_id' => 'cmp_utente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManutenziones()
    {
        return $this->hasMany(Manutenzione::className(), ['mtz_componente_id' => 'cmp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmpIdFrn()
    {
        return $this->hasOne(Fornitori::className(), ['frn_id' => 'cmp_id_frn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmpIdUbc()
    {
        return $this->hasOne(UbicazioneComponente::className(), ['ubc_id' => 'cmp_id_ubc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmpIdCat()
    {
        return $this->hasOne(Categoria::className(), ['cat_id' => 'cmp_id_cat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizzoComponentes()
    {
        return $this->hasMany(UtilizzoComponente::className(), ['utc_componente_id' => 'cmp_id']);
    }

    public function beforeSave($insert = true) {
        $date = $this->cmp_data_acquisto;
        $date = str_replace('/', '-', $date);
        $this->cmp_data_acquisto = date('Y-m-d', strtotime($date));

        $date = $this->cmp_data_dismissione;
        $date = str_replace('/', '-', $date);
//        $this->cmp_data_dismissione = date('Y-m-d', strtotime($date));
        $date = $date .'T23:59:59.999-06:00';
        $this->cmp_data_dismissione = date_format(  date_create($date ) , 'Y-m-d H:i:s');

        return parent::beforeSave($insert);
    }

    /**
     * Restituisce la data dismissione in formato text per bypassare il nnn
     * riconoscimento della data valida a 31/12/9999
     */
    public function getDataDismissione(){
        if($this->cmp_data_dismissione == '9999-12-31') {
            return '31/12/9999';
        }
        else {
            return date( 'd/m/Y', strtotime($this->cmp_data_dismissione));
        }
    }
}

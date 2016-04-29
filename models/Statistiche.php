<?php

namespace app\models;

use Yii;
// use yii\base\Model;
use app\models\Param;
use app\models\Attivita;

/**
 * This is the model class for extract statistical data.
 *
 */
class Statistiche extends \yii\db\ActiveRecord
{
	/**
	 * Estrae dalla tabella Attivita il numero totale di km effettuati per la specilita (bdc, mtb, cc), per l'anno e l'utente
	 * @param number $parAanno
	 * @param number $parUtente
	 * @param string $parSpecialita
     * @return number
	 */
    Public static function getKmAnnui($parAanno, $parUtente, $parSpecialita)
    {
    	return Yii::$app->db->createCommand('SELECT sum(ats_distanza_km) FROM attivita, mezzo_trasporto, tipologia_mzt WHERE ats_mezzo_trasporto_id = mzt_id AND mzt_tipologia_id = tmz_id AND YEAR(ats_data) = :curryear AND ats_utente_id = :utente AND tmz_tipologia = :tipobici')
    						->bindValue(':curryear', $parAanno)
    						->bindValue(':utente', $parUtente)
    						->bindValue(':tipobici', $parSpecialita)
    						->queryScalar();	
    }
    
    /**
     * Estrae dalla tabella Attivita il totale in mt di dislivello effettuato per la specilita (bdc, mtb, cc), per l'anno e l'utente
	 * @param number $parAanno
	 * @param number $parUtente
	 * @param string $parSpecialita
     * @return number
     */
    Public static function getDislivelloAnnuo($parAanno, $parUtente, $parSpecialita)
    {
		return Yii::$app->db->createCommand('SELECT sum(ats_dislivello) FROM attivita, mezzo_trasporto, tipologia_mzt WHERE ats_mezzo_trasporto_id = mzt_id AND mzt_tipologia_id = tmz_id AND YEAR(ats_data) = :curryear AND ats_utente_id = :utente AND tmz_tipologia = :tipobici')
    						->bindValue(':curryear', $parAanno)
    						->bindValue(':utente', $parUtente)
    						->bindValue(':tipobici', $parSpecialita)
    						->queryScalar();    	
    }

	/**
	 * Estrae dalla tabella Attivita il numero totale di km effettuati per la specilita (bdc, mtb, cc), per l'anno/mese e l'utente
	 * @param number $parAanno
	 * @param number $parMese
	 * @param number $parUtente
	 * @param string $parSpecialita
	 * @return number
	 */
	Public static function getKmMese($parAanno, $parMese, $parUtente, $parSpecialita)
	{
		return Yii::$app->db->createCommand('SELECT sum(ats_distanza_km) FROM attivita, mezzo_trasporto, tipologia_mzt WHERE ats_mezzo_trasporto_id = mzt_id AND mzt_tipologia_id = tmz_id AND YEAR(ats_data) = :curryear AND MONTH(ats_data) = :mese AND ats_utente_id = :utente AND tmz_tipologia = :tipobici')
				->bindValue(':curryear', $parAanno)
				->bindValue(':mese', $parMese)
				->bindValue(':utente', $parUtente)
				->bindValue(':tipobici', $parSpecialita)
				->queryScalar();
	}

	/**
	 * Estrae dalla tabella Attivita il totale in mt di dislivello effettuato per la specilita (bdc, mtb, cc), per l'anno/mese e l'utente
	 * @param number $parAanno
	 * @param number $parMese
	 * @param number $parUtente
	 * @param string $parSpecialita
	 * @return number
	 */
	Public static function getDislivelloMese($parAanno, $parMese, $parUtente, $parSpecialita)
	{
		return Yii::$app->db->createCommand('SELECT sum(ats_dislivello) FROM attivita, mezzo_trasporto, tipologia_mzt WHERE ats_mezzo_trasporto_id = mzt_id AND mzt_tipologia_id = tmz_id AND YEAR(ats_data) = :curryear AND MONTH(ats_data) = :mese AND ats_utente_id = :utente AND tmz_tipologia = :tipobici')
				->bindValue(':curryear', $parAanno)
				->bindValue(':mese', $parMese)
				->bindValue(':utente', $parUtente)
				->bindValue(':tipobici', $parSpecialita)
				->queryScalar();
	}

	/**
     * Estrae tutti i componenti della specialita passata e per ognuno il totale dei km percorsi
     * @param string $parSpecialita
     * @return model
     */
    Public static function getKmPerComponenti($parSpecialita)
    {
//    	$query = 'SELECT mzt_mezzo_trasporto AS MEZZO, cmp_componente AS COMPONENTE, SUM( ats_distanza_km ) AS KM ';
    	$query = 'SELECT cmp_componente AS COMPONENTE, SUM( ats_distanza_km ) AS KM ';
    	$query = $query .'FROM componenti, mezzo_trasporto, tipologia_mzt, utilizzo_componente, attivita ';
    	$query = $query .'WHERE cmp_id = utc_componente_id ';
    	$query = $query .'AND cmp_mostra_in_home = true ';
    	$query = $query .'AND mzt_id = utc_mezzo_id ';
    	$query = $query .'AND tmz_id = mzt_tipologia_id ';
    	$query = $query .'AND mzt_id = ats_mezzo_trasporto_id ';
    	$query = $query .'AND ats_data >= utc_data_montaggio ';
    	$query = $query .'AND ats_data <= utc_data_smontaggio ';
    	$query = $query ."AND tmz_tipologia = '" .$parSpecialita ."'";
//    	$query = $query .'GROUP BY mzt_mezzo_trasporto, cmp_componente ';
		$query = $query .'GROUP BY cmp_componente ';
    	$query = $query .'ORDER BY SUM( ats_distanza_km ) DESC';
    	$command = Yii::$app->db->createCommand($query);
    	$dataReader=$command->query();
		return $dataReader->readAll();    
    }
}

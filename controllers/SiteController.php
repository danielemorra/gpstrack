<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\base\Model;
use app\models\Statistiche;		/*dm9-160224*/
use app\models\ParamSearch;
use app\models\StatisticheHomeForm;
use app\models\ObiettiviHomeForm;
// use app\models\Param;
// use app\models\Attivita;
use app\models\UtiliMesi;
use yii\helpers\ArrayHelper;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
    	/*dm9-160217*inizio**********/
    	// DM9-MEMO: array globale (? approfondire lo scope):	$this->view->params['XXX'];
    	
    	$modelHomeStat = new StatisticheHomeForm();
        /* carico in array i mesi dell'anno per combo scelta mese statistiche */
        /* TODO: inserire in cache la tabella dei mesi */
        $mesi = UtiliMesi::find()->all();
        $listMesi=ArrayHelper::map($mesi,'ume_mese_num','ume_mese_desc');
        if ($modelHomeStat->load(Yii::$app->request->post()) && $modelHomeStat->validate()) {
			$annoStat = $modelHomeStat->annoStatistiche;
            $meseStat = $modelHomeStat->meseStatistiche;
    	} else {
    		$annoStat = date("Y");
            $meseStat = date("n");
    	}
    	$arrayAnno = $this::getStatisticheAnnue($annoStat);
        $arrayMese = $this::getStatisticheMensili($annoStat, $meseStat);
        $array = array_merge($arrayAnno, $arrayMese);

        $modelHomeObiet = new ObiettiviHomeForm();
        if ($modelHomeObiet->load(Yii::$app->request->post()) && $modelHomeObiet->validate()) {
            $annoObiet = $modelHomeObiet->annoObiettivi;
        } else {
            $annoObiet = date("Y");
        }
//      TODO: rendere parametrici tramite l'anno gli obiettivi da monitorare (modificare DB tab Param)
//        $array = $this::getStatisticheAnnue($annoObiet);

        $paramSearch = new ParamSearch();
        
    	// Estrae l'obiettivo di km da effettuare per l'anno in corso da Param 
//     	$modelParamBdc = Param::findOne(['par_parametro' => 'obiettivo-km-annui-bdc',]);
    	$modelParamBdc = $paramSearch->estraiObiettivoKmAnnui('obiettivo-km-annui-bdc');
    	if ($modelParamBdc != null) {
    		$array['totWeekOfYear'] = $this::getNumSettAnnue();
	    	$array['totKmPerWeek'] = $this::getKmDaFarePerSettIpotetici(
	    											 $modelParamBdc->par_campo_num,	
	    											 $array['totWeekOfYear']); 
			// Calcola il numero delle settimana mancanti alla data odierna
	    	$array['totWeekRemain'] = $this::getSettAnnoRimanenti($array['totWeekOfYear']);
			// Calcola il totale di km da fare a settimana per raggiungere l'obiettivo
	    	$array['totKmWeekToDo'] =  $this::getKmDaFarePerSettEffettivi(
	    											   $modelParamBdc->par_campo_num,
	    											   $array['kmBdcAnnui'],
	    											   $array['totWeekRemain']);
    	}    	
    	$modelParamMtb = $paramSearch->estraiObiettivoKmAnnui('obiettivo-km-annui-mtb');
    	if ($modelParamMtb != null) {
    		$array['totKmPerWeek'] = $this::getKmDaFarePerSettIpotetici(
    												 $modelParamMtb->par_campo_num, 
    												 $array['totWeekOfYear']);
    		// Calcola il totale di km da fare a settimana per raggiungere l'obiettivo
    		$array['totKmWeekToDo'] = Statistiche::getKmDaFarePerSettEffettivi(
    												  $modelParamMtb->par_campo_num,
    												  $array['kmBdcAnnui'],
    												  $array['totWeekRemain']);
    	}
    	 
    	// Estrae tot. km fatto per ogni componente montato sull'attrezzatura per la BDC
    	$kmCompBdcArray = Statistiche::getKmPerComponenti('BDC'); 
    	// Estrae tot. km fatto per ogni componente montato sull'attrezzatura per la MTB
    	$kmCompMtbArray = Statistiche::getKmPerComponenti('MTB');
    	 
    	return $this->render('index', [
                'modelHomeStat' => $modelHomeStat,
                'listMesi' => $listMesi,
                'modelHomeObiet' => $modelHomeObiet,
    			'modelParamBdc' => $modelParamBdc,
                'modelParamMtb' => $modelParamMtb,
    			'array' => $array,
    			'kmCompBdcArray' => $kmCompBdcArray,
    			'kmCompMtbArray' => $kmCompMtbArray,
    	]);
    	/*dm9-160217*fine**********/
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

//        return $this->goHome();
        $model = new LoginForm();
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    
    /**
     * Estare il numero di settmane totali dell'anno corrente
     * @return number
     */
    Public function getNumSettAnnue()
    {
		return idate('W', mktime(0, 0, 0, 12, 27, date("Y")));    	
    }
    
    /**
     * Calcola il km da fare ogni settimana in base all'obiettivo estratto da Param e al numero totale di settimane annue
     * @param number $parKmObiett
     * @param number $parTotSettAnnue
     */
    Public function getKmDaFarePerSettIpotetici($parKmObiett, $parTotSettAnnue)
    {
		return $parKmObiett / $parTotSettAnnue;    	
    }
    
    /**
     * Calcola il numero di settimane rimanenti fino a fine anno
     * @param number $totSettAnnue
     * @return number
     */
    Public function getSettAnnoRimanenti($totSettAnnue)
    {
		return $totSettAnnue - date("W");
    }
    
    /**
     * Calcola i km da fare ogni settimana per raggiungere l'obiettivo sulla base dei km fatti finora 
     * @param number $parKmObiett
     * @param number $kmFatti
     * @param number $settAnnueMancanti
     */
    Public function getKmDaFarePerSettEffettivi($parKmObiett, $kmFatti, $settAnnueMancanti)
    {
		return ($parKmObiett - $kmFatti) / $settAnnueMancanti;    	
    }
    
    Public function getStatisticheAnnue($anno)
    {
    	// Estrae tot. km, dislivello per l'utente loggato nell'anno in corso per la BDC
    	$array['kmBdcAnnui'] = Statistiche::getKmAnnui($anno,
    			Yii::$app->user->id,
    			'BDC');
    	$array['salBdcAnnui'] = Statistiche::getDislivelloAnnuo($anno,
    			Yii::$app->user->id,
    			'BDC');
    	// Estrae tot. km, dislivello per l'utente loggato nell'anno in corso per la MTB
    	$array['kmMtbAnnui'] = Statistiche::getKmAnnui($anno,
    			Yii::$app->user->id,
    			'MTB');
    	$array['salMtbAnnui'] = Statistiche::getDislivelloAnnuo($anno,
    			Yii::$app->user->id, 'MTB');
    	// Estrae tot. km, dislivello per l'utente loggato nell'anno in corso per la Corsa
    	$array['kmRunAnnui'] = Statistiche::getKmAnnui($anno,
    			Yii::$app->user->id,
    			'CORSA');
    	$array['salRunAnnui'] = Statistiche::getDislivelloAnnuo($anno,
    			Yii::$app->user->id,
    			'CORSA');
    	return $array;
    }

    Public function getStatisticheMensili($anno, $mese)
    {
        // Estrae tot. km, dislivello per l'utente loggato nell'anno/mese in corso per la BDC
        $array['kmBdcMese'] = Statistiche::getKmMese($anno, $mese,
                                    Yii::$app->user->id,
                                    'BDC');
        $array['salBdcMese'] = Statistiche::getDislivelloMese($anno, $mese,
                                    Yii::$app->user->id,
                                    'BDC');
        // Estrae tot. km, dislivello per l'utente loggato nell'anno in corso per la MTB
        $array['kmMtbMese'] = Statistiche::getKmMese($anno, $mese,
                                    Yii::$app->user->id,
                                    'MTB');
        $array['salMtbMese'] = Statistiche::getDislivelloMese($anno, $mese,
                                    Yii::$app->user->id, 'MTB');
        // Estrae tot. km, dislivello per l'utente loggato nell'anno in corso per la Corsa
        $array['kmRunMese'] = Statistiche::getKmMese($anno, $mese,
                                    Yii::$app->user->id,
                                    'CORSA');
        $array['salRunMese'] = Statistiche::getDislivelloMese($anno, $mese,
                                    Yii::$app->user->id,
                                    'CORSA');
        return $array;
    }
}

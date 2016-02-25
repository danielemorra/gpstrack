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
// use app\models\Param;
// use app\models\Attivita;

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
    	
//         $statistiche = new Statistiche();
        $paramSearch = new ParamSearch();
        
        // Estrae tot. km, dislivello per l'utente loggato nell'anno in corso per la BDC
    	$array['kmBdcCurrYear'] = Statistiche::getKmAnnui(date("Y"), 
    											  	Yii::$app->params['idUtenteDm9'], 
    											  	'BDC'); 
    	$array['salBdcCurrYear'] = Statistiche::getDislivelloAnnuo(date("Y"), 
    											   	Yii::$app->params['idUtenteDm9'], 
    												'BDC'); 
    	// Estrae tot. km, dislivello per l'utente loggato nell'anno in corso per la MTB
    	$array['kmMtbCurrYear'] = Statistiche::getKmAnnui(date("Y"), 
    												Yii::$app->params['idUtenteDm9'], 
    												'MTB'); 
    	$array['salMtbCurrYear'] = Statistiche::getDislivelloAnnuo(date("Y"), 
    												Yii::$app->params['idUtenteDm9'], 'MTB'); 
    	// Estrae tot. km, dislivello per l'utente loggato nell'anno in corso per la Corsa
    	$array['kmRunCurrYear'] = Statistiche::getKmAnnui(date("Y"), 
    												Yii::$app->params['idUtenteDm9'], 
    												'CORSA'); 
    	$array['salRunCurrYear'] = Statistiche::getDislivelloAnnuo(date("Y"), 
    												Yii::$app->params['idUtenteDm9'], 
    												'CORSA'); 
    	 
    	// Estrae l'obiettivo di km da effettuare per l'anno in corso da Param 
//     	$modelParamBdc = Param::findOne(['par_parametro' => 'obiettivo-km-annui-bdc',]);
    	$modelParamBdc = $paramSearch->estraiObiettivoKmAnnui('obiettivo-km-annui-bdc');
    	if ($modelParamBdc != null) {
    		$array['totWeekOfYear'] = SiteController::getNumSettAnnue();
	    	$array['totKmPerWeek'] = SiteController::getKmDaFarePerSettIpotetici(
	    											 $modelParamBdc->par_campo_num,	
	    											 $array['totWeekOfYear']); 
			// Calcola il numero delle settimana mancanti alla data odierna
	    	$array['totWeekRemain'] = SiteController::getSettAnnoRimanenti($array['totWeekOfYear']);
			// Calcola il totale di km da fare a settimana per raggiungere l'obiettivo
	    	$array['totKmWeekToDo'] =  SiteController::getKmDaFarePerSettEffettivi(
	    											   $modelParamBdc->par_campo_num,
	    											   $array['kmBdcCurrYear'],
	    											   $array['totWeekRemain']);
    	}    	
    	$modelParamMtb = $paramSearch->estraiObiettivoKmAnnui('obiettivo-km-annui-mtb');
    	if ($modelParamMtb != null) {
    		$array['totKmPerWeek'] = SiteController::getKmDaFarePerSettIpotetici(
    												 $modelParamMtb->par_campo_num, 
    												 $array['totWeekOfYear']);
    		// Calcola il totale di km da fare a settimana per raggiungere l'obiettivo
    		$array['totKmWeekToDo'] = Statistiche::getKmDaFarePerSettEffettivi(
    												  $modelParamMtb->par_campo_num,
    												  $array['kmBdcCurrYear'],
    												  $array['totWeekRemain']);
    	}
    	 
    	// Estrae tot. km fatto per ogni componente montato sull'attrezzatura per la BDC
    	$kmCompBdcArray = Statistiche::getKmPerComponenti('BDC'); 
    	// Estrae tot. km fatto per ogni componente montato sull'attrezzatura per la MTB
    	$kmCompMtbArray = Statistiche::getKmPerComponenti('MTB');
    	 
    	return $this->render('index', [
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

        return $this->goHome();
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
}

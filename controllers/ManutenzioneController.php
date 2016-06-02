<?php

namespace app\controllers;

use Yii;
use app\models\Manutenzione;
use app\models\ManutenzioneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;	/*dm9-160223*/
use app\models\Componenti;  	/*dm9-160223*/

/**
 * ManutenzioneController implements the CRUD actions for Manutenzione model.
 */
class ManutenzioneController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Manutenzione models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ManutenzioneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Manutenzione model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Manutenzione model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Manutenzione();

        /*dm9-160227*inizio************/
		$dataOdiernaSQL = date('Y-m-d');
        $modelComponenti=ArrayHelper::map(Componenti::find()
        		->where('cmp_data_dismissione >= :dtOdierna', ['dtOdierna'=>$dataOdiernaSQL])
        		->orderby('cmp_componente')
        		->asArray()
        		->all(), 'cmp_id', 'cmp_componente');
        /*dm9-160227*fine************/
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->mtz_id]);
        } else {
            $model->mtz_data_interv = date('Y-m-d');
            $model->mtz_data_inizio_tracking = date('Y-m-d');
//            $model->mtz_data_fine_tracking = date('Y-m-d H:i:s', strtotime('9999-12-31 23:59:59'));
            $date = '9999-12-31T23:59:59.999-06:00';
            $model->mtz_data_fine_tracking = date_format(  date_create($date) , 'Y-m-d');
            return $this->render('create', [
                'model' => $model,
        		'modelComponenti' => $modelComponenti,		/*dm9-160227*/
            ]);
        }
    }

    /**
     * Updates an existing Manutenzione model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        /*dm9-160223*inizio************/
		$dataOdiernaSQL = date('Y-m-d');
        $modelComponenti=ArrayHelper::map(Componenti::find()
        		->where('cmp_data_dismissione >= :dtOdierna', ['dtOdierna'=>$dataOdiernaSQL])
        		->orderby('cmp_componente')
        		->asArray()
        		->all(), 'cmp_id', 'cmp_componente');
        /*dm9-160223*fine************/
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->mtz_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
        		'modelComponenti' => $modelComponenti,		/*dm9-160227*/
            		]);
        }
    }

    /**
     * Deletes an existing Manutenzione model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Manutenzione model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function action1click($id)
    {
        $manutDaChiudere = $this->findModel($id);

        $transaction = Manutenzione::getDb()->beginTransaction();
        try {
            // Chiude la manutenzione cliccata impostando la data fine track alla data del giorno - 1
            $date = date('Y-m-d');
//            $newdate = strtotime ( '-1 day’' , strtotime ( $date ) ) ;
//            $newdate = date ( 'Y-m-d' , $newdate );
//            $manutDaChiudere->mtz_data_fine_tracking = $newdate;
//            $date->sub(new DateInterval('P1D'));
//            $manutDaChiudere->mtz_data_fine_tracking = $date->format('Y-m-d');
            $manutDaChiudere->mtz_data_fine_tracking = date("Y-m-d",strtotime("-1 day"));
            $manutDaChiudere->save(false);

            // apre una manutenzione dello stesso tipo cliccata impostando la data fine track alla data del giorno
            $manutDaAprire = new Manutenzione();
            $manutDaAprire->mtz_data_interv = date('Y-m-d');
            $manutDaAprire->mtz_descrizione = $manutDaChiudere->mtz_descrizione;
            $manutDaAprire->mtz_componente_id = $manutDaChiudere->mtz_componente_id;
            $manutDaAprire->mtz_data_inizio_tracking = date('Y-m-d');
            $manutDaAprire->mtz_data_fine_tracking = "9999-12-31";
            $manutDaAprire->save(false);

            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Manutenzione model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Manutenzione the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Manutenzione::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

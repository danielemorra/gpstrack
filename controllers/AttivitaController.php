<?php

namespace app\controllers;

use Yii;
use app\models\Attivita;
use app\models\AttivitaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;	/*dm9-160223*/
use app\models\MezzoTrasporto;  /*dm9-160223*/

/**
 * AttivitaController implements the CRUD actions for Attivita model.
 */
class AttivitaController extends Controller
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
     * Lists all Attivita models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AttivitaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Attivita model.
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
     * Creates a new Attivita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Attivita();
        /* TODO: implementare gestione utenti e sostituire con utente attivo*/
        $model->setAttribute('ats_utente_id', Yii::$app->params['idUtenteDm9']);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ats_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Attivita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        /*dm9-160223*inizio************************/
        $dataOdiernaSQL = date('Y-m-d');
        $modelMezzoTrasporto=ArrayHelper::map(MezzoTrasporto::find()
        		->where('mzt_data_inizio_utilizzo <= :dtOdierna and mzt_data_fine_utilizzo >= :dtOdierna', ['dtOdierna'=>$dataOdiernaSQL])
        		->orderby('mzt_mezzo_trasporto')
        		->asArray()
        		->all(), 'mzt_id', 'mzt_mezzo_trasporto');
        /*dm9-160223*inizio************************/
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ats_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelMezzoTrasporto' => $modelMezzoTrasporto,		/*dm9-160223*/
            ]);
        }
    }

    /**
     * Deletes an existing Attivita model.
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
     * Finds the Attivita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Attivita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Attivita::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

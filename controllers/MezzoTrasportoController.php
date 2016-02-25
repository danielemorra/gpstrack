<?php

namespace app\controllers;

use Yii;
use app\models\MezzoTrasporto;
use app\models\MezzoTrasportoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;	/*dm9-160223*/
use app\models\TipologiaMzt;    /*dm9-160223*/

/**
 * MezzoTrasportoController implements the CRUD actions for MezzoTrasporto model.
 */
class MezzoTrasportoController extends Controller
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
     * Lists all MezzoTrasporto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MezzoTrasportoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MezzoTrasporto model.
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
     * Creates a new MezzoTrasporto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MezzoTrasporto();
        /* TODO: implementare gestione utenti e sostituire con utente attivo*/
        $model->setAttribute('mzt_utente_id', Yii::$app->params['idUtenteDm9']);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->mzt_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MezzoTrasporto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        /*dm9-160223*inizio*********************/
        $modelTipologia=ArrayHelper::map(TipologiaMzt::find()
        		->orderby('tmz_tipologia')
        		->asArray()
        		->all(), 'tmz_id', 'tmz_tipologia');
        /*dm9-160223*fine*********************/
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->mzt_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            	'modelTipologia' => $modelTipologia,		/*dm9-160223*/	
            ]);
        }
    }

    /**
     * Deletes an existing MezzoTrasporto model.
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
     * Finds the MezzoTrasporto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return MezzoTrasporto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MezzoTrasporto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

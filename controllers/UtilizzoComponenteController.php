<?php

namespace app\controllers;

use Yii;
use app\models\UtilizzoComponente;
use app\models\UtilizzoComponenteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;	/*dm9-160223*/
use app\models\MezzoTrasporto;  /*dm9-160223*/
use app\models\Componenti;  	/*dm9-160223*/

/**
 * UtilizzoComponenteController implements the CRUD actions for UtilizzoComponente model.
 */
class UtilizzoComponenteController extends Controller
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
     * Lists all UtilizzoComponente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UtilizzoComponenteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UtilizzoComponente model.
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
     * Creates a new UtilizzoComponente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UtilizzoComponente();

        /*dm9-160227*inizio*************/
		$dataOdiernaSQL = date('Y-m-d');
        $modelComponenti=ArrayHelper::map(Componenti::find()
        		->orderby('cmp_componente')
        		->asArray()
        		->all(), 'cmp_id', 'cmp_componente');

        $modelMezzoTrasporto=ArrayHelper::map(MezzoTrasporto::find()
        		->where('mzt_data_inizio_utilizzo <= :dtOdierna and mzt_data_fine_utilizzo >= :dtOdierna', ['dtOdierna'=>$dataOdiernaSQL])
        		->orderby('mzt_mezzo_trasporto')
        		->asArray()
        		->all(), 'mzt_id', 'mzt_mezzo_trasporto');
        /*dm9-160227*fine*************/
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->utc_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelComponenti' => $modelComponenti,				/*dm9-160227*/
                'modelMezzoTrasporto' => $modelMezzoTrasporto,		/*dm9-160227*/
            ]);
        }
    }

    /**
     * Updates an existing UtilizzoComponente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        /*dm9-160223*inizio*************/
		$dataOdiernaSQL = date('Y-m-d');
        $modelComponenti=ArrayHelper::map(Componenti::find()
        		->orderby('cmp_componente')
        		->asArray()
        		->all(), 'cmp_id', 'cmp_componente');

        $modelMezzoTrasporto=ArrayHelper::map(MezzoTrasporto::find()
        		->where('mzt_data_inizio_utilizzo <= :dtOdierna and mzt_data_fine_utilizzo >= :dtOdierna', ['dtOdierna'=>$dataOdiernaSQL])
        		->orderby('mzt_mezzo_trasporto')
        		->asArray()
        		->all(), 'mzt_id', 'mzt_mezzo_trasporto');
        /*dm9-160223*fine*************/
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->utc_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelComponenti' => $modelComponenti,				/*dm9-160223*/
                'modelMezzoTrasporto' => $modelMezzoTrasporto,		/*dm9-160223*/
            ]);
        }
    }

    /**
     * Deletes an existing UtilizzoComponente model.
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
     * Finds the UtilizzoComponente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return UtilizzoComponente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UtilizzoComponente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

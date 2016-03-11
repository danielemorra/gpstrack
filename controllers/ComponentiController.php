<?php

namespace app\controllers;

use Yii;
use app\models\Componenti;
use app\models\ComponentiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;			/*dm9-160223*/
use app\models\Fornitori;				/*dm9-160223*/
use app\models\Categoria;				/*dm9-160223*/
use app\models\UbicazioneComponente;	/*dm9-160223*/

/**
 * ComponentiController implements the CRUD actions for Componenti model.
 */
class ComponentiController extends Controller
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
     * Lists all Componenti models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ComponentiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Componenti model.
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
     * Creates a new Componenti model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Componenti();

        /*dm9-160227*inizio******************/
        $modelFornitori=ArrayHelper::map(Fornitori::find()
        		->orderby('frn_nome')
        		->asArray()
        		->all(), 'frn_id', 'frn_nome');
        
        $modelCategoria=ArrayHelper::map(Categoria::find()
        		->orderby('cat_categoria')
        		->asArray()
        		->all(), 'cat_id', 'cat_categoria');

        $modelUbicazCompon=ArrayHelper::map(UbicazioneComponente::find()
				->orderby('ubc_ubicazione','ubc_contenitore')
				->asArray()
				->all(), 'ubc_id', 'ubc_contenitore', 'ubc_ubicazione');    
		/*dm9-160227*fine******************/

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cmp_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelFornitori' => $modelFornitori,		/*dm9-160227*/
                'modelCategoria' => $modelCategoria,		/*dm9-160227*/
                'modelUbicazCompon' => $modelUbicazCompon,	/*dm9-160227*/
            ]);
        }
    }

    /**
     * Updates an existing Componenti model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        /*dm9-160223*inizio******************/
        $modelFornitori=ArrayHelper::map(Fornitori::find()
        		->orderby('frn_nome')
        		->asArray()
        		->all(), 'frn_id', 'frn_nome');
        
        $modelCategoria=ArrayHelper::map(Categoria::find()
        		->orderby('cat_categoria')
        		->asArray()
        		->all(), 'cat_id', 'cat_categoria');

        $modelUbicazCompon=ArrayHelper::map(UbicazioneComponente::find()
				->orderby('ubc_ubicazione','ubc_contenitore')
				->asArray()
				->all(), 'ubc_id', 'ubc_contenitore', 'ubc_ubicazione');    
		/*dm9-160223*fine******************/

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cmp_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelFornitori' => $modelFornitori,		/*dm9-160223*/
                'modelCategoria' => $modelCategoria,		/*dm9-160223*/
                'modelUbicazCompon' => $modelUbicazCompon,	/*dm9-160223*/
            ]);
        }
    }

    /**
     * Deletes an existing Componenti model.
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
     * Finds the Componenti model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Componenti the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Componenti::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

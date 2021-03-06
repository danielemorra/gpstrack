<?php

namespace app\controllers;

use app\models\SfidaSpecialita;
use app\models\TipologiaMzt;
use Yii;
use app\models\Sfida;
use app\models\SfidaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SfidaController implements the CRUD actions for Sfida model.
 */
class SfidaController extends Controller
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
     * Lists all Sfida models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SfidaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sfida model.
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
     * Creates a new Sfida model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($sfdObt)
    {
        $model = new Sfida();
        $modelSpecialita=ArrayHelper::map(SfidaSpecialita::find()
            ->orderby('sfs_specialita')
            ->asArray()
            ->all(), 'sfs_id', 'sfs_specialita');
        $modelTipologia=ArrayHelper::map(TipologiaMzt::find()
            ->orderby('tmz_tipologia')
            ->asArray()
            ->all(), 'tmz_id', 'tmz_tipologia');

        if ($sfdObt == 'S') {
            $model->scenario = 'sfida';
            $model->sfd_sfida_obiet = 1;
        }
        else {
            $model->scenario = 'obiettivo';
            $model->sfd_sfida_obiet = 2;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sfd_id]);
        } else {
            $model->sfd_data_pubblicaz = date('Y-m-d');
            $model->sfd_data_inizio = date('Y-m-d');
//            $model->sfd_data_fine = date('Y-m-d', strtotime('20351231'));
            $date = '9999-12-31T23:59:59.999-06:00';
            $model->sfd_data_fine = date_format(  date_create($date) , 'Y-m-d');
            return $this->render('create', [
                'model' => $model,
                'modelSpecialita' => $modelSpecialita,
                'modelTipologia' => $modelTipologia,
            ]);
        }
    }

    /**
     * Updates an existing Sfida model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelSpecialita=ArrayHelper::map(SfidaSpecialita::find()
            ->orderby('sfs_specialita')
            ->asArray()
            ->all(), 'sfs_id', 'sfs_specialita');
        $modelTipologia=ArrayHelper::map(TipologiaMzt::find()
            ->orderby('tmz_tipologia')
            ->asArray()
            ->all(), 'tmz_id', 'tmz_tipologia');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sfd_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelSpecialita' => $modelSpecialita,
                'modelTipologia' => $modelTipologia,
            ]);
        }
    }

    /**
     * Deletes an existing Sfida model.
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
     * Finds the Sfida model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Sfida the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sfida::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

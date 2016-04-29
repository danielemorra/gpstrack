<?php

namespace app\controllers;

use app\models\SfidaIscrizioneForm;
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
class SfidaIscrizioneController extends Controller
{
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * Visualizza tutte le sfide in base ai filtri selezionati.
     * @return mixed
     */
    public function actionIndex()
    {
        // Istanzia il model per l'iscrizione alle sfide
        $sfidaIscrizModel = new SfidaIscrizioneForm();

        // Estrae tutte le specialità per combo filtro
        $specialitaDb = SfidaSpecialita::find()->all();
        $listSpecialita=ArrayHelper::map($specialitaDb,'sfs_id','sfs_specialita');

        // Estrae tutte le tipologie per combo filtro
        $tipologiaDb = TipologiaMzt::find()->all();
        $listTipologia=ArrayHelper::map($tipologiaDb,'tmz_id','tmz_tipologia');

        $statoSfida = null;
        $specialita = null;
        $tipologia = null;
        if ($sfidaIscrizModel->load(Yii::$app->request->post()) && $sfidaIscrizModel->validate()) {
            $statoSfida = $sfidaIscrizModel->statoSfida;
            $specialita = $sfidaIscrizModel->specialita;
            $tipologia = $sfidaIscrizModel->tipologia;
        } else {
            $sfidaIscrizModel->statoSfida = "1";
        }
        $sfidaModel = SfidaSearch::getSfide($statoSfida, $specialita, $tipologia);

        return $this->render('index', [
            'sfidaIscrizModel' => $sfidaIscrizModel,
            'listSpecialita' => $listSpecialita,
            'listTipologia' => $listTipologia,
            'sfidaModel' => $sfidaModel,
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
    public function actionCreate()
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sfd_id]);
        } else {
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

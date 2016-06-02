<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Attivita */

$this->title = 'Modifica Uscita: ' . ' ' . $model->ats_data;
$this->params['breadcrumbs'][] = ['label' => 'Uscite', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ats_data, 'url' => ['view', 'id' => $model->ats_id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="attivita-update">

    <h1><?= Html::encode($model->ats_data. ' '.$model->ats_percorso) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelMezzoTrasporto' => $modelMezzoTrasporto,		/*dm9-160223*/
    ]) ?>

</div>

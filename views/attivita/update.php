<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Attivita */

$this->title = 'Update Attivita: ' . ' ' . $model->ats_id;
$this->params['breadcrumbs'][] = ['label' => 'Attivitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ats_id, 'url' => ['view', 'id' => $model->ats_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attivita-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelMezzoTrasporto' => $modelMezzoTrasporto,		/*dm9-160223*/
    ]) ?>

</div>

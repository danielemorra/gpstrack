<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MezzoTrasporto */

$this->title = 'Update Mezzo Trasporto: ' . ' ' . $model->mzt_id;
$this->params['breadcrumbs'][] = ['label' => 'Mezzo Trasportos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mzt_id, 'url' => ['view', 'id' => $model->mzt_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mezzo-trasporto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'modelTipologia' => $modelTipologia,	/*dm9-160223*/	
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MezzoTrasporto */

$this->title = 'Modifica Attrezzatura: ' . ' ' . $model->mzt_mezzo_trasporto;
$this->params['breadcrumbs'][] = ['label' => 'Attrezzatura', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mzt_mezzo_trasporto, 'url' => ['view', 'id' => $model->mzt_id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="mezzo-trasporto-update">

    <h1><?= Html::encode($model->mzt_mezzo_trasporto) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'modelTipologia' => $modelTipologia,	/*dm9-160223*/	
    ]) ?>

</div>

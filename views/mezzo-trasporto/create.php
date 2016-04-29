<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MezzoTrasporto */

$this->title = 'Nuova Attrezzatura';
$this->params['breadcrumbs'][] = ['label' => 'Attrezzatura', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mezzo-trasporto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'modelTipologia' => $modelTipologia,		/*dm9-160227*/
    		
    ]) ?>

</div>

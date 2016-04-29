<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipologiaMzt */

$this->title = 'Modifica Tipologia Attrezzatura: ' . ' ' . $model->tmz_tipologia;
$this->params['breadcrumbs'][] = ['label' => 'Tipologia Attrezzatura', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tmz_tipologia, 'url' => ['view', 'id' => $model->tmz_id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="tipologia-mzt-update">

    <h1><?= Html::encode($model->tmz_tipologia) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

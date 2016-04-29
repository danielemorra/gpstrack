<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Manutenzione */

$this->title = 'Modifica Manutenzione: ' . ' ' . $model->mtz_descrizione;
$this->params['breadcrumbs'][] = ['label' => 'Manutenzioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mtz_descrizione, 'url' => ['view', 'id' => $model->mtz_id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="manutenzione-update">

    <h1><?= Html::encode($model->mtz_descrizione) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelComponenti' => $modelComponenti,
    ]) ?>

</div>

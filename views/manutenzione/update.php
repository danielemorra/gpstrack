<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Manutenzione */

$this->title = 'Update Manutenzione: ' . ' ' . $model->mtz_id;
$this->params['breadcrumbs'][] = ['label' => 'Manutenziones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mtz_id, 'url' => ['view', 'id' => $model->mtz_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manutenzione-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelComponenti' => $modelComponenti,
    ]) ?>

</div>

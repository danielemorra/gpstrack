<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UbicazioneComponente */

$this->title = 'Modifica Ubicazione Componente: ' . ' ' . $model->ubc_contenitore;
$this->params['breadcrumbs'][] = ['label' => 'Ubicazione Componenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ubc_contenitore, 'url' => ['view', 'id' => $model->ubc_id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="ubicazione-componente-update">

    <h1><?= Html::encode($model->ubc_contenitore) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

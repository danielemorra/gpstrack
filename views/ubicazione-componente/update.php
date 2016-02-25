<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UbicazioneComponente */

$this->title = 'Update Ubicazione Componente: ' . ' ' . $model->ubc_id;
$this->params['breadcrumbs'][] = ['label' => 'Ubicazione Componentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ubc_id, 'url' => ['view', 'id' => $model->ubc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ubicazione-componente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SfidaUtente */

$this->title = 'Update Sfida Utente: ' . ' ' . $model->sfu_id;
$this->params['breadcrumbs'][] = ['label' => 'Sfida Utentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sfu_id, 'url' => ['view', 'id' => $model->sfu_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sfida-utente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

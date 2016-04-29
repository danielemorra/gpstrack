<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SfidaUtente */

$this->title = 'Modifica Sfida Utente: ' . ' ' . $model->sfu_id;
$this->params['breadcrumbs'][] = ['label' => 'Sfida Utente', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sfuSfida->sfd_titolo, 'url' => ['view', 'id' => $model->sfu_id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="sfida-utente-update">

    <h1><?= Html::encode($model->sfuSfida->sfd_titolo) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

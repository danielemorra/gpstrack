<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SfidaUtente */

$this->title = 'Sfida Utente | ' .$model->sfuSfida->sfd_titolo;
$this->params['breadcrumbs'][] = ['label' => 'Sfida Utente', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->sfuSfida->sfd_titolo;
?>
<div class="sfida-utente-view">

    <h1><?= Html::encode($model->sfuSfida->sfd_titolo) ?></h1>

    <p>
        <?= Html::a('Nuova Sfida Utente', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Modifica', ['update', 'id' => $model->sfu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Elimina', ['delete', 'id' => $model->sfu_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Vuoi eliminare defitivamente questa Sfida Utente ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sfu_id',
            'sfu_obiettivo_raggiunto',
            'sfu_utente_id',
            'sfu_sfida_id',
            'sfu_flag_obiettivo_centrato',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Attivita */

$this->title = $model->ats_id;
$this->params['breadcrumbs'][] = ['label' => 'Attivitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attivita-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ats_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ats_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ats_id',
            'ats_data',
            'ats_mezzo_trasporto_id',
            'ats_tempo',
            'ats_distanza_km',
            'ats_dislivello',
            'ats_percorso',
            'ats_utente_id',
        ],
    ]) ?>

</div>

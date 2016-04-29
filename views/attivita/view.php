<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Attivita */

$this->title = 'Uscita | ' .$model->ats_data;
$this->params['breadcrumbs'][] = ['label' => 'Uscita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->ats_data;
?>
<div class="attivita-view">

    <h1><?= Html::encode($model->ats_data. ' '.$model->ats_percorso) ?></h1>

    <p>
        <?php if(!Yii::$app->user->isGuest ){ ?>
            <?= Html::a('Nuova Uscita', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Modifica', ['update', 'id' => $model->ats_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Elimina', ['delete', 'id' => $model->ats_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Vuoi eliminare defitivamente questa uscita ?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ats_id',
            'ats_data',
            [
                'label' => 'Attrezzatura',
                'value' => $model->atsMezzoTrasporto->mzt_mezzo_trasporto,
            ],
            'ats_tempo',
            'ats_distanza_km',
            'ats_dislivello',
            'ats_percorso',
            [
                'label' => 'Utente',
                'value' => $model->atsUtente->ute_username .' ('. $model->ats_utente_id .')',
            ],
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Manutenzione */

$this->title = 'Manutenzioni | ' .$model->mtz_descrizione;
$this->params['breadcrumbs'][] = ['label' => 'Manutenzioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->mtz_descrizione;
?>
<div class="manutenzione-view">

    <h1><?= Html::encode($model->mtz_descrizione) ?></h1>

    <p>
        <?php if(!Yii::$app->user->isGuest ){ ?>
            <?= Html::a('Nuova Manutenzione', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Modifica', ['update', 'id' => $model->mtz_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Elimina', ['delete', 'id' => $model->mtz_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Vuoi eliminare defitivamente questa Manutenzione ?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mtz_id',
            'mtz_data_interv',
            'mtz_descrizione',
            [
                'label' => 'Componente',
                'value' => $model->mtzComponente->cmp_componente,
            ],
            'mtz_data_inizio_tracking',
            'mtz_data_fine_tracking',
        ],
    ]) ?>

</div>

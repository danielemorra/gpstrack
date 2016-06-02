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
//            'mtz_data_interv',
            [
                'attribute'=>'mtz_data_interv',
                'value' => $model->mtz_data_interv,
                'format'=>['Date','php: d/m/Y']
            ],
            'mtz_descrizione',
            [
                'label' => 'Componente',
                'value' => $model->mtzComponente->cmp_componente,
            ],
//            'mtz_data_inizio_tracking',
            [
                'attribute'=>'mtz_data_inizio_tracking',
                'value' => $model->mtz_data_inizio_tracking,
                'format'=>['Date','php: d/m/Y']
            ],
//            'mtz_data_fine_tracking',
            [
                'attribute'=>'mtz_data_fine_tracking',
//                'value' => $model->getDataFineTracking(),
//                'format'=> 'Text'
                'value' => $model->mtz_data_fine_tracking,
                'format'=>['Date','php: d/m/Y']
            ],
        ],
    ]) ?>

</div>

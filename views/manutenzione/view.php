<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Manutenzione */

$this->title = $model->mtz_id;
$this->params['breadcrumbs'][] = ['label' => 'Manutenziones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manutenzione-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mtz_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mtz_id], [
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
            'mtz_id',
            'mtz_data_interv',
            'mtz_descrizione',
            'mtz_componente_id',
            'mtz_data_inizio_tracking',
            'mtz_data_fine_tracking',
        ],
    ]) ?>

</div>

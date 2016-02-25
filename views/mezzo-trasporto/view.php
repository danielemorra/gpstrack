<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MezzoTrasporto */

$this->title = $model->mzt_id;
$this->params['breadcrumbs'][] = ['label' => 'Mezzo Trasportos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mezzo-trasporto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mzt_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mzt_id], [
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
            'mzt_id',
            'mzt_mezzo_trasporto',
            'mzt_data_inizio_utilizzo',
            'mzt_data_fine_utilizzo',
            'mzt_tipologia_id',
            'mzt_utente_id',
        ],
    ]) ?>

</div>

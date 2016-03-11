<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sfida */

$this->title = $model->sfd_id;
$this->params['breadcrumbs'][] = ['label' => 'Sfidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sfida-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->sfd_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sfd_id], [
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
            'sfd_id',
            'sfd_titolo',
            'sfd_sotto_titolo',
            'sfd_descrizione',
            'sfd_data_pubblicaz',
            'sfd_data_inizio',
            'sfd_data_fine',
            'sfd_specialita_id',
            'sfd_tipologia_id',
            'sfd_obiettivo',
        ],
    ]) ?>

</div>

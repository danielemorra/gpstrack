<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UbicazioneComponente */

$this->title = $model->ubc_id;
$this->params['breadcrumbs'][] = ['label' => 'Ubicazione Componentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ubicazione-componente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ubc_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ubc_id], [
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
            'ubc_id',
            'ubc_contenitore',
            'ubc_ubicazione',
            'ubc_note',
        ],
    ]) ?>

</div>

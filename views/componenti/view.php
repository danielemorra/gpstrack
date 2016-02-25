<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Componenti */

$this->title = $model->cmp_id;
$this->params['breadcrumbs'][] = ['label' => 'Componentis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="componenti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cmp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cmp_id], [
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
            'cmp_id',
            'cmp_marca',
            'cmp_modello',
            'cmp_componente',
            'cmp_qta_acq',
            'cmp_prz_acq_unit',
            'cmp_data_acquisto',
            'cmp_data_dismissione',
            'cmp_qta_util',
            'cmp_mystuff2',
            'cmp_id_frn',
            'cmp_id_cat',
            'cmp_id_ubc',
            'cmp_note',
        ],
    ]) ?>

</div>

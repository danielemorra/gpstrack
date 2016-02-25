<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UtilizzoComponente */

$this->title = $model->utc_id;
$this->params['breadcrumbs'][] = ['label' => 'Utilizzo Componentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilizzo-componente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->utc_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->utc_id], [
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
            'utc_id',
            'utc_componente_id',
            'utc_qta_utilizzo',
            'utc_mezzo_id',
            'utc_data_montaggio',
            'utc_data_smontaggio',
        ],
    ]) ?>

</div>

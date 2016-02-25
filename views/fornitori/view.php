<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fornitori */

$this->title = $model->frn_id;
$this->params['breadcrumbs'][] = ['label' => 'Fornitoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornitori-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->frn_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->frn_id], [
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
            'frn_id',
            'frn_nome',
            'frn_sito_web',
        ],
    ]) ?>

</div>

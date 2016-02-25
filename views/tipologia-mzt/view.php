<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TipologiaMzt */

$this->title = $model->tmz_id;
$this->params['breadcrumbs'][] = ['label' => 'Tipologia Mzts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipologia-mzt-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tmz_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tmz_id], [
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
            'tmz_id',
            'tmz_tipologia',
        ],
    ]) ?>

</div>

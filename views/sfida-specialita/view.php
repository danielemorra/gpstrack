<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SfidaSpecialita */

$this->title = 'Specialita Sfida | ' .$model->sfs_specialita;
$this->params['breadcrumbs'][] = ['label' => 'Specialita Sfida', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->sfs_specialita;
?>
<div class="sfida-specialita-view">

    <h1><?= Html::encode($model->sfs_specialita) ?></h1>

    <p>
        <?= Html::a('Nuova Specialita', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Modifica', ['update', 'id' => $model->sfs_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Elimina', ['delete', 'id' => $model->sfs_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Vuoi eliminare defitivamente questa Specialita Sfida ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sfs_id',
            'sfs_specialita',
            'sfs_um',
        ],
    ]) ?>

</div>

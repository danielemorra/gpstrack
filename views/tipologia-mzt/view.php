<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TipologiaMzt */

$this->title = $model->tmz_id;
$this->title = 'Tipologia Attrezzatura | ' .$model->tmz_tipologia;
$this->params['breadcrumbs'][] = ['label' => 'Tipologia Attrezzatura', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->tmz_tipologia;
?>
<div class="tipologia-mzt-view">

    <h1><?= Html::encode($model->tmz_tipologia) ?></h1>

    <p>
        <?= Html::a('Nuova Tipologia', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Modifica', ['update', 'id' => $model->tmz_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Elimina', ['delete', 'id' => $model->tmz_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Vuoi eliminare defitivamente questa Tipologia Attrezzatura ?',
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

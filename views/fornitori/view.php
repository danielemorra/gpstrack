<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fornitori */

$this->title = 'Venditori | ' .$model->frn_nome;
$this->params['breadcrumbs'][] = ['label' => 'Fornitori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->frn_nome;
?>
<div class="fornitori-view">

    <h1><?= Html::encode($model->frn_nome) ?></h1>

    <p>
        <?= Html::a('Nuovo Fornitore', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Modifica', ['update', 'id' => $model->frn_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Elimina', ['delete', 'id' => $model->frn_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Vuoi eliminare defitivamente questo Fornitore ?',
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

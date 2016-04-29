<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Param */

$this->title = 'Parametri | ' .$model->par_parametro;
$this->params['breadcrumbs'][] = ['label' => 'Parametri', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->par_parametro;
?>
<div class="param-view">

    <h1><?= Html::encode($model->par_parametro) ?></h1>

    <p>
        <?= Html::a('Nuovo Parametro', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Modifica', ['update', 'id' => $model->par_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Elimina', ['delete', 'id' => $model->par_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Vuoi eliminare defitivamente questo Parametro ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'par_id',
            'par_parametro',
            'par_leggi_campo',
            'par_campo_num',
            'par_campo_str',
            'par_campo_date',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UtilizzoComponente */

$this->title = $model->utc_id;
$this->title = 'Utilizzo Componenti | ' .$model->utcComponente->cmp_componente;
$this->params['breadcrumbs'][] = ['label' => 'Utilizzo Componenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->utcComponente->cmp_componente;
?>
<div class="utilizzo-componente-view">

    <h1><?= Html::encode($model->utcComponente->cmp_componente) ?></h1>

    <p>
        <?php if(!Yii::$app->user->isGuest ){ ?>
            <?= Html::a('Utilizza Componente', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Modifica', ['update', 'id' => $model->utc_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Elimina', ['delete', 'id' => $model->utc_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Vuoi eliminare defitivamente questo Utilizzo Componente ?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'utc_id',
            [
                'label' => 'Componente',
                'value' => $model->utcComponente->cmp_componente,
            ],
            'utc_qta_utilizzo',
            [
                'label' => 'Attrezzatura',
                'value' => $model->utcMezzo->mzt_mezzo_trasporto,
            ],
            'utc_data_montaggio',
            'utc_data_smontaggio',
        ],
    ]) ?>

</div>

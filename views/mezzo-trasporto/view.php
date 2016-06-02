<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MezzoTrasporto */

$this->title = 'Attrezzatura | ' .$model->mzt_mezzo_trasporto;
$this->params['breadcrumbs'][] = ['label' => 'Attrezzatura', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->mzt_mezzo_trasporto;
?>
<div class="mezzo-trasporto-view">

    <h1><?= Html::encode($model->mzt_mezzo_trasporto); ?></h1>

    <p>
        <?php if(!Yii::$app->user->isGuest ){ ?>
            <?= Html::a('Nuova Attrezzatura', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Modifica', ['update', 'id' => $model->mzt_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Elimina', ['delete', 'id' => $model->mzt_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Vuoi eliminare defitivamente questa Attrezzatura ?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mzt_id',
            'mzt_mezzo_trasporto',
//            'mzt_data_inizio_utilizzo',
            [
                'attribute'=>'mzt_data_inizio_utilizzo',
                'value' => $model->mzt_data_inizio_utilizzo,
                'format'=>['Date','php: d/m/Y']
            ],
//            'mzt_data_fine_utilizzo',
            [
                'attribute'=>'mzt_data_fine_utilizzo',
                'value' => $model->mzt_data_fine_utilizzo,
                'format'=>['Date','php: d/m/Y']
            ],
            [
                'label' => 'Tipologia',
                'value' => $model->mztTipologia->tmz_tipologia,
            ],
            [
                'label' => 'Utente',
                'value' => $model->mztUtente->ute_username,
            ],
        ],
    ]) ?>

</div>

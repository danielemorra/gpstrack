<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Componenti */

$this->title = 'Componenti | ' .$model->cmp_componente;
$this->params['breadcrumbs'][] = ['label' => 'Componenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->cmp_componente;
?>
<div class="componenti-view">

    <h1><?= Html::encode($model->cmp_componente); ?></h1>

    <p>
        <?php if(!Yii::$app->user->isGuest ){ ?>
            <?= Html::a('Nuovo Componente', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Modifica', ['update', 'id' => $model->cmp_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Elimina', ['delete', 'id' => $model->cmp_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Vuoi eliminare defitivamente questo Componente ?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cmp_id',
//            'cmp_marca',
//            'cmp_modello',
            'cmp_componente',
            [
                'label' => 'Mostra in Home',
                'value' => ($model->cmp_mostra_in_home == 1) ? 'Si' : 'No',
            ],
            'cmp_qta_acq',
            'cmp_prz_acq_unit',
            'cmp_data_acquisto',
            'cmp_data_dismissione',
            'cmp_qta_util',
            'cmp_mystuff2',
            [
                'label' => 'Fornitore',
                'value' => $model->cmpIdFrn->frn_nome,
            ],
            [
                'label' => 'Categoria',
                'value' => $model->cmpIdCat->cat_categoria,
            ],
            [
                'label' => 'Ubicazione',
                'value' => $model->cmpIdUbc->ubc_ubicazione .' -> '. $model->cmpIdUbc->ubc_contenitore,
            ],
            //'cmp_utente_id',
            'cmp_note',
        ],
    ]) ?>

</div>

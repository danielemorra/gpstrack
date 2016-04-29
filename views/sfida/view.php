<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sfida */

($model->sfd_sfida_obiet == 1) ? $tipoSfdObt = 'Sfida' : $tipoSfdObt = 'Obiettivo';
$this->title = $tipoSfdObt .' | ' .$model->sfd_titolo;
$this->params['breadcrumbs'][] = ['label' => $tipoSfdObt, 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->sfd_titolo;
?>
<div class="sfida-view">

    <h1>
        <?php
            echo $tipoSfdObt .' - '. Html::encode($model->sfd_titolo)
        ?>
    </h1>

    <p>
        <?= Html::a('Nuova Sfida', ['create', 'sfdObt' =>'S'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Nuovo Obiettivo', ['create', 'sfdObt' =>'O'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Modifica', ['update', 'id' => $model->sfd_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Elimina', ['delete', 'id' => $model->sfd_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Vuoi eliminare defitivamente questa/o ' .$tipoSfdObt. ' ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sfd_id',
            [
                'label' => 'Sfida/Obiet.',
                'value' => $tipoSfdObt,
            ],
            'sfd_titolo',
            'sfd_sotto_titolo',
            'sfd_descrizione',
            'sfd_data_pubblicaz:date',
            'sfd_data_inizio:date',
            'sfd_data_fine:date',
            [
                'label' => 'Specialita',
                'value' => $model->sfdSpecialita->sfs_specialita .' ('. $model->sfdSpecialita->sfs_um .')',
            ],
            [
                'label' => 'Tipologia',
                'value' => $model->sfdTipologia->tmz_tipologia,
            ],
            'sfd_obiettivo',
            'sfd_image_url:url',
        ],
    ]) ?>

</div>

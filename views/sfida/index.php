<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SfidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sfide e Obiettivi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sfida-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuova Sfida', ['create', 'sfdObt' =>'S'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Nuovo Obiettivo', ['create', 'sfdObt' =>'O'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'sfd_id',
//            'sfd_sfida_obiet',
            [
                'attribute' => 'sfd_sfida_obiet',   /* necessario per visualizzare la textinput per il filtro*/
                'label' => 'Sfd/Ob.',
                'value' => function ($searchModel) {
                    switch ($searchModel->sfd_sfida_obiet) {
                        case 1:
                            $sfObt = 'Sfida';
                            break;
                        case 2:
                            $sfObt = 'Obiettivo';
                            break;
                        default:
                            $sfObt = '(nessun valore)';
                    }
//                    return ($searchModel->sfd_sfida_obiet == 1) ? 'Sfida' : 'Obiettivo';
                    return $sfObt;
                },
            ],
            'sfd_titolo',
            'sfd_sotto_titolo',
            //'sfd_descrizione',
//            'sfd_data_pubblicaz:date',
            [
                'attribute'=>'sfd_data_pubblicaz',
                'value' => 'sfd_data_pubblicaz',
                'format'=>['Date','php: d/m/Y']
            ],
//            'sfd_data_inizio:date',
            [
                'attribute'=>'sfd_data_inizio',
                'value' => 'sfd_data_inizio',
                'format'=>['Date','php: d/m/Y']
            ],
//            'sfd_data_fine:date',
            [
                'attribute'=>'sfd_data_fine',
                'value' => 'sfd_data_fine',
                'format'=>['Date','php: d/m/Y']
            ],
            // 'sfd_specialita_id',
            [
                'attribute' => 'specialita',       // public property in SfidaSearch model
                'value' => 'sfdSpecialita.sfs_specialita'
            ],
            // 'sfd_tipologia_id',
            [
                'attribute' => 'tipologia',     // public property in SfidaSearch model
                'label' => 'Tipo',
                'value' => 'sfdTipologia.tmz_tipologia'
            ],
            'sfd_obiettivo',
            // 'sfd_image_url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

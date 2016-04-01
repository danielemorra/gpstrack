<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SfidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sfide';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sfida-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sfida', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'sfd_id',
            'sfd_titolo',
            'sfd_sotto_titolo',
            //'sfd_descrizione',
            'sfd_data_pubblicaz:datetime',
             'sfd_data_inizio:datetime',
             'sfd_data_fine:datetime',
            // 'sfd_specialita_id',
            [
                'attribute' => 'specialita',       // public property in SfidaSearch model
                'value' => 'sfdSpecialita.sfs_specialita'
            ],
            // 'sfd_tipologia_id',
            [
                'attribute' => 'tipologia',     // public property in SfidaSearch model
                'value' => 'sfdTipologia.tmz_tipologia'
            ],
            'sfd_obiettivo',
            // 'sfd_image_url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

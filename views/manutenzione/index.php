<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ManutenzioneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manutenzione Attrezzatura';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manutenzione-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if(!Yii::$app->user->isGuest ){ ?>
            <?= Html::a('Nuova Manutenzione', ['create'], ['class' => 'btn btn-success']) ?>
        <?php } ?>
    </p>

    <?php
    //  Abilita le immagini dei link all'aupdate/delete solo per gli utenti loggati
    // for Guests
    if(Yii::$app->user->isGuest)
    {
        $actionColumn =  [   'class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'contentOptions' => ['style' => 'width:34px; font-size:18px;'],
            'visible' => true,
        ];
    }
    // for  users
    else
    {
        $actionColumn =   [   'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'contentOptions' => ['style' => 'width:34px; font-size:18px;'],
            'visible' => true,
        ];
    }
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mtz_id',
            'mtz_data_interv',
            'mtz_descrizione',
            /*dm9* inizio*/
//*dm9*     'mtz_componente_id',
            [
            'attribute' => 'mtzComponente',
            'value' => 'mtzComponente.cmp_componente'
            ],
            /*dm9* fine*/
            'mtz_data_inizio_tracking',
            'mtz_data_fine_tracking',

//            ['class' => 'yii\grid\ActionColumn'],
            $actionColumn
        ],
    ]); ?>

</div>

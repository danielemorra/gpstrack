<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AttivitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uscite';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attivita-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if(!Yii::$app->user->isGuest ){ ?>
            <?= Html::a('Nuova Uscita', ['create'], ['class' => 'btn btn-success']) ?>
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

//    $daterange = [
//        'model' => $searchModel,
//        'attribute' => 'ats_data',
//        'convertFormat' => false,
//        'pluginOptions' => [
//            'format' => 'DD/MM/YYYY',
//        ],
//    ];
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           ['class' => 'yii\grid\SerialColumn'],
        
//            'ats_id',
            /*dm9* inizio*/
    		[
	        	'attribute'=>'ats_data',
            	'value' => 'ats_data',
	        	'format'=>['Date','php: d/m/Y']
//                'filter' => DateRangePicker::widget($daterange),
	        ],
            /*dm9* fine*/
            /*dm9* inizio*/
// 	        'ats_mezzo_trasporto_id',
            [
            'attribute' => 'atsMezzoTrasporto',
            'value' => 'atsMezzoTrasporto.mzt_mezzo_trasporto'
            ],
//         	'atsMezzoTrasporto',
            /*dm9* fine*/
            'ats_percorso',
            'ats_tempo',
            'ats_distanza_km',
            'ats_dislivello',
            // 'ats_utente_id',

//            ['class' => 'yii\grid\ActionColumn'],
            $actionColumn
        ],
    ]); ?>

</div>

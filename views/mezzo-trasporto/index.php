<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MezzoTrasportoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attrezzatura';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mezzo-trasporto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if(!Yii::$app->user->isGuest ){ ?>
            <?= Html::a('Nuova Attrezzatura', ['create'], ['class' => 'btn btn-success']) ?>
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

//            'mzt_id',
            'mzt_mezzo_trasporto',
//            'mzt_data_inizio_utilizzo',
            [
                'attribute'=>'mzt_data_inizio_utilizzo',
                'value' => 'mzt_data_inizio_utilizzo',
                'format'=>['Date','php: d/m/Y']
            ],
//            'mzt_data_fine_utilizzo',
            [
                'attribute'=>'mzt_data_fine_utilizzo',
                'value' => 'mzt_data_fine_utilizzo',
                'format'=>['Date','php: d/m/Y']
            ],
            /*dm9* inizio*/
//          'mzt_tipologia_id',
            [
            'attribute' => 'mztTipologia',
            'value' => 'mztTipologia.tmz_tipologia'
            ],
            /*dm9* fine*/
            // 'mzt_utente_id',

//            ['class' => 'yii\grid\ActionColumn'],
            $actionColumn
        ],
    ]); ?>

</div>

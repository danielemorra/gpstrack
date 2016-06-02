<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UtilizzoComponenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utilizzo Componenti';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilizzo-componente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if(!Yii::$app->user->isGuest ){ ?>
            <?= Html::a('Utilizza Componente', ['create'], ['class' => 'btn btn-success']) ?>
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

//            'utc_id',
            /*dm9* inizio*/
//          'utc_mezzo_id',
            [
            'attribute' => 'utcMezzo',
            'label' => 'Attrezzatura',
            'value' => 'utcMezzo.mzt_mezzo_trasporto'
            ],
            /*dm9* fine*/
            
            /*dm9* inizio*/
//          'utc_componente_id',
            [
            'attribute' => 'utcComponente',
            'label' => 'Componente',
            'value' => 'utcComponente.cmp_componente'
            ],
            /*dm9* fine*/
            
            'utc_qta_utilizzo',
            
//*dm9*     'utc_mezzo_id',
//            'utc_data_montaggio',
            [
                'attribute'=>'utc_data_montaggio',
                'value' => 'utc_data_montaggio',
                'format'=>['Date','php: d/m/Y']
            ],
//            'utc_data_smontaggio',
            [
                'attribute'=>'utc_data_smontaggio',
                'value' => 'utc_data_smontaggio',
                'format'=>['Date','php: d/m/Y']
            ],
            'utc_note',
//            ['class' => 'yii\grid\ActionColumn'],
            $actionColumn
        ],
    ]); ?>

</div>

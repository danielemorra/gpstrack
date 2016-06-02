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
            'template' => '{view} {update} {delete} {1click}',
            'contentOptions' => ['style' => 'width:34px; font-size:18px;'],
            'visible' => true,
            // AGGIUNTA BOTTONE CUSTOM A GRIDVIEW
            // Aggiungo il link per creare una manutenzione 1 click
            // In pratica solo per le manutenzioni già censite che hanno data fine track futura,
            // cliccando sul pulsante 1 click si chiude la manutenzione alla data odierna -1 e
            // se ne apre un'altra con data inizio track data odierna e data fine track 31/12/9999
            'buttons' => [
                '1click' => function ($url, $searchModel) {
                    if ($searchModel->mtz_data_fine_tracking > date('Y-m-d')) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-repeat"></span>',
                            $url,
                            [
                                'title' => 'Nuova manutenzione 1 click',
                                'data-pjax' => '0',
                            ]
                        );
                    }
                },
            ],
        ];
    }
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'mtz_id',
//            'mtz_data_interv',
            [
                'attribute'=>'mtz_data_interv',
                'value' => 'mtz_data_interv',
                'format'=>['Date','php: d/m/Y']
            ],
            'mtz_descrizione',
            /*dm9* inizio*/
//*dm9*     'mtz_componente_id',
            [
            'attribute' => 'mtzComponente',
            'value' => 'mtzComponente.cmp_componente'
            ],
            /*dm9* fine*/
//            'mtz_data_inizio_tracking',
            [
                'attribute'=>'mtz_data_inizio_tracking',
                'value' => 'mtz_data_inizio_tracking',
                'format'=>['Date','php: d/m/Y']
            ],
//            'mtz_data_fine_tracking',
            [
                'attribute'=>'mtz_data_fine_tracking',
                'value' => 'mtz_data_fine_tracking',
                'format'=>['Date','php: d/m/Y']
            ],

//            ['class' => 'yii\grid\ActionColumn'],
            $actionColumn
        ],
    ]); ?>

</div>

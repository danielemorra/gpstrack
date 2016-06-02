<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UbicazioneComponenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ubicazione Componenti';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ubicazione-componente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if(!Yii::$app->user->isGuest ){ ?>
            <?= Html::a('Nuova Ubicazione', ['create'], ['class' => 'btn btn-success']) ?>
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

//            'ubc_id',
            'ubc_contenitore',
            'ubc_ubicazione',
            'ubc_note',
//            'ubc_utente_id',

//            ['class' => 'yii\grid\ActionColumn'],
            $actionColumn
        ],
    ]); ?>

</div>

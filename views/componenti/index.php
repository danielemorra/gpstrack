<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComponentiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Componenti';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="componenti-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if(!Yii::$app->user->isGuest ){ ?>
            <?= Html::a('Nuovo Componente', ['create'], ['class' => 'btn btn-success']) ?>
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

//            'cmp_id',
//*dm9*     'cmp_marca',
//*dm9*     'cmp_modello',
            'cmp_componente',
            [
                'attribute' => 'cmp_mostra_in_home',
                'label' => 'In Home',
//                'value' => function($searchModel) {
//                    return ($searchModel->cmp_mostra_in_home == 1 ? 'S' : 'N');
//                }
                'format' => 'raw',
                'value' => function ($model, $index, $widget) {
                    return Html::checkbox('inHome[]', $model->cmp_mostra_in_home, ['value' => $index, 'disabled' => true]);
                },
            ],
            [
            'attribute' => 'cmpIdCat',
            'label' => 'Categoria',
            'value' => 'cmpIdCat.cat_categoria'
            ],
            [
            'attribute' => 'cmpIdUbc',
            'label' => 'Ubicazione',
            'value' => 'cmpIdUbc.ubc_contenitore'
            ],
            'cmp_qta_acq',
            'cmp_qta_util',
            'cmp_prz_acq_unit',
//            'cmp_data_acquisto',
            [
                'attribute'=>'cmp_data_acquisto',
                'value' => 'cmp_data_acquisto',
                'format'=>['Date','php: d/m/Y']
            ],
//            'cmp_data_dismissione',
            [
                'attribute'=>'cmp_data_dismissione',
                'value' => 'cmp_data_dismissione',
                'format'=>['Date','php: d/m/Y']
            ],
            [
                'attribute' => 'cmp_mystuff2',
//                'value' => function($searchModel) {
//                    return ($searchModel->cmp_mystuff2 == 1 ? 'S' : 'N');
//                }
                'format' => 'raw',
                'value' => function ($model, $index, $widget) {
                    return Html::checkbox('myStuff[]', $model->cmp_mystuff2, ['value' => $index, 'disabled' => true]);
                },
            ],
            [
            'attribute' => 'cmpIdFrn',
            'value' => 'cmpIdFrn.frn_nome'
            ],
            // 'cmp_utente_id',
            'cmp_note',

//            ['class' => 'yii\grid\ActionColumn'],
            $actionColumn
        ],
    ]); ?>

</div>

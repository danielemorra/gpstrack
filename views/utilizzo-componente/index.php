<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UtilizzoComponenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utilizzo Componentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilizzo-componente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Utilizzo Componente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'utc_id',
            
            /*dm9* inizio*/
//          'utc_mezzo_id',
            [
            'attribute' => 'utcMezzo',
            'value' => 'utcMezzo.mzt_mezzo_trasporto'
            ],
            /*dm9* fine*/
            
            /*dm9* inizio*/
//          'utc_componente_id',
            [
            'attribute' => 'utcComponente',
            'value' => 'utcComponente.cmp_componente'
            ],
            /*dm9* fine*/
            
            'utc_qta_utilizzo',
            
//*dm9*     'utc_mezzo_id',
            'utc_data_montaggio',
            'utc_data_smontaggio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

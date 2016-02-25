<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AttivitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attivitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attivita-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Attivita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           ['class' => 'yii\grid\SerialColumn'],
        
            'ats_id',
// 			'ats_data',
            /*dm9* inizio*/
    		[
	        	'attribute'=>'ats_data',
            	'value' => 'ats_data',
	        	'format'=>['Date','php: d/m/Y']
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MezzoTrasportoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mezzo Trasportos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mezzo-trasporto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mezzo Trasporto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mzt_id',
            'mzt_mezzo_trasporto',
            'mzt_data_inizio_utilizzo',
            'mzt_data_fine_utilizzo',
            /*dm9* inizio*/
//          'mzt_tipologia_id',
            [
            'attribute' => 'mztTipologia',
            'value' => 'mztTipologia.tmz_tipologia'
            ],
            /*dm9* fine*/
            // 'mzt_utente_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

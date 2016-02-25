<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ManutenzioneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manutenziones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manutenzione-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Manutenzione', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

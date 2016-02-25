<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComponentiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Componentis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="componenti-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Componenti', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//*dm9*     ['class' => 'yii\grid\SerialColumn'],

            'cmp_id',
//*dm9*     'cmp_marca',
//*dm9*     'cmp_modello',
            'cmp_componente',
            /*dm9* inizio*/
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
			/*dm9* fine*/
            'cmp_qta_acq',
            'cmp_qta_util',
            'cmp_prz_acq_unit',
            'cmp_data_acquisto',
            'cmp_data_dismissione',
            'cmp_mystuff2',
            /*dm9* inizio*/
            [
            'attribute' => 'cmpIdFrn',
            'value' => 'cmpIdFrn.frn_nome'
            ],
			/*dm9* fine*/
            'cmp_note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parametri';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="param-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuovo Parametro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'par_id',
            'par_parametro',
            'par_leggi_campo',
            'par_campo_num',
            'par_campo_str',
            // 'par_campo_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

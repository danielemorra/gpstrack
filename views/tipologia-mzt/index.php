<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipologiaMztSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipologia Mzts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipologia-mzt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipologia Mzt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tmz_id',
            'tmz_tipologia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

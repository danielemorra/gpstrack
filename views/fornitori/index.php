<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FornitoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fornitori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornitori-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuovo Fornitore', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'frn_id',
            'frn_nome',
            'frn_sito_web',
//            'frn_utente_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

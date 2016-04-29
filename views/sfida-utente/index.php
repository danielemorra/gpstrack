<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SfidaUtenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sfide / Obiettivi Utente';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sfida-utente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuova Sfida Utente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sfu_id',
            'sfu_obiettivo_raggiunto',
            'sfu_utente_id',
            'sfu_sfida_id',
            'sfu_flag_obiettivo_centrato',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

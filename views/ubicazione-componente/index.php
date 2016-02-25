<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UbicazioneComponenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ubicazione Componentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ubicazione-componente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ubicazione Componente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ubc_id',
            'ubc_contenitore',
            'ubc_ubicazione',
            'ubc_note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

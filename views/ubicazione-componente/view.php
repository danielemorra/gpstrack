<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UbicazioneComponente */

$this->title = 'Ubicazione Componenti | ' .$model->ubc_contenitore;
$this->params['breadcrumbs'][] = ['label' => 'Ubicazione Componenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->ubc_contenitore;
?>
<div class="ubicazione-componente-view">

    <h1><?= Html::encode($model->ubc_contenitore) ?></h1>

    <p>
        <?php if(!Yii::$app->user->isGuest ){ ?>
            <?= Html::a('Nuova Ubicazione', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Modifica', ['update', 'id' => $model->ubc_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Elimina', ['delete', 'id' => $model->ubc_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Vuoi eliminare defitivamente questa Ubicazione ?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ubc_id',
            'ubc_contenitore',
            'ubc_ubicazione',
            'ubc_note',
//            'ubc_utente_id',
        ],
    ]) ?>

</div>

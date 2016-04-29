<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Utente */

$this->title = $model->ute_id;
$this->params['breadcrumbs'][] = ['label' => 'Utente', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ute_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ute_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ute_id',
            'ute_username',
            'ute_password_hash',
            'ute_auth_key',
            'ute_access_token',
            'ute_email:email',
        ],
    ]) ?>

</div>

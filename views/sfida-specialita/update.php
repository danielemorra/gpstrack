<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SfidaSpecialita */

$this->title = 'Modifica Specialita Sfida: ' . ' ' . $model->sfs_specialita;
$this->params['breadcrumbs'][] = ['label' => 'Specialita Sfida', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sfs_specialita, 'url' => ['view', 'id' => $model->sfs_id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="sfida-specialita-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

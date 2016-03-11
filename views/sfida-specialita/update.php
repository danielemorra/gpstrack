<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SfidaSpecialita */

$this->title = 'Update Sfida Specialita: ' . ' ' . $model->sfs_id;
$this->params['breadcrumbs'][] = ['label' => 'Sfida Specialitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sfs_id, 'url' => ['view', 'id' => $model->sfs_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sfida-specialita-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

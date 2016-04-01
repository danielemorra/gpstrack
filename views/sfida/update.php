<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sfida */

$this->title = 'Update Sfida: ' . ' ' . $model->sfd_id;
$this->params['breadcrumbs'][] = ['label' => 'Sfidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sfd_id, 'url' => ['view', 'id' => $model->sfd_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sfida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelSpecialita' => $modelSpecialita,
        'modelTipologia' => $modelTipologia,
    ]) ?>

</div>

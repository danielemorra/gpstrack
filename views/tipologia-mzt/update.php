<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipologiaMzt */

$this->title = 'Update Tipologia Mzt: ' . ' ' . $model->tmz_id;
$this->params['breadcrumbs'][] = ['label' => 'Tipologia Mzts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tmz_id, 'url' => ['view', 'id' => $model->tmz_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipologia-mzt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

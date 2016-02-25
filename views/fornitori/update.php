<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fornitori */

$this->title = 'Update Fornitori: ' . ' ' . $model->frn_id;
$this->params['breadcrumbs'][] = ['label' => 'Fornitoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->frn_id, 'url' => ['view', 'id' => $model->frn_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fornitori-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

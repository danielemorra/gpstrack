<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Param */

$this->title = 'Modifica Parametro: ' . ' ' . $model->par_parametro;
$this->params['breadcrumbs'][] = ['label' => 'Parametri', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->par_parametro, 'url' => ['view', 'id' => $model->par_id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="param-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

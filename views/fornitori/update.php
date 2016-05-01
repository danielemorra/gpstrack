<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fornitori */

$this->title = 'Modifica Venditore: ' . ' ' . $model->frn_nome;
$this->params['breadcrumbs'][] = ['label' => 'Fornitori', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->frn_nome, 'url' => ['view', 'id' => $model->frn_id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="fornitori-update">

    <h1><?= Html::encode($model->frn_nome) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

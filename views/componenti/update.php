<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Componenti */

$this->title = 'Update Componenti: ' . ' ' . $model->cmp_id;
$this->params['breadcrumbs'][] = ['label' => 'Componentis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cmp_id, 'url' => ['view', 'id' => $model->cmp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="componenti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelFornitori' => $modelFornitori,		/*dm9-160223*/
        'modelCategoria' => $modelCategoria,		/*dm9-160223*/
        'modelUbicazCompon' => $modelUbicazCompon,	/*dm9-160223*/
    ]) ?>

</div>

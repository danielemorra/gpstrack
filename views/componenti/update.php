<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Componenti */

$this->title = 'Modifica Componente: ' . ' ' . $model->cmp_componente;
$this->params['breadcrumbs'][] = ['label' => 'Componenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cmp_componente, 'url' => ['view', 'id' => $model->cmp_id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="componenti-update">

    <h1><?= Html::encode($model->cmp_componente) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelFornitori' => $modelFornitori,		/*dm9-160223*/
        'modelCategoria' => $modelCategoria,		/*dm9-160223*/
        'modelUbicazCompon' => $modelUbicazCompon,	/*dm9-160223*/
    ]) ?>

</div>

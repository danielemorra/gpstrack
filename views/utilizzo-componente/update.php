<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UtilizzoComponente */

$this->title = 'Modifica Utilizzo Componente: ' . ' ' . $model->utcComponente->cmp_componente;
$this->params['breadcrumbs'][] = ['label' => 'Utilizzo Componenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->utcComponente->cmp_componente, 'url' => ['view', 'id' => $model->utc_id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="utilizzo-componente-update">

    <h1><?= Html::encode($model->utcComponente->cmp_componente) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelComponenti' => $modelComponenti,				/*dm9-160223*/
        'modelMezzoTrasporto' => $modelMezzoTrasporto,		/*dm9-160223*/
    ]) ?>

</div>

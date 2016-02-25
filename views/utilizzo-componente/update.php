<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UtilizzoComponente */

$this->title = 'Update Utilizzo Componente: ' . ' ' . $model->utc_id;
$this->params['breadcrumbs'][] = ['label' => 'Utilizzo Componentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->utc_id, 'url' => ['view', 'id' => $model->utc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="utilizzo-componente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelComponenti' => $modelComponenti,				/*dm9-160223*/
        'modelMezzoTrasporto' => $modelMezzoTrasporto,		/*dm9-160223*/
    ]) ?>

</div>

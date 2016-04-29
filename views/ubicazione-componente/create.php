<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UbicazioneComponente */

$this->title = 'Nuova Ubicazione Componente';
$this->params['breadcrumbs'][] = ['label' => 'Ubicazione Componenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ubicazione-componente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

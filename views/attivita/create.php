<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Attivita */

$this->title = 'Nuova Uscita';
$this->params['breadcrumbs'][] = ['label' => 'Uscita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attivita-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelMezzoTrasporto' => $modelMezzoTrasporto,
    ]) ?>

</div>

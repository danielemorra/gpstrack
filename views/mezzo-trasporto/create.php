<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MezzoTrasporto */

$this->title = 'Create Mezzo Trasporto';
$this->params['breadcrumbs'][] = ['label' => 'Mezzo Trasportos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mezzo-trasporto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

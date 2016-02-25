<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipologiaMzt */

$this->title = 'Create Tipologia Mzt';
$this->params['breadcrumbs'][] = ['label' => 'Tipologia Mzts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipologia-mzt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

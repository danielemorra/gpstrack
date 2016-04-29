<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipologiaMzt */

$this->title = 'Nuova Tipologia Attrezzatura';
$this->params['breadcrumbs'][] = ['label' => 'Tipologia Attrezzatura', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipologia-mzt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

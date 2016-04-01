<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sfida */

$this->title = 'Create Sfida';
$this->params['breadcrumbs'][] = ['label' => 'Sfidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sfida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelSpecialita' => $modelSpecialita,
        'modelTipologia' => $modelTipologia,
    ]) ?>

</div>

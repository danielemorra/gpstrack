<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Componenti */

$this->title = 'Create Componenti';
$this->params['breadcrumbs'][] = ['label' => 'Componentis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="componenti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

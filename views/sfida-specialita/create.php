<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SfidaSpecialita */

$this->title = 'Create Sfida Specialita';
$this->params['breadcrumbs'][] = ['label' => 'Sfida Specialitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sfida-specialita-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
